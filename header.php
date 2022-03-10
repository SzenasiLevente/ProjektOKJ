<?php
session_start();
require 'inc/inc_connection.php';
require 'inc/inc_headerquery.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vapour - Online Games Service</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  
  <link rel="stylesheet" href="CSS/override.css?version=1">

</head>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">>
  <a class="navbar-brand col-md-3 col-lg-2 px-3 py-3 me-auto"href="index.php">Vapour</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="container-fluid">

  <?php
    if (isset($_SESSION['username'])) {
      echo '   
                  <ul class="navbar-navme ms-auto my-auto">
                        <li class="nav-item"><span class="navbar-text me-2 welcome-p">Welcome ' . $_SESSION['username'] . '!</span></li>
                  </ul>       
                  <div class="nav-item">   
                         <form class="d-flex" method="POST" action="inc/inc_logout.php">
                            <button class="btn header-button" type="submit" name="submit">Logout</button>
                          </form>
                  </div>';
    } else {
      echo '
                  <ul class="navbar-navme ms-auto my-auto">
                    <li class="nav-item"><a href="registration.php" class="nav-link"> Create an account.</a></li>
                  </ul>               
                <div class="nav-item">  
                    <form class="d-flex" method="POST" action="inc/inc_login.php">    
                      <input class="form-control me-2 index-input" type="text" placeholder="Username" name="inUsername">
                      <input class="form-control me-2 index-input" type="password" placeholder="Password" name="inPass">
                      <button class="btn header-button" type="submit" name="submit">Login</button>
                    </form>
                </div>';
    }
    ?>
  </div>
</header>

<body id="bootstrap-overrides">

  <div class="container-fluid">
    <div class="row">

      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
          <?php
          if(isset($_SESSION["username"])){
          echo'
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Games</span>
            <a class="link-secondary" href="#">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>';}
          if ($valuebattlefield != NULL){
              echo'
            <li class="nav-item px-3 py-2">
          <form action="inc/inc_gamename.php" method="post">
              <button class="btn headergame" type="submit" name="submit"><i class="bi bi-controller"></i> Call of Battlefield</button>
              <input type="hidden" name="gamehidden" value="Call of Battlefield">
            </form>
            </li>';}
          if ($valueloz != NULL){
            echo'
            <li class="nav-item px-3">
            <form action="inc/inc_gamename.php" method="post">
              <button class="btn headergame" type="submit" name="submit"><i class="bi bi-controller"></i> Legend of Zrolda</button>
              <input type="hidden" name="gamehidden" value="Legend of Zrolda">
            </form>
            </li>';}
          if ($valuerat != NULL){
            echo'
            <li class="nav-item px-3 pt-2">
            <form action="inc/inc_gamename.php" method="post">
              <button class="btn headergame" type="submit" name="submit"><i class="bi bi-controller"></i> Ratman</button>
              <input type="hidden" name="gamehidden" value="Ratman">
            </form>
            </li>';}
            ?>
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Navigation</span>
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="store.php">
              <i class="bi bi-joystick"></i>
                <span data-feather="file-text"></span>
                Selection of freeware
              </a>
            </li>
            <?php
            if (isset($_SESSION['username'])) {
             echo ' 
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
              <i class="bi bi-person-circle"></i>
                <span data-feather="file-text"></span>
                Profile
              </a>
            </li>';
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="aboutus.php">
              <i class="bi bi-mouse2"></i>
                <span data-feather="file-text"></span>
                About us
              </a>
            </li>
            <?php
            if (isset($_SESSION['username'])) {
              $admin = 'SELECT `users`.`userAdmin`
              FROM `users`
              WHERE `users`.`userName` = "'.$_SESSION['username'].'" LIMIT 1';

              $adminquery = mysqli_query($connection,$admin);
              $adminresult = mysqli_fetch_assoc($adminquery);
              $adminvalue = $adminresult["userAdmin"];

              if ($adminvalue == 1){
                echo '
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Admin</span>
                  <span data-feather="plus-circle"></span>
                </a>
                </h6>
                <li class="nav-item">
                  <a class="nav-link" href="admin.php">
                  <i class="bi bi-arrow-up-square"></i>
                    <span data-feather="file-text"></span>
                    Score approval
                  </a>
                </li>
                ';
              }
            }
            ?>
          </ul>
        </div>
      </nav>