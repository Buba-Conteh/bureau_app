<?php
session_start();
require('includes/dbconn.php');
require('includes/functions.php');
require('guard.php');

$totalTransaction = totalTransaction($pdo);

$pagination = pagRows('transaction', $pdo, 10);
//    $id=$_GET['customer_id'];
// $customers=$customers=getCustomers($pdo);
// dd($_GET['shearch']);
$currentPage = '';
isset($_GET['submit']) ? $customers = shearch($pdo, $_GET['shearch']) : $transactions = pagination(10, $pdo, 'transaction');
$currencies = getCurrencies($pdo);
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
                        <h1 class="h3 mb-0 text-gray-800">Transactions</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modelId"> <i class="fas fa-plus    "></i> Add
                            Capital</a>
                    </div>
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade model-md" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title">Create capital</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

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

                                    <form method="POST" action="includes/insertTransaction.php">

                                        <div class="form-group row">
                                            <div class="col-lg-12 col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" placeholder="Amount" name="amount" required>
                                                <input type="hidden" class="form-control form-control-user" placeholder="Amount" name="type" value="capital" required>
                                                <input type="hidden" class="form-control form-control-user" placeholder="Amount" name=" base_currency" value="GMD" required>
                                                <input type="hidden" class="form-control form-control-user" placeholder="Amount" name="id" value="0" required>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">



                                                <select id="my-select" class="custom-select" name="currency">
                                                    <?php
                                                    foreach ($currencies as $crrency) {
                                                        # code...
                                                        echo "
                                                       <option class='text-muted'>" . $crrency['code'] . "</option>

                                             ";
                                                    }

                                                    ?>
                                                </select>

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
                            <h6 class="m-0 font-weight-bold text-primary">transation (<?= $totalTransaction ?>) </h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>GMD</th>

                                            <th>rate</th>
                                            <th>amount</th>
                                            <th>currency</th>
                                            <th>update at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>GMD</th>

                                            <th>rate</th>
                                            <th>amount</th>
                                            <th>currency</th>
                                            <th>update at</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($transactions as $transaction) {
                                            # code...
                                            $transactionDate = $transaction['transaction_date'];
                                            $transactionType = $transaction['type'];
                                            $customer = $transaction['customer_id'];
                                            $code = $transaction['currency_code'];
                                            $rate = $transaction['curent_rate'];
                                            $BaseCurrency = $transaction['base_currency'];
                                            $amount = $transaction['amount'];
                                            $time = $transaction['update_time'];
                                            $id = $transaction['id'];
                                            //   $amount=$customer['amount'];
                                            //   $id=$customer['id'];

                                            //   class='' data-toggle='modal' data-target='#viewModal'

                                            echo "     
                    <tr class='text-capitalize'>
                      <td>$transactionDate</td>
                      <td>$transactionType</td>
                      <td>$BaseCurrency</td>
                      
                      <td>$rate</td>
                      
                      <td>$amount</td>
                      <td>$code</td>
                      <td>$time</td>
                      
                      <td>
                   
                        <a href='transactionDetail.php?id=$id'><i class='fas fa-eye text-success'></i></a>
                      
                        ";
                                            if ($_SESSION['admin'] === "admin") {
                                                echo "
                             <a href='editTransaction.php?id=$id'><i class='fas fa-edit'></i></a>
                        <a href='comfirmDelete.php?transaction_id=$id'><i class='fas fa-trash text-danger'></i></a>
                            ";
                                            }
                                            echo "  </td>
                    </tr>";
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
                                            <a class="page-link" href="transaction.php?start=<?= $i + 1 ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>

                                <script>
                                    $('#exampleModal').on('show.bs.modal', event => {
                                        var button = $(event.relatedTarget);
                                        var modal = $(this);
                                        // Use above variables to manipulate the DOM

                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



            <script>
                $('#exampleModal').on('show.bs.modal', event => {
                    var button = $(event.relatedTarget);
                    var modal = $(this);
                    // Use above variables to manipulate the DOM

                });
            </script>
            <?php require('footer.php'); ?>