    <div class="page-content">
    	<div class="row">
		  <div class="col-sm-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="<?php if ($page == 1) echo "current";?>"><a href="<?php echo base_url();?>index.php/accounting/DashboardController"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li class="<?php if ($page == 2) echo "current";?>"><a href="<?php echo base_url();?>index.php/accounting/CashierPanelController"><i class="glyphicon glyphicon-calendar"></i> Cashier Panel</a></li>
                    <li class=""><a href="<?php echo base_url();?>index.php/accounting/ProductController"><i class="glyphicon glyphicon-calendar"></i> Products</a></li>
                    <li class=""><a href="<?php echo base_url();?>index.php/accounting/ProductController"><i class="glyphicon glyphicon-calendar"></i> Sales Report</a></li>
                    <li class=""><a href="<?php echo base_url();?>index.php/accounting/ProductController"><i class="glyphicon glyphicon-calendar"></i> Statistics</a></li>
                    <li class=""><a href="<?php echo base_url();?>index.php/accounting/ProductController"><i class="glyphicon glyphicon-calendar"></i> My Account</a></li>
                    <li class=""><a href="<?php echo base_url();?>index.php/accounting/ProductController"><i class="glyphicon glyphicon-calendar"></i> Logout</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>
		  <div class="col-sm-10">