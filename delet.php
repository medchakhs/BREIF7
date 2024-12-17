<?php
   include ('database.php');
   if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM `player` WHERE `id` = '$id' ";
        $result = mysqli_query($conn, $query);
        header("Location: index.php");
    }
?>