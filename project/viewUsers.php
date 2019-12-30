<?php
session_start();
   require('includes/dbconn.php');
   require('includes/functions.php');
   require('guard.php');
   $id=$_GET['id'];
//  dd($id);
   $viewUser=viewUser($pdo,$id);
//    dd($viewUser);
//    var_dump($debtor);

   $firstName=$viewUser['first_name'];
   $lastName=$viewUser['last_name'];
  
?>

<?php require('html-header.php'); ?>

<body>

    <div id="wrapper">
        <?php require('sideBar.php'); ?>

        <!-- <div id="content-wrapper" class="d-flex flex-column"> -->

        <div class="container">

            <div class="card text-left mt-5">

            <?php

                if(isset($_SESSION['confirm_delete'])){
                    $customerId = $_SESSION['customer_id'];
                    $firstName = $_SESSION['first_name'];
                    $lastName = $_SESSION['last_name'];
                    echo "<div class='alert alert-warning mt-2'>Do you really want to delete: $firstName<a class='btn btn-danger btn-sm mr-2' href='delete.php?id=$customerId&first_name=$firstName'>YES DELETE</a><a href='customers.php' class='btn btn-secondary btn-sm ml-2' >CANCEL</a></div>";
                    
                    unset($_SESSION['confirm_delete']);
                    
                    unset($_SESSION['first_name']);
    // unset($_SESSION['last_name']);
}

            ?>
                <div class="card-header bg-primary">
                     <div class="row">

                     <h4 class="card-title text-center col-10 text-light"> <b >View :  </b> <i> <?=$firstName?> <?=$lastName?></i></h4>
                    <div class="form-group">
                <?php
                    echo"
                    <a  class='btn-success mr-1 btn btn-sm' href='#' role='button'><i class='fas fa-eye'></i></a>
                    <a class='btn btn-warning btn-sm' href='editCustomer.php?id=$id' role='button'><i class='fas fa-user-edit    '></i></a>
                       <a class='btn btn-sm btn-danger' href='comfirmDelete.php?id=$id&first_name=$firstName&last_name=$lastName?' role='button'><i class='fa fa-trash' aria-hidden='true'></i></a>
                    </div>
                     </div>
                     ";
                     ?>
                   
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="container">
                            <form>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>First
                                                Name</small></label>
                                        <div class="col-sm-1-7">
                                            <!-- <input type="text" class="form-control" value="Omar" name="inputName"
                                                id="inputName" placeholder=""> -->
                                            <h4><?=$viewUser['first_name']?></h4>
                                        </div>
                                    </div>
                                   

                                    <div class="col-4">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>Last name
                                       </small></label>
                                        <div class="col-sm-1-7">
                                            <!-- <input type="text" class="form-control" value="Omar" name="inputName"
                                                id="inputName" placeholder=""> -->
                                            <h4> <?=$viewUser['last_name']?></h4>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>
                                                Phone</small></label>
                                        <div class="col-sm-1-7">
                                            <!-- <input type="text" class="form-control" value="Omar" name="inputName"
                                                id="inputName" placeholder=""> -->
                                            <h5> <?=$viewUser['phone']?></h5>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>
                                                Address</small></label>
                                        <div class="col-sm-1-7">
                                            <!-- <input type="text" class="form-control" value="Omar" name="inputName"
                                                id="inputName" placeholder=""> -->
                                            <h5> <?=$viewUser['address']?></h5>
                                        </div>
                                   
                                    </div>
                                 
                                    <div class="col-4">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>
                                               Email</small></label>
                                        <div class="col-sm-1-7">
                                            <!-- <input type="text" class="form-control" value="Omar" name="inputName"
                                                id="inputName" placeholder=""> -->
                                            <h5> <?=$viewUser['email']?></h5>
                                        </div>
                                    </div>
                                   
                                    <div class="col-4">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>
                                               User Type</small></label>
                                        <div class="col-sm-1-7">
                                            <!-- <input type="text" class="form-control" value="Omar" name="inputName"
                                                id="inputName" placeholder=""> -->
                                            <h5> <?=$viewUser['status']?></h5>
                                        </div>
                                       
                                    </div>
                                    <div class="col-6 text-center">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>
                                        Created Time</small></label>
                                        <div class="col-sm-1-7">
                                            <!-- <input type="text" class="form-control" value="Omar" name="inputName"
                                                id="inputName" placeholder=""> -->
                                            <h5><?=$viewUser['time']?></h5>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>
                                        Created Time</small></label>
                                        <div class="col-sm-1-7">
                                            <!-- <input type="text" class="form-control" value="Omar" name="inputName"
                                                id="inputName" placeholder=""> -->
                                            <h5><?=$viewUser['updated_time']?></h5>
                                        </div>
                                    </div>
                                    

                                </div>


                            </form>
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