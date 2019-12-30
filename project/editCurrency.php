<?php
session_start();
   require('includes/dbconn.php');
   require('includes/functions.php');
   require('guard.php');
   $code=$_GET['code'];

//    var_dump($code);
   $currency=getCurrency($pdo,$code);
//    dd($currency);
   $name=$currency['name'];
   $flag=$currency['flag'];
//    var_dump($customers);
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

                        <h4 class="card-title text-center col-10 text-light"> <b > Edit  :  </b> <i>  <img src="<?= $flag; ?>" alt="flag"> <?=$name?> </i></h4>
                        <div class="form-group">
                        <?php
                        echo"
                        <a class='btn btn-warning btn-sm' href='customerDetail.php?id=' role='button'><i class='fas fa-eye'></i></a>
                        <a  class='btn-success mr-1 btn btn-sm' href='editCustomer.php?id=' role='button'><i class='fas fa-edit    '></i></a>
                        <a class='btn btn-sm btn-danger' href='comfirmDelete.php?id=&first_name=&last_name=?' role='button'><i class='fa fa-trash' aria-hidden='true'></i></a>
                    
                        ";
                        ?>
                        </div>
                        </div>
                   
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="container">
                            <form action="updateCurrency.php" mehthod="get">
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>
                                                Name</small></label>
                                        <div class="col-sm-1-7">
                                            <input type="text" class="form-control" value="<?=$currency['name']?>" name="name"
                                                id="inputName" placeholder="" require>
                                            
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>Buying Rate
                                        </small></label>
                                        <div class="col-sm-1-7">
                                            <input type="text" class="form-control" value="<?=$currency['buying_rate']?>" name="buying_rate"
                                                id="inputName" placeholder="">
                                          
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>Selling Rate
                                       </small></label>
                                        <div class="col-sm-1-7">
                                            <input type="text" class="form-control" value="<?=$currency['selling_rate']?>" name="selling_rate"
                                                id="inputName" placeholder="" require>
                                            <input type="hidden" class="form-control" value="<?=$currency['code']?>" name="code" required>
                                            
                                        </div>
                                    </div>

                                    
                                    
                                    <div class="col-6 mt-5">
                                    <button class="btn btn-warning form-control">Cancel</button>
                                    </div>

                                    <div class="col-6 mt-5">
                                       <button class="btn btn-success form-control">Save Update</button>
                                        
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