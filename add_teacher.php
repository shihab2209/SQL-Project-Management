<?php 
include "config.php";

$error = '';
$success = '';

if(isset($_POST['add'])){
    $user_id = mysqli_real_escape_string($conn, $_POST['User_ID']);
    $teacher_id = mysqli_real_escape_string($conn, $_POST['Teacher_ID']);
    $salary = mysqli_real_escape_string($conn, $_POST['Salary']);

    if(empty($user_id) || empty($teacher_id) || empty($salary)) {
        $error = "All fields are required";
    } else {
        $check_teacher = "SELECT * FROM teachers WHERE Teacher_ID='$teacher_id'"; 
        $data = mysqli_query($conn, $check_teacher);
        if(mysqli_num_rows($data) > 0) {
            $error = "Teacher ID already exists!";
        } else {
            $insert = "INSERT INTO teachers(User_ID, Teacher_ID, Salary) VALUES ('$user_id', '$teacher_id', '$salary')";
            if(mysqli_query($conn, $insert)){
                $success = "Data entered successfully!";
                header('Location: teacher.php');
                exit();
            } else {
                $error = "Failed to add teacher. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
</head>
<body>
    <form action="add_teacher.php" method="POST">
        <label>User ID:</label>
        <input type="number" name="User_ID" placeholder="User ID"><br><br>
        <label>Teacher ID:</label>
        <input type="number" name="Teacher_ID" placeholder="Teacher ID"><br><br>
        <label>Salary:</label>
        <input type="number" name="Salary" placeholder="Salary"><br><br>
        <input type="submit" name="add" value="Submit">  
    </form>
    <?php 
        if($error !== '') {
            echo '<p style="color: red;">'.$error.'</p>';
        }
        if($success !== '') {
            echo '<p style="color: green;">'.$success.'</p>';
        }
    ?>
</body>
</html>
