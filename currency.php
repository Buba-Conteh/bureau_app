<?php
session_start();
require('html-header.php');
require('includes/functions.php');
//  require('guard.php');
$currencies = getCurrencies($pdo);
// dd($currencies);
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jallow</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

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
                    <?php require('alert.php'); ?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Currency <span class="text-success">(GMD as the base currency)</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                            <th>code</th>
                                            <th>Symbol</th>
                                            <th>Buying</th>
                                            <th>Selling</th>

                                            <?=$_SESSION['admin']=="admin"?"<th>edit</th>":''?>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>name</th>
                                            <th>code </th>
                                            <th>Symbol </th>
                                            <th>Buying</th>
                                            <th>Selling</th>

                                            <?=$_SESSION['admin']=="admin"?"<th>edit</th>":''?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($currencies as $currency) {
                                            # code...
                                            $name = $currency['name'];
                                            $flag = $currency['flag'];
                                            $code = $currency['code'];
                                            $buyingRate = $currency['buying_rate'];
                                            $sellingRate = $currency['selling_rate'];
                                            $symbol = $currency['symbol'];

                                            //   $time=$currency['updated_time'];



                                            //   class='' data-toggle='modal' data-target='#viewModal'

                                            echo "     
                    <tr>
                      <td>  <img src='$flag' width='40' height='25' alt='flag'> $name</td>
                      <td>$code</td>
                      <td>$symbol</td>
                      <td>$buyingRate</td>
                      <td>$sellingRate</td>
                    ";

                                            if ($_SESSION['admin']=="admin") {
                                                echo "
                    <td class='text-center'>
                    <a href='editCurrency.php?code=$code'><i class='fas fa-edit'></i></a>
                  </td>
                  ";
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>

                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php require('footer.php'); ?>

            <!-- MAHKQxSK9g9KYJX3gwe8fNBhT979CP API_Key -->