<?php
session_start();
   require('includes/dbconn.php');
   require('includes/functions.php');
  //  require('includes/guard.php');
   $users=getUsers($pdo);
  //  dd($users);
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
        <?php require('alert.php'); ?>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users or Admin</h1>
            <a href="register.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus    "></i> Add Users</a>
          </div>

          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Registeres Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Firtst Name</th>
                      <th>Last Name</th>
                      <th>Phone</th>
                      <th>email</th>
                      <th>Address</th>
                      <th>date</th>
                     
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Firtst Name</th>
                      <th>Last Name</th>
                      <th>Phone</th>
                      <th>email</th>
                      <th>Address</th>
                      <th>date</th>
                      
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>

                  <?php
                      foreach ($users as $user) {
                        $firstName=$user['first_name'];
                        $lastName=$user['last_name'];
                        $phone=$user['phone'];
                        $address=$user['address'];
                        $email=$user['email'];
                        $timeCreated=$user['time'];
                        $id=$user['id'];
                        echo"
                        <tr>
                          <td>$firstName</td>
                          <td>$lastName</td>
                          <td>$phone</td>
                          <td>$email</td>
                          <td>$address</td>
                          <td>$timeCreated</td>
                          
                       
                          
                          <td>
                          <a href='viewUsers.php?id=$id' ><i class='fas fa-eye text-success'></i></a>
                              ";
                            if($_SESSION["admin"]==="admin"){
                              echo"
                              <a href='editUser.php?id=$id'><i class='fas fa-edit'></i></a>
                            <a href='comfirmDelete.php?user_id=$id&first_name=$firstName&last_name=$lastName' ><i class='fas fa-trash text-danger'></i></a>
                              ";
                            }
                         echo"   </td>
                        </tr>
                        ";
                      }
                
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

      <?php require('footer.php'); date('m')?>