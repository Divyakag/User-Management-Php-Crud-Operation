<?php
    include 'database.php';
    $id = $_GET['id'];
    $sql = " DELETE FROM `products` WHERE id = $id ";
    mysqli_query($conn, $sql);
    header('location:product.php');
?>
