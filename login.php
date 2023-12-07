<?php
include 'config.php';

if (isset($_POST['login_btn'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $select = "SELECT * FROM users WHERE Email=?";
    $stmt = mysqli_prepare($conn, $select);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['Password'])) {
            $username = $row['Username'];
            session_start();
            $_SESSION['Username'] = $username;
            header('Location: admin.php');
            exit();
        } else {
            echo "<p style='color:red'>Invalid email or password! Please try again.</p>";
        }
    } else {
        echo "<p style='color:red'>Invalid email or password! Please try again.</p>";
    }
}
?>
