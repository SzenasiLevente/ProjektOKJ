<?php
require "header.php" 
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1 text-white ">Home</h1>
      </div>

      <div class="d-flex justify-content-between flex-wrap text-white main-size">
      <div class="container-fluid">
        <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
        
      <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
          <div class="card bg-dark text-white my-4 reg-border">
            <div class="card-body p-5">

              <form action="inc/inc_registration.php" method="post">

                <div class="form-outline mb-4">
                  <input type="text" id="userName" name="userName" class="form-control form-control-lg indexinput" required/>
                  <label class="form-label" for="userName">Username</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="userEmail" name="userEmail" class="form-control form-control-lg indexinput" required/>
                  <label class="form-label" for="userEmail">E-mail</label>
                </div>

                <div class="form-group mb-4">
                  <input type="password" id="userPassword" name="userPassword" class="form-control form-control-lg indexinput" onclick="passwordClick()" required>
                  <label class="form-label" for="userPassword">Password</label><br>
                  <script>
                    function passwordClick(){
                    alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");
                    }
                  </script>
                  </div>

                  <div class="form-group mb-4">
                  <input type="password" id="userPasswordConfirm" name="userPasswordConfirm" class="form-control form-control-lg indexinput" required/>         
                <label class="form-label" for="userPasswordConfirm">Confirm password</label>
                </div>                

                <div class="form-check d-flex justify-content-center mb-5">
                  <input
                    class="form-check-input me-2"
                    type="checkbox"
                    value="true"
                    id="userAccept"
                    name="userAccept"
                  />
                  <label class="form-check-label" for="userAccept">
                    I agree all statements in <a href="#!"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" id="submit" name="submit" class="btn btn-block btn-lg gradient-custom-4 btn-light">Register</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

      </div>    
        </div>
        <div class="col-lg-2"></div>
      </div>
        </div>
      </div>
      </div>
    </main>

<?php require "footer.php" ?>