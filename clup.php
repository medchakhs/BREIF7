
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
                       <a  href="index.php" class="nav-link" id="ajou">
                          <i class="far fa-circle nav-icon"></i>
                         <p>
                            Ajouter joueurs
                         </p>
                        </a>
                      </li>
                  </li>
                  <li class="nav-item">
                    <a href="clup.php" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                            Ajouter clup
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="nationality.php" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                            Ajouter Nationality
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
                <label class="labl">Name Clup </label>
                <input class="inpt" id="name" name="nome" type="text" placeholder="Enter name">

                <label class="labl">Photo</label>
                <input class="inpt" id="imge" name="photo" type="text" placeholder="Photo URL">
            </div>
            <div class="form-group">
                <button type="submit" name="btnAjoute">Ajouter</button>
            </div>
        </form>
    </section>

<?php
  include('database.php');

  if (isset($_POST["btnAjoute"])) {
    $name = $_POST['nome']; 
    $photo = $_POST['photo'];
    $stmt = $conn->prepare("INSERT INTO club (Club_name, Photo) VALUES (?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ss", $name, $photo);

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
            <th>photo</th>
            <th>Supprimer</th>
            <th>Modifier</th>
          </tr>
        </thead>
        <tbody id="tbody"> 
      <?php 
            include ('database.php');
            $query = "SELECT * FROM club";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($result)){
              echo '<tr>';
              echo '<td>'.$row['Club_name'].'</td>';
              echo '<td><img src="'.$row['Photo'].'" style ="width: 40px;"></td>';
              echo '<td> <a href="Deleteclup.php?id='.$row['Id_club'].'"> <button>Supprimer</button> </a> </td>';
              echo '<td> <a href="ubdateclup.php?id='.$row['Id_club'].'"> <button>Modifier</button> </a> </td>';
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

