<?php
session_start();
 require('html-header.php');
  // = (($_SESSION['errorEmail']) ? ($_SESSION['errorEmail']) :'');
  // require('registerNewUser.php');
//  if (!($_SESSION['errorEmail'] == "" )) {
//   $_SESSION['errorEmail']="enter valid email";
//   unset($_SESSION['errorEmail']);
//  }else{
//   $retVal=$_SESSION['errorEmail'];
//  }

?>

<body >

 <div id="wrapper">
    <?php require('sideBar.php'); ?>
 
  <!-- <div id="content-wrapper" class="d-flex flex-column"> -->
  
  <div class="container"  >
 
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create A New User</h1>
              </div>
              <?php
              if(isset($_SESSION['verlidation'])){
                   $massage=$_SESSION['verlidation'];
                    echo "<div class='alert alert-danger mt-2'>$massage</div>";
                    
                    unset($_SESSION['verlidation']);
                    
                    // unset($_SESSION['first_name']);
                    // unset($_SESSION['last_name']);
};

?>
              <form class="user" METHOD="POST" action="registerNewUser.php">
                <div class="form-group row">
                
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="first_name" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="last_name" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group row">
                
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="address" placeholder="Address">
                  </div>
                  <div class="col-sm-6">
                    <input type="number" class="form-control form-control-user" name="phone" placeholder="Phone">
                  </div>
                </div>

                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address">
                  <span class="text-danger"></span>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="comfirm_password" placeholder="Repeat Password">
                  </div>
                </div>

                <div class="form-group">
                  
                    <select class="custom-select" name="status" id="">
                     
                      <option value="user">User</option>
                      <option value="admin">Admin</option>
                      
                    </select>
                
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="admin_password" placeholder="Admin Password">
                </div>
                <a href="#" >
                <button class="btn btn-primary btn-user btn-block" type="submit"> Register Account</button>
                </a>
              
      
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
    <!-- </div> -->
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
