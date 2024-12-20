<?php
   include ('database.php');
   if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM `club` WHERE `Id_club` = '$id' ";
        $result = mysqli_query($conn, $query);
        header("Location: clup.php");
    }
?>