<?php 
session_start();
require('html-header.php');
require('includes/functions.php');
$expenses=getExpenses($pdo);

 ?>

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
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Expenses</h1>
            <a href="addExpenses.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus    "></i> Add Expenses</a>
          </div>
    <?php require('alert.php'); ?>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Expense</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>subject</th>
                      <th>Details</th>
                      <th>Amount</th>
                      <th>Time</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>subject</th>
                      <th>Details</th>
                      <th>Amount</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                      foreach ($expenses as $expense) {
                        $subject=$expense['subject'];
                        $details=$expense['expense_detail'];
                        $amount=$expense['expense_amount'];
                        $time=$expense['expense_time'];
                        $id=$expense['id'];
                       
                        echo"
                        <tr>
                          <td>$subject</td>
                          <td>$details</td>
                          <td>$amount</td>
                          <td>$time</td>
                        
                        <td>
                          <a href='#' ><i class='fas fa-eye text-success'></i></a>
                            <a href='editExpenses.php?id=$id'><i class='fas fa-edit'></i></a>
                            <a href='comfirmDelete.php?expense_id=$id' ><i class='fas fa-trash text-danger'></i></a>
                          </td>
                        </tr>
                        ";
                      };
                
                    ?>
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