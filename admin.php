<?php require 'header.php';
require 'inc/inc_admin.php  ' ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1 text-white ">Admin</h1>
        </div>
        <div class="d-flex justify-content-between flex-wrap text-white" style="font-size: 1.5rem;">
    <div class="container-fluid">
        <div class="card bg-dark my-3">
        <div class="row">

          <div class="col-md-12 px-3">
            <div class="card-block px-6">
              <h4 class="card-title mx-5 my-5">Not approved scores</h4>
              <div class="table-responsive">
                <table class="table table-striped table-light text-center">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Game</th>
                      <th scope="col">User</th>
                      <th scope="col">Points</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($resultnScores)) {
                      echo '
                        <tr>
                          <th scope="row">' . $row["nScoreId"] . '</th>
                          <td>' . $row["gameName"] . '</td>
                          <td>' . $row["userName"] . '</td>
                          <td>' . $row["nScorePoints"] . '</td>
                        </tr>';
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="col-md-12">
                <form action="inc/inc_scoresub.php" method="post">
                <div class="container text-center">
                <select name="scoreSelect" id="scoreSelect" class="form-select">
                <?php
                  while ($row = mysqli_fetch_assoc($scorequeryresult)) {
                    echo '<option value="'.$row["nScoreId"].'">'.$row["nScoreId"].'</option>';
                  }
                  ?>
                </select><br>
                <button type="submit" name="scoreSubmit" class="btn btn-success mx-1">Approve Score</button>
                
                <button type="submit" name="deleteSubmit" class="btn btn-danger mx-1">Delete Score</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        </div>
    </main>

<?php require 'footer.php'; ?>