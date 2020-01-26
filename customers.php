<?php
session_start();
require('includes/dbconn.php');
require('includes/functions.php');
require('guard.php');
$totalCustomers = totalCustomer($pdo);
$pagination = pagRows('customers', $pdo, 3);
//   dd($_SESSION['admin']);

//    $id=$_GET['customer_id'];
// $customers=$customers=getCustomers($pdo);
// dd($_GET['shearch']);
$currentPage = '';
isset($_GET['submit']) ? $customers = shearch($pdo, $_GET['shearch']) : $customers = getCustomers($pdo, 3);

//    require('includes/creatCustomer.php');

// var_dump($customers);
?>


<?php require('html-header.php'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require('sideBar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require('header.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <?php require('alert.php') ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Customers</h1>
                        <a href="#" id="addUser" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#add"> <i class="fas fa-plus    "></i> Add
                            Customer</a>
                    </div>
                    <!-- Button trigger modal -->
                    <?php
                    if (isset($_SESSION['customer_verlidation'])) {
                        $massage = $_SESSION['customer_verlidation'];

                        echo "<div class='alert alert-danger mt-2'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                            </button>
                    $massage
                          </div>";

                        unset($_SESSION['customer_verlidation']);
                    }
                    ?>

                    <!-- Modal -->
                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title">Add Customer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">



                                    <form method="POST" name="add-customer" action="includes/creatCustomer.php">

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" placeholder="First Name" name="first_name">
                                                <span class="text-sm text-danger" style="display: none;">first name is required</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" placeholder="Last Name" name="last_name">
                                                <span class="text-sm text-danger" style="display: none;">first name is required</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="number" class="form-control form-control-user" placeholder="phone" name="phone">
                                                <span class="text-sm text-danger" style="display: none;">first name is required</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" placeholder="Email" name="email">
                                                <span class="text-sm text-danger" style="display: none;">first name is required</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" placeholder="Address" name="address">
                                                <span class="text-sm text-danger" style="display: none;">first name is required</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" placeholder="ID Number" name="national_id">
                                                <span class="text-sm text-danger" style="display: none;">first name is required</span>
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="reset" class="btn btn-md btn-secondary form-control">Reset</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-md btn-success form-control">Add</button>
                                        </div>
                                    </div>

                                </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="" id="modelId"  role="dialog" aria-labelledby="modelTitleId" aria-hidden="true"> -->

                    <!-- addd transaction modal ................... -->


                    <!-- Modal -->
                    <div class="modal fade" id="Addtransction" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add transaction for customer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        Add rows here

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- addd transaction modal End ................... -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Customers (<?= $totalCustomers ?>) </h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- <th>#</th> -->
                                            <th>Firtst Name</th>
                                            <th>Last Name</th>
                                            <th>NIN</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>date</th>
                                            <th>Add</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>#</th> -->
                                            <th>Firtst Name</th>
                                            <th>Last Name</th>
                                            <th>NIN</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>date</th>
                                            <th>Add</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

                                        foreach ($customers as $customer) {
                                            # code...
                                            $firstName = $customer['first_name'];
                                            $middleName = $customer['middle_name'];
                                            $lastName = $customer['last_name'];
                                            $phone = $customer['phone'];
                                            $address = $customer['address'];
                                            $time = $customer['updated_time'];
                                            //   $amount=$customer['amount'];
                                            $id = $customer['id'];



                                            echo "     
                    <tr class='text-capitalize'>
                   
                      <td>$firstName</td>
                      <td>$lastName</td>
                      <td>$phone</td>
                      <td>$phone</td>
                      <td>$address</td>
                      <td>$time/25</td>
                      <td><a class='text-center' href='addtransaction.php?id=$id&first_name=$firstName&last_name=$lastName' ><i class='fa fa-plus' aria-hidden='true'></i>
                      </a></td>
                      <td>
                     
                        <a href='customerDetail.php?id=$id&first_name=$firstName&last_name=$lastName'><i class='fas fa-eye text-success'></i></a>
                       ";
                                            if ($_SESSION["admin"] === "admin") {
                                                echo "
                        <a href='editCustomer.php?id=$id&first_name=$firstName&last_name=$lastName'><i class='fas fa-edit'></i></a>
                        <a href='comfirmDelete.php?customer_id=$id&first_name=$firstName&last_name=$lastName'><i class='fas fa-trash text-danger'></i></a>
                        ";
                                            }
                                            echo " </td>
                    </tr>";
                                        }
                                        if (!$customers) {
                                            echo "
                    <tr class='text-capitalize text-center'>
                     <td colspan='8'> No data found</td>
                    </tr>
                    ";
                                            // return;
                                        }
                                        ?>
                                    </tbody>
                                </table>


                                <!-- Modal -->
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <?php
                                        $i = 0;
                                        for ($index = 1; $index <= $pagination; $index++) {

                                            $i++;

                                            if ($index == $currentPage) {

                                                echo "
                    <li class='page-item active'><a class='page-link' href='?start=$index'>$index</a></li>
                      ";
                                            } else {
                                                echo "
  
                    <li class='page-item'><a class='page-link' href='?start=$index'>$index</a></li>
                      ";
                                            }
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" href="customers.php?start=<?= $i + 1 ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>


                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->




            <?php require('footer.php'); ?>