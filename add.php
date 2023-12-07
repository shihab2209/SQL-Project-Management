<?php 
include "config.php";

$error = '';
$success = '';

if(isset($_POST['add'])){
    $user_id = mysqli_real_escape_string($conn, $_POST['User_ID']);
    $std_id = mysqli_real_escape_string($conn, $_POST['Student_ID']);
    $batch_id = mysqli_real_escape_string($conn, $_POST['Batch_ID']);
    $fees = mysqli_real_escape_string($conn, $_POST['Fees']);
    $class_shift = mysqli_real_escape_string($conn, $_POST['Class_shift']);

    if(empty($user_id) || empty($std_id) || empty($batch_id) || empty($fees)) {
        $error = "All fields are required";
    } else {
        $check_student = "SELECT * FROM students WHERE Student_ID='$std_id'"; 
        $data = mysqli_query($conn, $check_student);
        if(mysqli_num_rows($data) > 0) {
            $error = "Student ID already exists!";
        } else {
            $insert = "INSERT INTO students(User_ID, Student_ID, Batch_ID, Class_shift, Fees) VALUES ('$user_id', '$std_id', '$batch_id', '$class_shift', '$fees')";
            if(mysqli_query($conn, $insert)){
                $success = "Data entered successfully!";
                header('Location: student.php');
                exit();
            } else {
                $error = "Failed to add student. Please try again.";
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
    <title>Add Student</title>
</head>
<body>
    <form action="add.php" method="POST">
        <label>User ID:</label>
        <input type="number" name="User_ID" placeholder="User ID"><br><br>
        <label>Student ID:</label>
        <input type="number" name="Student_ID" placeholder="Student ID"><br><br>
        <label>Batch ID:</label>
        <input type="number" name="Batch_ID" placeholder="Batch ID"><br><br>
        <label>Class Shift:</label>
        <input type="text" name="Class_shift" placeholder="Class Shift"><br><br>
        <label>Fees:</label>
        <input type="number" name="Fees" placeholder="Fees"><br><br>
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
