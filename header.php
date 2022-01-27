<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="CSS/override.css">

</head>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" id="bootstrap-overrides">>

  <a class="navbar-brand col-md-3 col-lg-2 px-3 py-3" href="index.php">InfoGames</a>

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
                            <button class="btn index-input" type="submit" name="submit">Logout</button>
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
                      <button class="btn index-input" type="submit" name="submit">Login</button>
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
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">
                <span data-feather="home"></span>
                Selection of freeware
              </a>
              <a class="nav-link" aria-current="page" href="#">
                <span data-feather="home"></span>
                Game 1
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Game 2
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Game 3
              </a>
            </li>
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>placeholder</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                placeholder
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                placeholder
              </a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                placeholder
              </a>
            </li>
          </ul>
        </div>
      </nav>