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
        <div class="row">
        <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-6">
            <h5>Minimum requirements</h5>
            <?php
          while ($row = mysqli_fetch_assoc($minreqresult)){

            echo'
            <ul>
              <li>'.$row['minOS'].'</li>
              <li>'.$row['minProcessor'].'</li>
              <li>'.$row['minMemory'].' GB</li>
              <li>'.$row['minGPU'].'</li>
              <li>'.$row['minStorage'].'</li>
            </ul>';
          }
            ?>
          </div>
          <div class="col-lg-6">
          <h5>Recommended requirements</h5>
          <?php
          while ($row = mysqli_fetch_assoc($recreqresult)){

            echo'
            <ul>
              <li>'.$row['recOS'].'</li>
              <li>'.$row['recProcessor'].'</li>
              <li>'.$row['recMemory'].' GB</li>
              <li>'.$row['recGPU'].'</li>
              <li>'.$row['recStorage'].'</li>
            </ul>';
          }
            ?>
          </div>
        </div>
        <h3>Game description</h3>
        <?php
        while ($row = mysqli_fetch_assoc($descresult)){
            echo'<p>'.$row["gameDesc"].'</p>';
        }
        ?>
        </div>
        <?php
              while ($row = mysqli_fetch_assoc($resultpic)){

                echo'
        <div class="col-lg-6">
          <img src="IMG/'. $row["gamePic"] .'" class="img-fluid rounded rounded mx-auto d-block" style="height: 350px;" alt="gameone">
          <p class="text-center"><a href="#">Get the game here!</a></p>';
          }
        ?>

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
    </main>

<?php require 'footer.php'; ?>