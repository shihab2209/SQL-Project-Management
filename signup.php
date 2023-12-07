<?php 
include "config.php";

if(isset($_POST['signup_btn'])){
    $user_id = mysqli_real_escape_string($conn, $_POST['User_ID']);
    $username = mysqli_real_escape_string($conn, $_POST['Username']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
    $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);
    $errors = array();

    if(empty($username) || empty($email) || empty($user_id) || empty($password) || empty($c_password)){
        $errors[] = "All fields are required";
    } elseif($password != $c_password){
        $errors[] = "Passwords don't match";
    } elseif(strlen($username) < 5 || strlen($username) > 50){
        $errors[] = "Username must be between 5 to 50 characters";
    } elseif(strlen($password) < 3){
        $errors[] = "Password must be at least 3 characters";
    } else {
        $check_email_username = "SELECT * FROM user WHERE Email='$email' OR Username='$username'";
        $result = mysqli_query($conn, $check_email_username);

        if (mysqli_num_rows($result) > 0) {
            $errors[] = "Email or username already exists";
        } else {
            // Hash the password before storing it in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            if (!$hashed_password) {
                $errors[] = "Password hashing failed";
            } else {
                // Insert the hashed password into the database
                $insert_query = "INSERT INTO user (User_ID, Username, Password, Email) VALUES ('$user_id', '$username', '$hashed_password', '$email')";
                $insert_result = mysqli_query($conn, $insert_query);

                if($insert_result){
                    $success = "Your account has been created successfully!";
                } else {
                    $errors[] = "Failed to create account. Please try again.";
                }
            }
        }
    }
}
?>
