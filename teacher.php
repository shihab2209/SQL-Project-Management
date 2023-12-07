<?php 
include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Table</title>
</head>
<body>

  <table border="2px" cellspacing="0" cellpadding="5">
    <caption> <a href="add_teacher.php">Add new Teacher</a></caption>
    <tr>
        <th>User ID</th>
        <th>Teacher ID </th>
        <th>Salary </th>
        <th colspan="2">Action</th>
    </tr>
    <?php
    $query = "SELECT * FROM teachers";
    $data = mysqli_query($conn, $query);
    $result = mysqli_num_rows($data);
    if ($result) {
        while ($row = mysqli_fetch_array($data)) {
    ?>
            <tr>
                <td><?php echo $row['User_ID']; ?></td>
                <td><?php echo $row['Teacher_ID']; ?></td>
                <td><?php echo $row['Salary']; ?></td>
                <td><a href="update_teacher.php?id=<?php echo $row['Teacher_ID']; ?>">Edit</a></td>
                <td><a onclick="return confirm('Are you sure you want to delete?')" href="delete_teacher.php?id=<?php echo $row['Teacher_ID']; ?>">Delete</a></td>
            </tr> 
    <?php
        }
    } else {
    ?>
        <tr>
            <td colspan="5"> No records Found </td>
        </tr>
    <?php
    }
    ?>
  </table>
  
</body>
</html>
