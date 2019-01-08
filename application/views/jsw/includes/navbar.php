    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="<?php echo base_url();?>">Port Information Management System</a>
            </div>
            <div class="collapse navbar-collapse justify-content-end">
         
                <ul class="navbar-nav">
                    <li class="nav-item">
                        Hi, <?php echo $this->session->userdata('log_name');?>                     
                    </li>

                     <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="material-icons">person</i>
                          <p class="d-lg-none d-md-block">
                           Account
                          </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <?php if($this->session->userdata('userType')==1){ ?>
                                <a class="dropdown-item" href="<?php echo base_url();?>Settings"><i class="material-icons">settings</i> Settings</a>
                            <?php } ?>
                          <a class="dropdown-item" href="<?php echo base_url();?>Home/Logout"><i class="material-icons">power_settings_new</i> Logout</a>
                        </div>
                  </li>
                   
                </ul>

            </div>
        </div>
    </nav>
    <!-- End Navbar -->
   <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">   
            <nav class="navbar navbar-expand-lg " id="navigation-example" style="margin-top: 45px;margin-bottom: 10px;">
                <div class="container-fluid">
                    <div class="navbar-header col-sm-2" style="">
                      <a class="" href="<?php echo base_url();?>Home/home">
                          <img src="<?php echo base_url();?>Theme/assets/img/JSW.png" style="height: 45px;float: left;" alt="JSW Dharamtar"/>
                      </a>
                    </div>
                    <ul class="nav navbar-nav col-sm-10" style="background-color: #000 !important;">
                        <li class="dropdown active" style="padding-left: 15px;">
                        <a  href="<?php echo base_url();?>Home/home">Dharamtar </a>
                      </li>
                       <?php if($this->session->userdata('userType')==1){ ?><li class="dropdown" style="padding-left: 15px;">
                        <a  href="<?php echo base_url();?>Settings"> Settings </a>
                      </li>
                      <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>