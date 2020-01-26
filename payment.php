<?php
session_start();
   require('includes/dbconn.php');
   require('includes/functions.php');
   require('guard.php');
   $id=$_GET['id'];
//    dd($id);
   
   
   $firstName= $_GET['first_name'];
   $lastName= $_GET['last_name'];
   $currencies=getCurrencies($pdo);
  
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

                        <h4 class="card-title text-center col-10 text-light"> <b >Add Transaction For </b> <i> <?=$firstName?> <?=$lastName?></i></h4>
                        <div class="form-group">
                     
                        </div>
                        </div>
                   
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="container">
                        <form action="updatePayment.php" action="Get">
                                  

                                  <div class="form-group row">
                                      <div class="col-sm-7 mb-3 mb-sm-0">
                                          <input type="text" class="form-control form-control-user"
                                              placeholder="Amount" name="amount">
                                          <input type="hidden" class="form-control form-control-user"
                                              placeholder="Amount" name="id" value="<?=$id?>">
                                         
                                              <span class="text-sm text-danger" style="display: none;">first name is required</span>
                                      </div>
                                      <div class="col-sm-5">
                                        
                                          
                                           <select class="form-control" name="currency">
                                           <?php
                                foreach ($currencies as $currency) {
                                    # code...
                                $name=$currency['name'];
                                $flag=$currency['flag'];
                                $code=$currency['code'];
                                $buyingRate=$currency['buying_rate'];
                                $sellingRate=$currency['selling_rate'];
                                $symbol=$currency['symbol'];
                              
                                echo "
                                <option value='$code'> <img src='$flag' width='40' height='25' alt='flag'> $name($code)</option>
                                ";
                                }
                                
                                
           ?>
                                           </select>
                                         
                                              <span class="text-sm text-danger" style="display: none;">first name is required</span>
                                      </div>
                                  </div>


                                  <div class="form-group row">
                                    
                                       
                                        <select class="form-control" name="status">
                                          <option value="">Select Status</option>
                                          <option value="pending">pending</option>
                                          <option value="paid">paid</option>
                                         
                                        </select>
                                    
                                    </div>


                           <div class="form-group row text-center">
                           <button type="reset" class="btn btn-secondary col-5 form-control  ml-2">Reset</button>
                            <button type="submit" name="submit_payment" value="submit" class="btn btn-primary col-5 from-control mr-2">Save</button>
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