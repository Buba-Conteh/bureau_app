<?php
session_start();
   require('includes/dbconn.php');
   require('includes/functions.php');
   require('guard.php');
   $id=$_GET['id'];

//    var_dump($id);
   $expense=getExpense($pdo, $id);
//    dd($expense);
//    $firstName= $customer['first_name'];
//    $lastName= $customer['last_name'];
//    var_dump($customer);
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

                        <h4 class="card-title text-center col-10 text-light"> <b > Edit :  </b><i>Expense</i>
                        <div class="form-group">
                        <?php
                        echo"
                        <a class='btn btn-warning btn-sm' href='customerDetail.php?id=$id' role='button'><i class='fas fa-eye'></i></a>
                        <a  class='btn-success mr-1 btn btn-sm' href='editCustomer.php?id=$id' role='button'><i class='fas fa-edit    '></i></a>
                        <a class='btn btn-sm btn-danger' href='comfirmDelete.php?id=$id' role='button'><i class='fa fa-trash' aria-hidden='true'></i></a>
                    
                        ";
                        ?>
                        </div>
                        </div>
                   
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="container">
                            <form action="update.php" mehthod="get">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>Suject</small></label>
                                        <div class="col-sm-1-7">
                                            <input type="text" class="form-control" value="<?=$expense['subject']?>" name="subject"
                                                id="inputName" placeholder="" require>
                                            <input type="hidden" value="<?=$expense['id']?>" name="id">
                                        </div>
                                    </div>
                                   

                                    <div class="col-4">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>Amount
                                       </small></label>
                                        <div class="col-sm-1-7">
                                            <input type="text" class="form-control" value="<?=$expense['expense_amount']?>" name="amount"
                                                id="inputName" placeholder="" require>
                                            
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3 mb-3">
                                        
                                        <div class="col-sm-1-7"> 
                                        <textarea cols="20" class="form-control" value="<?=$expense['expense_detail']?>" name="details" rows=""></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                    <button class="btn btn-warning form-control">Cancel</button>
                                    </div>

                                    <div class="col-6">
                                       <button class="btn btn-success form-control" value="submit" name="update_expense">Save Update</button>
                                        
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