<?php 
require 'header.php'; 
$gamename = $_POST['gamehidden'];
$sqlpic = 'SELECT * FROM `games` WHERE `gameName` = "'.$gamename.'"';
$resultpic = mysqli_query($connection, $sqlpic);

$minreqsql = 'SELECT `minrequirements`.*
FROM `games`
    LEFT JOIN `minrequirements` ON `minrequirements`.`minGId` = `games`.`gameId`
WHERE `games`.`gameName` = "'.$gamename.'"';
$minreqresult = mysqli_query($connection, $minreqsql);

$recreqsql = 'SELECT `recrequirements`.*
FROM `games`
    LEFT JOIN `recrequirements` ON `recrequirements`.`recGId` = `games`.`gameId`
WHERE `games`.`gameName` = "'.$gamename.'"';
$recreqresult = mysqli_query($connection, $recreqsql);
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
        <?php
              while ($row = mysqli_fetch_assoc($resultpic)){

                echo'
        <h3>Game description</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur iusto ab doloribus. Ratione explicabo facere atque repudiandae sit saepe officia reprehenderit modi mollitia non recusandae accusamus, corrupti quibusdam quidem placeat architecto nobis, nihil quas nesciunt natus sunt expedita. Natus, in, sint, enim quaerat culpa aliquam repellat magni dicta vitae recusandae eum. Nostrum commodi, id vel reiciendis quidem saepe numquam quae. Animi ipsa ratione dignissimos similique?</p>
        </div>
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
    <tr>
      <th scope="row">1</th>
      <td>Sanyi</td>
      <td>50000</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Béla</td>
      <td>45000</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Karesz</td>
      <td>40000</td>
    </tr>
  </tbody>
</table>
      </div>
        </div>
      </div>
      </div>
    </main>

<?php require 'footer.php'; ?>