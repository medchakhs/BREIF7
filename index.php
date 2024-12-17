

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>


   <!-- navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li>
            <a href="#"><button type="button" style="margin-left: 1100px; background-color: #007bff; border: none; border-radius: 8px; width: 60px; height: 35px;" > User </button></a>
          </li>
        </ul>
    </nav>


  

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="" class="brand-link">
              <span class="brand-text font-weight-light"> Dashboard </span>
            </a>
            <div class="sidebar">
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                      <li class="nav-item">
                       <a  href="#" class="nav-link" id="ajou">
                          <i class="far fa-circle nav-icon"></i>
                         <p>
                            Ajouter joueurs
                         </p>
                        </a>
                      </li>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                            Simple Link
                      </p>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
    </aside>
 
    <!-- form -->

    <section class="form-container open" id="mmm">
        <form action="" method="POST">
            <div class="form-group">
                <h1 class="text"> Form de 11 joueurs </h1>
                <label class="labl">Name</label>
                <input class="inpt" id="name" name="nome" type="text" placeholder="Enter name">

                <label class="labl">Photo</label>
                <input class="inpt" id="imge" name="photo" type="text" placeholder="Photo URL">

                <label class="labl">Position</label>
          <select id="pet-select" class="optio" name="position" >
            <option value="">--e poste de joueurs</option>
            <option value="ST">ST</option>
            <option value="LW">LW</option>
            <option value="RW">RW</option>
            <option value="CM1">CM1</option>
            <option value="CM2">CM2</option>
            <option value="CM3">CM3</option>
            <option value="LB">LB</option>
            <option value="RB">RB</option>
            <option value="CB1">CB1</option>
            <option value="CB2">CB2</option>
            <option value="GK">GK</option>
                </select>
            <div class="joeurs-statistique" id="stat1">

          <label class="labl">Rating</label>
          <input class="inpt" id="raete" name="rating" type="number" min="30" max="100" placeholder="30-100">

          <div class="nmbr">
              <div style="width: 150px; display: flex; flex-direction: column;">
                  <label class="lable">Pace</label>
                  <input class="inpte" name="pace" id="pace" type="number" min="30" max="100" placeholder="30-100">
              </div>
              <div style="width: 150px; display: flex; flex-direction: column;">
                  <label class="lable">Shooting</label>
                  <input class="inpte" name="shooting" id="Shooting" type="number" min="30" max="100" placeholder="30-100">
              </div>
              <div style="width: 150px; display: flex; flex-direction: column;">
                <label class="lable">Passing</label>
                <input class="inpte" id="Passing" name="passing" type="number" min="30" max="100" placeholder="30-100">
            </div>
          </div>
          <div class="nmbr">
            <div style="width: 150px; display: flex; flex-direction: column;">
                <label class="lable">Dribbling</label>
                <input class="inpte" name="dribbling" id="Dribbling" type="number" min="30" max="100" placeholder="30-100">
            </div>
            <div style="width: 150px; display: flex; flex-direction: column;">
                <label class="lable">Defending</label>
                <input class="inpte" id="Defending" name="defending" type="number" min="30" max="100" placeholder="30-100">
            </div>
            <div style="width: 150px; display: flex; flex-direction: column;">
              <label class="lable">Physical</label>
              <input class="inpte" id="Physical" name="physical" type="number" min="30" max="100" placeholder="30-100">
            </div>
        </div>
            </div>
            <div class="form-group">
                <button type="submit" name="btnAjout">Ajouter</button>
            </div>
        </form>
    </section>

<?php
  include('database.php');

  if (isset($_POST["btnAjout"])) {
    $name = $_POST['nome']; 
    $rating = $_POST['rating'];
    $pace = $_POST['pace'];
    $shooting = $_POST['shooting'];
    $passing = $_POST['passing'];
    $dribbling = $_POST['dribbling'];
    $defending = $_POST['defending']; 
    $physical = $_POST['physical'];
    $position = $_POST['position']; 
    $photo = $_POST['photo'];

    $stmt = $conn->prepare("INSERT INTO player (name, photo, position, rating, pace, shooting, passing, dribbling, defending, physical) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssiiiiiii", $name, $photo, $position, $rating, $pace, $shooting, $passing, $dribbling, $defending, $physical);

    if ($stmt->execute()) {
        echo "Player added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


     <!-- le table -->

    <section class="section">
      <button class="add-button" onclick="ajouter()">Ajouter</button>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Rating</th>
            <th>Pace</th>
            <th>Shooting</th>
            <th>Passing</th>
            <th>Dribbling</th>
            <th>Defending</th>
            <th>Physical</th>
            <th>Supprimer</th>
            <th>Modifier</th>
          </tr>
        </thead>
        <tbody id="tbody">
      <?php 
            include ('database.php');
            $query = "SELECT * FROM player";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($result)){
              echo '<tr>';
              echo '<td>'.$row['Name'].'</td>';
              echo '<td>'.$row['Position'].'</td>';
              echo '<td>'.$row['Rating'].'</td>';
              echo '<td>'.$row['Pace'].'</td>';
              echo '<td>'.$row['Shooting'].'</td>';
              echo '<td>'.$row['Passing'].'</td>';
              echo '<td>'.$row['Dribbling'].'</td>';
              echo '<td>'.$row['Defending'].'</td>';
              echo '<td>'.$row['Physical'].'</td>';
              echo '<td> <a href="delet.php?id='.$row['id'].'"> <button>Supprimer</button> </a> </td>';
              echo '<td> <a href="indexe.php?id='.$row['id'].'"> <button>Modifier</button> </a> </td>';
              echo '</tr>';
            } 
        ?>
      
        </tbody>
      </table>
    </section>
  






  




<script src="index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>

