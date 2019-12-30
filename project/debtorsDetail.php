<?php
session_start();
   require('includes/dbconn.php');
   require('includes/functions.php');
   require('guard.php');
   $id=$_GET['id'];
   $firstName=$_GET['first_name'];
   $lastName=$_GET['last_name'];
   $debtor=viewDebtor($pdo,$id);

//    var_dump($customer);
//    die();

//   ;
?>

<?php require('html-header.php'); ?>

<body>

    <div id="wrapper">
        <?php require('sideBar.php'); ?>

        <!-- <div id="content-wrapper" class="d-flex flex-column"> -->

        <div class="container">

            <div class="card text-left mt-5">

            <?php

                
       require('alert.php')

            ?>
                <div class="card-header bg-primary">
                     <div class="row">

                     <h4 class="card-title text-center col-10 text-light"> <b > More Details :  </b> <i> <?=$firstName?> <?=$lastName?></i></h4>
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
                            <table  class="col-12 table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Currency</th>
                                        <th>Amount (in total)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($debtor as $debtor){
                                        echo "<tr>
                                                <td></td>
                                                <td>$customerTransaction[amount]</td>
                                             </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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