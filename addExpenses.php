<?php
session_start();
   require('includes/dbconn.php');
   require('includes/functions.php');
   require('guard.php');
   if(isset($_POST["submit"])){insertExpenses($pdo);}
 
?>

<?php require('html-header.php'); ?>

<body>

    <div id="wrapper">
        <?php require('sideBar.php'); ?>

        <!-- <div id="content-wrapper" class="d-flex flex-column"> -->

        <div class="container">

            <div class="card text-left mt-5">

            <?php

             require('alert.php');

            ?>
                <div class="card-header bg-primary">
                     <div class="row">

                        <h4 class="card-title text-center col-10 text-light"> <b >Add Expenses (D)</b></h4>
                        <div class="form-group">
                     
                        </div>
                        </div>
                   
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="container">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="form-group row">

                                    <div class="col-6">
                                        <label for="inputName" class="col-sm-1-7 col-form-label"><small>Subject</small></label>
                                    <div class="col-sm-1-7">
                                    <input type="text" class="form-control" value="" name="subject" id="inputName" placeholder="subject" required>
                                        </div>
                                    </div>
                                    


                                    <div class="col-4 mb-5">
                                        
                                     <label for="inputName" class="col-sm-1-7 col-form-label"><small>amount</small></label>
                                    <div class="col-sm-1-7">
                                    <input type="text" class="form-control" value="" name="amount" id="inputName" placeholder="amount" required>
                                        </div>
                                       
                                    </div>

                                    <div class="col-12 mb-5">
                                    
                                         <label for="inputName" class="col-sm-1-7 col-form-label"><small>Details</small></label>
                                         <div class="col-sm-1-7">
                                   <textarea name="details" placeholder="write details of the expenses here" class="form-control" rows="8" cols="30" ></textarea>
                                         </div>
                                    </div>
                                   
                                    <div class="col-6">
                                    <button class="btn btn-warning form-control" type="reset">Cancel</button>
                                    </div>

                                    <div class="col-6">
                                       <button class="btn btn-success form-control" name="submit" value="submit">Save</button>
                                        
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