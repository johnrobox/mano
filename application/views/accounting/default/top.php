<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-sm-8">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="<?php echo base_url();?>index.php/accounting/DashboardController">MANO Hardware and Enterprises </a></h1>
	              </div>
	           </div>
	           <div class="col-sm-4">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php $fullname = $this->session->userdata("CashierFirstname"). " ".$this->session->userdata("CashierLastname"); ?>
                                    WELCOME
                                    <?php echo ucwords(strtolower($fullname)); ?>
                                <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Profile</a></li>
                                  <li><a href="profile.html">Settings</a></li>
	                          <li><a href="login.html">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>