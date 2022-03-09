<?php 
require 'header.php'; 
require 'inc/inc_gamequery.php';
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1 text-white "><?php echo "".$gamename." " ?></h1>
      </div>

      <div class="d-flex justify-content-between flex-wrap text-white" style="font-size: 1.5rem;">
      <div class="container-fluid">
      <div class="card bg-dark my-3">
    <div class="row">

      <div class="col-md-7 px-3">
        <div class="card-block px-6">
          <h4 class="card-title mx-5 my-5">Game description</h4>
          <p class="card-text">
        <?php
        while ($row = mysqli_fetch_assoc($descresult)){
            echo'<p class="mx-5">'.$row["gameDesc"].'</p>';
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
      <div class="col-md-12">
      <?php
            if (isset($_SESSION['username'])) {
             echo ' 
      <div class="text-center pb-4 mt-1">
        <button class="btn btn-light mx-auto" style="width:35%;">Get the game here</button>
      </div>';
    }
    else{
      echo'<div class="text-center pb-4 mt-1">
      <p>Register to download the game!</p>
    </div>';
    }?>
          </div>
          </div>
      </div>

      <div class="card bg-dark my-3">
    <div class="row">

      <div class="col-md-6 px-3">
        <div class="card-block px-6">
          <h4 class="card-title mx-5 my-5">Minimum requirements</h4>
          <p class="card-text">
          <?php
          while ($row = mysqli_fetch_assoc($minreqresult)){

            echo'
            <ul class="mx-5 my-5">
              <li>'.$row['minOS'].'</li>
              <li>'.$row['minProcessor'].'</li>
              <li>'.$row['minMemory'].' GB</li>
              <li>'.$row['minGPU'].'</li>
              <li>'.$row['minStorage'].'</li>
            </ul>';
          }
            ?>
          </p>
        </div>
      </div>
      <div class="col-md-6 px-3">        
      <div class="card-block px-6">
      <h4 class="card-title mx-5 my-5">Recommended requirements</h4>
      <p class="card-text">
      <?php
          while ($row = mysqli_fetch_assoc($recreqresult)){

            echo'
            <ul class="mx-5 my-5">
              <li>'.$row['recOS'].'</li>
              <li>'.$row['recProcessor'].'</li>
              <li>'.$row['recMemory'].' GB</li>
              <li>'.$row['recGPU'].'</li>
              <li>'.$row['recStorage'].'</li>
            </ul>';
          }
            ?>
      </p>
      </div>
      </div>
      </div>
      </div>
      <div class="card bg-dark my-3">
    <div class="row">

      <div class="col-md-12 px-3">
        <div class="card-block px-6">
          <h4 class="card-title mx-5 my-5">Top 3 leaderboard</h4>
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