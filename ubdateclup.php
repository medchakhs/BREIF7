<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de Jours</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    include ('database.php');
        $id = $_GET['id'];
        $query = "SELECT * FROM `club` WHERE `Id_club` = '$id' ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        // print_r($row);
?>

<?php
  include ('database.php');
  if(isset($_POST['btnModifer'])){
    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }
    $name = $_POST['nome'];
    $photo = $_POST['photo'];
    
    $query = "UPDATE `club` SET `Club_name` = '$name', `Photo` = '$photo'";
    mysqli_query($conn, $query);
    header("Location: clup.php");
  }
?>

<section class="form-container open" id="mmm">
    <form action="ubdateclup.php?id_new=<?php echo $id; ?>" method="POST">
        <div class="form-group"> 
                <h1 class="text"> Form De Modification Des Clup </h1>
                <label class="labl">Name</label>
                <input class="inpt" id="name" name="nome" type="text" placeholder="Enter name" value = "<?=  $row['Club_name'] ?>">
                <label class="labl">Photo</label>
                <input class="inpt" id="imge" name="photo" type="text" placeholder="Photo URL " value = "<?=  $row['Photo'] ?>">
        </div>
        
        <div class="form-group">
                <button type="submit" name="btnModifer">Modification</button>
        </div>
        </form>
    </section>
</body>
</html>
