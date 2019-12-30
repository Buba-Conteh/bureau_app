<?php

session_start();
require('includes/dbconn.php');
require('guard.php');
require('includes/functions.php');
$currencies = getCurrencies($pdo);

require('html-header.php');

$debtors = getDebtors($pdo);
//  createDebtor($pdo);
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
          <!-- button toggle for new debtor -->
          <?php require('alert.php'); ?>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tables</h1>
            <a href="#" id="addUser" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modelId"> <i class="fas fa-plus    "></i> Add
              Debtor</a>
          </div>
          <!-- button toggle for new debtor -->
          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Debtors</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Firtst Name</th>
                      <th>Last Name</th>
                      <th>Phone</th>
                      <th>NIN</th>
                      <th>Address</th>
                      <th>Paid</th>
                      <th>Amount</th>
                      <th>Balance</th>
                      <th>date</th>
                      <!-- <th>Status</th> -->
                      <th>Info</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Firtst Name</th>
                      <th>Last Name</th>
                      <th>Phone</th>
                      <th>NIN</th>
                      <th>Addres</th>
                      <th>Paid</th>
                      <th>Amount</th>
                      <th>Balance</th>
                      <th>date</th>
                      <!-- <th>Status</th> -->



                      <th>Info</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    foreach ($debtors as $debtor) {
                      # code...
                      $firstName = $debtor['first_name'];
                      //   $middleName=$debtor['middle_name'];
                      $lastName = $debtor['last_name'];
                      $phone = $debtor['phone'];
                      $nationalId = $debtor['id_number'];
                      $address = $debtor['address'];
                      // $status=$debtor['status'];
                      $amount = $debtor['owings_amount'];
                      $paid = $debtor['paid_amount'];
                      $balance = $debtor['balance'];
                      $time = $debtor['debt_date'];
                      //   $amount=$debtor['amount'];
                      $id = $debtor['id'];
                      $paid < $amount ? $stcl = 'danger' : ($stcl = 'success');
                      //   class='' data-toggle='modal' data-target='#viewModal'

                      echo "     
                    <tr>
                      <td>$firstName</td>
                      <td>$lastName</td>
                      <td>$phone</td>
                      <td>$nationalId</td>
                      <td>$address</td>
                      <td class='text-$stcl'>$paid</td>
                      <td>$amount</td>
                      <td>$balance</td>
                      <td>$time</td>
                     
                      
                      <td><a class='text-center' href='payment.php?id=$id&first_name=$firstName&last_name=$lastName'><i class='fa fa-plus' aria-hidden='true'></i>
                      </a></td>
                      <td>
                        
                        <a href='viewDebtor.php?id=$id'><i class='fas fa-eye text-success'></i></a>
                        ";

                      if ($_SESSION["admin"] === "admin") {
                        echo "
                        <a href='comfirmDelete.php?debtor_id=$id&first_name=$firstName&last_name=$lastName'><i class='fas fa-trash text-danger'></i></a>
                        ";
                      }
                      echo "  
                   
                    </td>
                    </tr>
                    ";
                    }
                    if (!$debtors) {
                      echo "
                    <tr class='text-capitalize text-center'>
                    <td colspan='11'> No data found</td>
                    </tr>
                    ";
                      // return;
                    }
                    // <a href='editdebtor.php?id=$id'><i class='fas fa-edit'></i></a>
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        <!-- togglable modal for new debtor -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">

                <h5 class="modal-title">Add Debtor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">



                <form method="get" name="add-customer">

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
                    <div class="col-md-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user" placeholder="Address" name="address">
                      <span class="text-sm text-danger" style="display: none;">first name is required</span>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-user" placeholder="ID Number" name="national_id">
                      <span class="text-sm text-danger" style="display: none;">first name is required</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-7 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user" placeholder="Amount" name="amount">
                      <span class="text-sm text-danger" style="display: none;">first name is required</span>
                    </div>
                    <div class="col-sm-5">


                      <select class="form-control" name="currency" id="">
                        <?php
                        foreach ($currencies as $currency) {
                          # code...
                          $name = $currency['name'];
                          $flag = $currency['flag'];
                          $code = $currency['code'];
                          $buyingRate = $currency['buying_rate'];
                          $sellingRate = $currency['selling_rate'];
                          $symbol = $currency['symbol'];

                          echo "
                                          <option value='$code'> <img src='$flag' width='40' height='25' alt='flag'> $name($code)</option>
                                          ";
                        }


                        ?>
                      </select>

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
                    <button type="submit" class="btn btn-md btn-success form-control" name="submit" value="submit">Add</button>
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
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">

                </div>
              </div>
              <div class="modal-footer">

              </div>
            </div>
          </div>
        </div>

        <script>
          $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM

          });
        </script>

        <!-- togglable modal for new debtor -->

      </div>
      <!-- End of Main Content -->
      <?php require('footer.php'); ?>