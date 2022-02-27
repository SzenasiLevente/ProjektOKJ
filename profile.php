<?php 
require 'header.php'; 
require 'inc/inc_gamequery.php';
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1 text-white ">Profile</h1>
      </div>

      <div class="d-flex justify-content-between flex-wrap text-white" style="font-size: 1.5rem;">
      <div class="container-fluid">
      <div class="card bg-dark my-3">
    <div class="row">

      <div class="col-md-7 px-3">
        <div class="card-block px-6">
          <h4 class="card-title mx-5 my-5"><?php echo ''.$_SESSION["username"].''?></h4>
          <p class="card-text">
        <?php
        while ($row = mysqli_fetch_assoc($descresult)){
            echo'<p class="mx-5">'.$row["gameDesc"].'</p>
            <button class="btn btn-light mx-5 my-5">Get the game here</button>';
        }
        ?>
          </p>
        </div>
      </div>
      <div class="col-md-5">
      <?php
              while ($row = mysqli_fetch_assoc($resultpic)){

                echo'
          <img src="IMG/'. $row["gamePic"] .'" class="img-fluid card-img rounded mx-auto d-block float-right" alt="gameone">';
          }
        ?>
      </div>
        </div>

      </div>

      <div class="card bg-dark my-3">
    <div class="row">

      <div class="col-md-12 px-3">
        <div class="card-block px-6">
          <h4 class="card-title mx-5 my-5">Scores</h4>
          <div class="table-responsive">
          <table class="table table-striped table-light text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Points</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $place = 0;
  while ($row = mysqli_fetch_assoc($leaderresult)){

    echo'
    <tr>
      <th scope="row">'.strval($place = $place+1).'</th>
      <td>'.$row["userName"].'</td>
      <td>'.$row["aScorePoints"].'</td>
    </tr>';
  }
  ?>
  </tbody>
</table>
</div>
        </div>
      </div>
        </div>
      </div>
    </div>
    </main>

<?php require 'footer.php'; ?>