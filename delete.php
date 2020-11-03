<?php
    include 'database.php';
    $id = $_GET['id'];
    $sql = " DELETE FROM `users` WHERE id = $id ";
    mysqli_query($conn, $sql);
    header('location:dashboard.php');
?>
