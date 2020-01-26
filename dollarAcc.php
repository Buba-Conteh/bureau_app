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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dollar Account</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="th-sm">First Name</th>
                                            <th>Last Name</th>
                                            <th>Id number</th>

                                            <th>date</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Id number</th>

                                            <th>date</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>

                                            <td>03/04/2019</td>
                                            <td>$320,800</td>
                                            <td>
                                                <a href="#"><i class="fas fa-eye text-success"></i></a>
                                                <a href="#"><i class="fas fa-edit"></i></a>
                                                <a href="#"><i class="fas fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php require('footer.php'); ?>