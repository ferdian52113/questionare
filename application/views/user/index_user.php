<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Sincerity 360</title>

    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo base_url()?>css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url()?>js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url()?>img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('nama')?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $this->session->userdata('unit')?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo base_url()?>user/logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            GI
                        </div>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url()?>user"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>

                    </li>
                    <li >
                        <a href="<?php echo base_url()?>user/assign_people"><i class="fa fa-users"></i> <span class="nav-label">Assess People</span></a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url()?>user/myscore"><i class="fa fa-line-chart"></i> <span class="nav-label">My Score</span></a>
                    </li>
                    <?php if($this->session->userdata('level')=='VP') { ?>
                    <li class="">
                        <a href="<?php echo base_url()?>user/unitscore"><i class="fa fa-line-chart"></i> <span class="nav-label">Unit Score</span></a>
                    </li>
                    <?php } ?>
                    <?php if($this->session->userdata('level')=='Direktur') { ?>
                    <li class="">
                        <a href="<?php echo base_url()?>user/direktoratscore"><i class="fa fa-line-chart"></i> <span class="nav-label">Direktorat Score</span></a>
                    </li>
                    <?php } ?>
                    <?php if($this->session->userdata('level')=='SM') { ?>
                    <li class="">
                        <a href="<?php echo base_url()?>user/smscore"><i class="fa fa-line-chart"></i> <span class="nav-label">Team Score</span></a>
                    </li>
                    <?php } ?>
                    <li class="">
                        <a href="<?php echo base_url()?>user/assign_people"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
                    
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
          <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
              <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
              
          </div>
              <ul class="nav navbar-top-links navbar-right">
                  <li>
                      <span class="m-r-sm text-muted welcome-message">Welcome to Garuda Sincerity 360.</span>
                  </li>
                  <li>
                      <a href="<?php echo base_url()?>user/logout">
                          <i class="fa fa-sign-out"></i> Log out
                      </a>
                  </li>
              </ul>
          </nav>
        </div>
          <div class="row  border-bottom white-bg dashboard-header">
                <div class="col-sm-5">
                  <h2>Sincerity 360</h2>
                </div>
                <div class="col-sm-7">
                        
                </div>

          </div>
          <div class="row">

                <div class="footer">
                    <div>
                        <strong>Copyright</strong> &copy; 2017 Garuda Indonesia. All rights reserved.
                    </div>
                </div>
          </div>
        </div>

    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="<?php echo base_url();?>js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>js/inspinia.js"></script>
    <script src="<?php echo base_url();?>js/plugins/pace/pace.min.js"></script>


   
</body>
</html>
    