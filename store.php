<?php require 'header.php'; 
$sqlgame = "SELECT * FROM `games`;";
$resultgame = mysqli_query($connection, $sqlgame);
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1 text-white ">Pick games!</h1>
      </div>

      <div class="d-flex justify-content-between flex-wrap text-white" style="font-size: 1.5rem;">
      <div class="container-fluid">
        <div class="row">

        <div class="col-lg-2">
        </div>

        <div class="col-lg-8">
        <div id="carouselExampleDark" class="carousel carousel-dark slide my-6" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="IMG/store.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>The Store</h5>
        <p>Get all of your games here.</p>
      </div>
    </div>
    <?php
      while ($row = mysqli_fetch_assoc($resultgame)){
        echo '
        <div class="carousel-item">
        <form action="game.php" method="POST">
        <input href="game.php" type="image" src="IMG/'.$row["gamePic"].'" class="d-block w-100" name="submitimg">
        <input type="hidden" name="gamehidden" value="'.$row["gameName"].'">
        </form>
          <div class="carousel-caption d-none d-md-block">
          <h5>'.$row["gameName"].'</h5>
          <p>Very epic '.$row["gameType"].' game.</p>
        </div>
        </div>
        ';        
      }
    ?>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        </div>
<div class="col-lg-2"></div>
      </div>
        </div>
      </div>
      </div>
    </main>

<?php require 'footer.php'; ?>