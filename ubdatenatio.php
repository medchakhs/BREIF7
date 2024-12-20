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
        $query = "SELECT * FROM `nationality` WHERE `Id_nationality` = '$id' ";
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
    
    $query = "UPDATE `nationality` SET `Nationality_name` = '$name', `photo` = '$photo'";
    mysqli_query($conn, $query);
    header("Location: nationality.php");
  }
?>

<section class="form-container open" id="mmm">
    <form action="ubdatenatio.php?id_new=<?php echo $id; ?>" method="POST">
        <div class="form-group"> 
                <h1 class="text"> Form De Modification Des Clup </h1>
                <label class="labl">Name</label>
                <input class="inpt" id="name" name="nome" type="text" placeholder="Enter name" value = "<?=  $row['Nationality_name'] ?>">
                <label class="labl">Photo</label>
                <input class="inpt" id="imge" name="photo" type="text" placeholder="Photo URL " value = "<?=  $row['photo'] ?>">
        </div>
        
        <div class="form-group">
                <button type="submit" name="btnModifer">Modification</button>
        </div>
        </form>
    </section>
</body>
</html>
