<?php session_start();
require_once('../functions/alert.php');
require_once('../functions/redirect.php');
require_once('../functions/user.php');

$errorCount = 0;

//Initialize fields and validation
$full_name = strlen($_POST['full_name']) > 2 ? $_POST['full_name'] : $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;
$designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;
$department = $_POST['department']  != "" ? $_POST['department'] : $errorCount++;
$registration_date = date('d-m-Y H:i:s');


$_SESSION['full_name'] = $full_name;
$_SESSION['gender'] = $gender;
$_SESSION['email'] = $email;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$_SESSION["nameErr"] = $_SESSION["emailErr"] ="";

if ($errorCount > 0) {

    //Error check for first name
    if (empty($_POST["full_name"])) {
        $_SESSION["nameErr"] = "Your full name is required";
    } else {
        $full_name = test_input($_POST["full_name"]);
        //check if name has less than 2 characters
        if (strlen($full_name) < 2) {
            $_SESSION["nameErr"] = "Full name is too short";
        // check if name only contains letters and whitespace
        } elseif (!preg_match("/^[a-zA-Z ]*$/",$full_name)) {
            $_SESSION["nameErr"] = "Only letters and white space allowed";
        }
    }
    
    //Error check for email
    if (empty($_POST["email"])) {
        $_SESSION["emailErr"] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        //check if email has less than 5 characters
        if (strlen($email) < 5) {
            $_SESSION["emailErr"] = "Email is too short";
        // check if e-mail address is well-formed
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["emailErr"] = "Invalid email format";
        }
    }

    // Display error message
    $session_error = "You have " . $errorCount . " error";
    if($errorCount > 1) {        
        $session_error .= "s";
    }
    $session_error .=   " in your form submission";
    set_alert('error',$session_error);
    redirect_to("../register.php");

} else {
    if(!$email){
        set_alert('error','User Email is not set');
        die();
    }

    $allUsers = customScandir("../db/users/"); 
    $countAllUsers = count($allUsers);
    $newUserID = ($countAllUsers + 1) ;

    //declare data to be submitted to database
    $userObject = [
        'id' => $newUserID,
        'full_name' => $full_name,
        'gender' => $gender,
        'email' => $email,
        'password' => password_hash($password,PASSWORD_DEFAULT),
        'designation' => $designation,
        'department' => $department,
        'registration_date' => $registration_date
    ];

    for ($counter = 0; $counter < $countAllUsers ; $counter++) {
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json") {
            set_alert('error',"Registration failed, User already exists");
            redirect_to("../register.php");
            die();
        }     
        
    }

    // Save user details to database
    file_put_contents("../db/users/". $email .".json", json_encode($userObject));
    set_alert('message',"Registration Successful, you can now login " . $full_name);
    redirect_to("../login.php");
    
}
?>