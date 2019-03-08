<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <title>Garuda Indonesia Group</title>

    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="<?php echo base_url();?>vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="<?php echo base_url();?>vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url();?>vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">  

</head>


<body class="canvas-menu">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">

        <div class="sidebar-collapse">
            <a class="close-canvas-menu"><i class="fa fa-times"></i></a>
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url();?>img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('nama') ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $this->session->userdata('email') ?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        GI
                    </div>
                </li>
                <li class="active">
                    <a href="<?php echo base_url()?>user"><i class="fa fa-desktop"></i> <span class="nav-label">Survey</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>user/user_dashboard"><i class="fa fa-desktop"></i> <span class="nav-label">Dashboard</span></a>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Simple Apps.</span>
                </li>
                <li>
                    <a href="<?php echo base_url()?>user/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Home</h2>
                    <ol class="breadcrumb">
                        <li class="active">
                            <a href="<?php echo base_url()?>admin">Input Page</a>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Assessment Survey</h5>
                            </div>
                        </div>
                            <div class="ibox float-e-margins">
                                <div class="ibox-content" style="padding: 30px;">
                                    <div class="row">
                                        <h6>ID Form 3</h6>
                                        <h3>360 Survey</h3>
                                        <h5 style="font-weight: normal;">Simulasi penilaian kinerja terhadap diri anda untuk menggambarkan bagaimana program Sincerity 360 bekerja</h5>
                                        <h4 class="label label-info">3</h4>
                                        <div class="hr-line-dashed"></div>
                                        <?=anchor( 'user/self_assessment/',
                                            'Attempt Now',
                                            ['class'=>'btn btn-primary btn-xs table-hover pull-right'
                                            ])?> 
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Culture Survey</h5>
                            </div>
                        </div>
                        
                            <?php if ($data_form == 0){ ?>                       
                                <div class="ibox-content">
                                    <h4 class="text-navy">Tidak ada survey yang tersedia.</h4>
                                </div>                   
                            <?php } else { ?>  
                                <?php $c=count($data_form); for ($i=0; $i < $c; $i++) { ?>
                                    <?php if($data_form[$i]->form_type != 3) { ?>
                                        <div class="ibox float-e-margins">
                                        <div class="ibox-content" style="padding: 30px;">
                                            <div class="row">
                                                <h6>ID Form <?php echo $data_form[$i]->id_form ?></h6>
                                                <h3><?php echo $data_form[$i]->judul ?></h3>
                                                <h5 style="font-weight: normal;"><?php echo $data_form[$i]->deskripsi ?></h5>
                                                <h4 class="label label-info"><?php echo $data_form[$i]->form_type ?></h4>
                                                <div class="hr-line-dashed"></div>
                                                <?=anchor( 'user/survey/' . $data_form[$i]->id_form,
                                                    'Attempt Now',
                                                    ['class'=>'btn btn-primary btn-xs table-hover pull-right'
                                                    ])?> 
                                            </div>
                                        </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                    </div>
                    <div class="col-md-2"></div>

            </div>
            </div>
            
            <div class="footer">
                    <strong>Copyright</strong> Garuda Indonesia &copy; 2017
            </div>

        </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url()?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url()?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url()?>js/inspinia.js"></script>
    <script src="<?php echo base_url()?>js/plugins/pace/pace.min.js"></script>

    <script>
        $('body.canvas-menu .sidebar-collapse').slimScroll({
                        height: '100%',
                        railOpacity: 0.9
                    });
    </script>
    <script src="<?php echo base_url();?>js/plugins/dataTables/datatables.min.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>vendors/nprogress/nprogress.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="<?php echo base_url();?>vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
    $(document).ready(function() {
      <?php $b=count($list_pertanyaan); for ($j=0; $j < $b; $j++) {  ?>  
          $("#<?php echo $list_pertanyaan[$j]->id_child?>").ionRangeSlider({
              type: "single",
              min: 1,
              max: <?php echo $list_pertanyaan[$j]->jumlah?>,
              from: 1,
              to: 10,
          });
      <?php } ?>

      });
    </script>


</body>

</html>
