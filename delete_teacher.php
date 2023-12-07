<?php 
include 'config.php';

$id = $_GET['id'];
$query = "DELETE FROM teachers WHERE Teacher_ID='$id'"; 
$result = mysqli_query($conn, $query);

if ($result) {
    ?>
    <script type="text/javascript">
        alert("Data deleted successfully!");
        window.open("http://localhost/C1/teacher.php", "_self");
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        alert("Invalid! Please try again");
    </script>
    <?php
}
?>
