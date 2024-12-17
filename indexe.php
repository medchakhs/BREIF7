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
        $query = "SELECT * FROM `player` WHERE `id` = '$id' ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        // print_r($row);
?>

<?php
  include ('database.php');
  if(isset($_POST['btnModif'])){
    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }
    $name = $_POST['nome'];
    $photo = $_POST['photo'];
    $position = $_POST['position'];
    $rating = $_POST['rating'];
    $pace = $_POST['pace'];
    $shooting = $_POST['shooting'];
    $passing = $_POST['passing'];
    $dribbling = $_POST['dribbling'];
    $defending = $_POST['defending'];
    $physical = $_POST['physical'];
    
    $query = "UPDATE `player` SET `Name` = '$name', `Photo` = '$photo', `Position` = '$position', `Rating` = '$rating', `Pace` = '$pace', `Shooting` = '$shooting', `Passing` = '$passing', `Dribbling` = '$dribbling', `Defending` = '$defending', `Physical` = '$physical' WHERE `id` = '$idnew' ";
    mysqli_query($conn, $query);
    header("Location: index.php");
  }
?>

    <section class="form-container open" id="mmm">
        <form action="indexe.php?id_new=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <h1 class="text"> Form De Modification De Joueurs </h1>
                <label class="labl">Name</label>
                <input class="inpt" id="name" name="nome" type="text" placeholder="Enter name" value = "<?=  $row['Name'] ?>">

                <label class="labl">Photo</label>
                <input class="inpt" id="imge" name="photo" type="text" placeholder="Photo URL" value = "<?= $row['Photo']?> " >

                <label class="labl">Position</label>
        <select id="pet-select" class="optio" name="position" value = "<?= $row['Position'] ?>" >
            <option value="">--e poste de joueurs</option>
            <option value="" disabled>--e poste de joueurs</option>
            <option value="LW" <?= ($row['Position'] == 'LW') ? 'selected' : '' ?>>LW</option>
            <option value="RW" <?= ($row['Position'] == 'RW') ? 'selected' : '' ?>>RW</option>
            <option value="CM1" <?= ($row['Position'] == 'CM1') ? 'selected' : '' ?>>CM1</option>
            <option value="CM2" <?= ($row['Position'] == 'CM2') ? 'selected' : '' ?>>CM2</option>
            <option value="CM3" <?= ($row['Position'] == 'CM3') ? 'selected' : '' ?>>CM3</option>
            <option value="LB" <?= ($row['Position'] == 'LB') ? 'selected' : '' ?>>LB</option>
            <option value="RB" <?= ($row['Position'] == 'RB') ? 'selected' : '' ?>>RB</option>
            <option value="CB1" <?= ($row['Position'] == 'CB1') ? 'selected' : '' ?>>CB1</option>
            <option value="CB2" <?= ($row['Position'] == 'CB2') ? 'selected' : '' ?>>CB2</option>
            <option value="GK" <?= ($row['Position'] == 'GK') ? 'selected' : '' ?>>GK</option>
            <option value="ST" <?= ($row['Position'] == 'ST') ? 'selected' : '' ?>>ST</option>
        </select>
            <div class="joeurs-statistique" id="stat1">

          <label class="labl">Rating</label>
          <input class="inpt" id="raete" name="rating" type="number" min="30" max="100" placeholder="30-100" value = "<?= $row['Rating'] ?>" >

          <div class="nmbr">
              <div style="width: 150px; display: flex; flex-direction: column;">
                  <label class="lable">Pace</label>
                  <input class="inpte" name="pace" id="pace" type="number" min="30" max="100" placeholder="30-100" value = "<?= $row['Pace'] ?>" >
              </div>
              <div style="width: 150px; display: flex; flex-direction: column;">
                  <label class="lable">Shooting</label>
                  <input class="inpte" name="shooting" id="Shooting" type="number" min="30" max="100" placeholder="30-100" value = "<?= $row['Shooting'] ?>" >
              </div>
              <div style="width: 150px; display: flex; flex-direction: column;">
                <label class="lable">Passing</label>
                <input class="inpte" id="Passing" name="passing" type="number" min="30" max="100" placeholder="30-100" value = "<?= $row['Passing'] ?>" >
            </div>
          </div>
          <div class="nmbr">
            <div style="width: 150px; display: flex; flex-direction: column;">
                <label class="lable">Dribbling</label>
                <input class="inpte" name="dribbling" id="Dribbling" type="number" min="30" max="100" placeholder="30-100" value = "<?= $row['Dribbling'] ?>">
            </div>
            <div style="width: 150px; display: flex; flex-direction: column;">
                <label class="lable">Defending</label>
                <input class="inpte" id="Defending" name="defending" type="number" min="30" max="100" placeholder="30-100" value = "<?= $row['Defending'] ?>">
            </div>
            <div style="width: 150px; display: flex; flex-direction: column;">
              <label class="lable">Physical</label>
              <input class="inpte" id="Physical" name="physical" type="number" min="30" max="100" placeholder="30-100" value = "<?= $row['Physical'] ?>" >
            </div>
        </div>
            </div>
            <div class="form-group">
                <button type="submit" name="btnModif">Modification</button>
            </div>
        </form>
    </section>
</body>
</html>
