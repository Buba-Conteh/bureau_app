<?php
        //  session_start();
        // dd($_SESSION['user_id']);
?>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form action="customers.php" methood="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" name="shearch" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary" name="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>



        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['user_name'];?> <?= $_SESSION['user_surename'];?></span>

                <form action="includes/profilePic.php" method="POST" enctype="multipart/form-data">
                <img class="img-profile rounded-circle"
                    src="img/profile/<?=$_SESSION['profile_img']?>" onclick="trigger()" id="img">
                    <input style="display:none" type='file' name='profile_img' onchange='displayImage(this)' id='profile_img'>
                <input type="hidden" value="<?= $_SESSION['user_id'] ?>" name="id">
                    
                    <button type="submit" style="display:none" class="btn-xm btn-primary text-light" id="submit-profile">Save</button>
                    </form>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        
                <a class="dropdown-item" href="#">
                <form action="">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span onclick="trigger()">Profile</span>
                    
                   
                    </form>
                </a>
              
                <a class="dropdown-item" href="#">
              
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings

                 
                
                </a>
                
                <a class="dropdown-item" href="register.php">
                    <!-- <i class="fa " aria-hidden="true"></i> -->
                    <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                    Register new user
                    
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->