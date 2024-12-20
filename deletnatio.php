<?php
   include ('database.php');
   if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM `nationality` WHERE `Id_nationality` = '$id' ";
        $result = mysqli_query($conn, $query);
        header("Location: nationality.php");
    }
?>