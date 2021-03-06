
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    
                    <div style="" class="row">
                        <div class="col-xs-6" style="padding: 8px 8px 8px 35px">
                            <?php
                            if (empty($account[0]->admin_image)) {
                                if ($account[0]->admin_gender == 1) 
                                    $image_name = "male.png";
                                else if ($account[0]->admin_gender == 2)
                                    $image_name = "female.png";
                                else 
                                    $image_name = "not-set.png";
                                $image_link = "default/" . $image_name;
                            } else {
                                $image_link = "uploads/" . $account[0]->admin_image;
                            }
                            ?>
                            <img src="<?php echo base_url();?>images/administrator/admin_users/<?php echo $image_link; ?>" style="height: 100px; width: 100px; border: 1px solid black" class="img-circle img-responsive changeProfile"/>
                        </div>
                        <div class="col-xs-4 text-center" style="padding: 35px 0px 0px 0px;">
                            <?php echo $account[0]->admin_firstname ." ".$account[0]->admin_lastname;?>
                            <br>
                            <span class="fa fa-check-circle" style="color: green"></span>
                            <small>Online</small>
                        </div>
                    </div>
                    
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/administrator/DashboardController/index"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url();?>index.php/administrator/EmployeeController/index"><i class="fa fa-table fa-fw"></i> Employees</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/administrator/CashierController/index"><i class="fa fa-table fa-fw"></i> Cashiers</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/administrator/ProductController/index"><i class="fa fa-table fa-fw"></i> Products</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Administrator<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>index.php/administrator/AdminUserController/register">Register</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>index.php/administrator/AdminUserController/adminList">List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Account Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>index.php/administrator/AccountController/accountProfile">Profile</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>index.php/administrator/AccountController/accountSetting">Settings</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        
        
    <!-- CONTENT IN EVERY PAGE BEGINS HERE -->  
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php echo (isset($page_header)) ? strtoupper($page_header ): "Administrator Panel"; ?>
                    </h1>