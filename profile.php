<?php
require 'header.php';
require 'inc/inc_profquery.php';
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h1 text-white "><?php echo '' . $_SESSION["username"] . ' Users Profile' ?></h1>
  </div>

  <div class="d-flex justify-content-between flex-wrap text-white main-size">
    <div class="container-fluid">
      <div class="card bg-dark my-3">
        <div class="row">

          <div class="col-md-7 px-3">
            <div class="card-block px-6">
              <h4 class="card-title mx-5 my-5">Owned games</h4>
              <p class="card-text">
                <ul class="mx-5 my-5">
                  <?php
                  while ($row = mysqli_fetch_assoc($resultgames)) {
                    if($row['gameName'] != NULL){
                    echo '
                    <li>' . $row['gameName'] . '</li>';}
                    else{
                      echo '
                      <li>You currently do not own any games.</li>';}
                  }
                  ?>
                </ul>
                <form method="post" action="inc/inc_profilepic.php" enctype="multipart/form-data">
                <div class="form-group text-center mx-5 mt-auto">
                <input name="profilePic" class="form-control" type="file">
                   <button type="submit" name="submit" class="btn btn-light mx-5 my-3">Upload profile picture</button>
                   </div>
                </form>
              </p>
            </div>
          </div>
          <div class="col-md-5">
            <?php
            if ($valuepic == NULL) {
              echo '
              <img src="IMG/def.jpg" class="img-fluid card-img rounded mx-auto d-block">';
            } 
            else {
              echo '
                  <img src="IMG/' . $valuepic . '" class="img-fluid card-img rounded mx-auto d-block">';
            }
            ?>
          </div>
        </div>

      </div>

      <div class="card bg-dark my-3">
        <div class="row">

          <div class="col-md-12 px-3">
            <div class="card-block px-6">
              <h4 class="card-title mx-5 my-5">Your Scores</h4>
              <div class="table-responsive">
                <table class="table table-striped table-light text-center">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Game</th>
                      <th scope="col">Points</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $place = 0;
                    while ($row = mysqli_fetch_assoc($resultscores)) {
                      if ($row["aScorePoints"] != NULL) {
                      echo '
                        <tr>
                          <th scope="row">' . strval($place = $place + 1) . '</th>
                          <td>' . $row["gameName"] . '</td>
                          <td>' . $row["aScorePoints"] . '</td>
                        </tr>';}
                        else{
                          echo'                        
                          <tr>
                          <th scope="row">0</th>
                          <td>No scores recorded</td>
                          <td>0</td>
                        </tr>';}
                        }
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="col-md-12">
                <form action="inc/inc_scoresub.php" method="post">
                <div class="container text-center">
                <select name="gameSelect" id="gameSelect">
                <?php
                  while ($row = mysqli_fetch_assoc($resultgames2)) {
                    echo '<option value="'.$row["gameName"].'">'.$row["gameName"].'</option>';
                  }
                  ?>
                </select>
                <input type="number" name="scoreIn">
                <button type="submit" name="scoreSubmit" class="btn btn-light mx-1">Upload Score</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>

<?php require 'footer.php'; ?>