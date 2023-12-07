<?php 
include 'config.php';

$id = $_GET['id'];
$select = "SELECT * FROM teachers WHERE Teacher_ID='$id'";
$data = mysqli_query($conn, $select);
$row = mysqli_fetch_array($data);

$error = '';
$success = '';

if (isset($_POST['update_info'])) {
    $user_id = $_POST['User_ID'];
    $teacher_id = $_POST['Teacher_ID'];
    $salary = $_POST['Salary'];

    $update = "UPDATE teachers SET User_ID='$user_id', Teacher_ID='$teacher_id', Salary='$salary' WHERE Teacher_ID='$id'";
    $result = mysqli_query($conn, $update);

    if ($result) {
        $success = "Data updated successfully";
        header('Location: teacher.php');
        exit();
    } else {
        $error = "Failed to update data. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
</head>
<body>
    <div> 
        <form action="" method="POST">
            <label>User ID:</label>
            <input value="<?php echo $row['User_ID']; ?>" type="number" name="User_ID" placeholder="User ID"><br><br>
            <label>Teacher ID:</label>
            <input value="<?php echo $row['Teacher_ID']; ?>" type="number" name="Teacher_ID" placeholder="Teacher ID"><br><br>
            <label>Salary:</label>
            <input value="<?php echo $row['Salary']; ?>" type="number" name="Salary" placeholder="Salary"><br><br>
            <input type="submit" name="update_info" value="Update">  
            <button><a href="teacher.php">View</a></button>
        </form>
        <?php 
        if ($error !== '') {
            echo '<p style="color: red;">' . $error . '</p>';
        }
        if ($success !== '') {
            echo '<p style="color: green;">' . $success . '</p>';
        }
        ?>
    </div>
</body>
</html>
