<?php 
require 'header.php'; 
$gamename = $_POST['gamehidden'];
$sqlpic = 'SELECT * FROM `games` WHERE `gameName` = "'.$gamename.'"';
$resultpic = mysqli_query($connection, $sqlpic);
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1 text-white "><?php echo "".$gamename." " ?></h1>
      </div>

      <div class="d-flex justify-content-between flex-wrap text-white" style="font-size: 1.5rem;">
      <div class="container-fluid">
        <div class="row">
        <div class="col-lg-6">
        <h3>System requirements</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas assumenda porro amet corporis explicabo expedita soluta commodi repellat sequi ipsum nulla, atque alias tempore sed ratione illo exercitationem accusamus qui eaque vitae molestias magni aspernatur officia? Ducimus sint quo quia enim veniam, deleniti ipsa suscipit a recusandae ex quas quis nemo accusantium iure corporis, dolores quod.  </p>
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