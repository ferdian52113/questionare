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
                    <span class="m-r-sm text-muted welcome-message">Welcome to Aimple Apps.</span>
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
                    <h2>Survey 360</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>user">Home</a>
                        </li>
                        <li class="active">
                            <strong>Survey</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content  animated fadeInRight article">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h1 style="font-size: 30px;"><?php echo $judul[0]->judul; ?></h1>
                                <h4><?php echo $judul[0]->deskripsi; ?></h4>
                            </div>
                            <div class="ibox-content">
                                <?php if ($list_question == NULL){ ?>
                                    <h5 class="text-navy">Tidak ada pertanyaan yang perlu dijawab</h5>
                                <?php } else { ?>
                                <?php echo form_open_multipart('user/isi_survey360')?>
                                    <input type="hidden" value="<?php echo $role; ?>" name="role" />
                                    <input type="hidden" value="<?php echo $judul[0]->form_type?>" name="form_type" />
                                    <?php $a=count($list_parent); for ($i=0; $i < $a; $i++) { ?>
                                        <div class="row">
                                            <h2><?php echo $list_parent[$i]->parent_name?></h2>
                                            <hr>
                                        </div>
                                        <?php $b=count($list_question); $p=0; $c=0; for ($j=0; $j < $b; $j++) {  ?>
                                            <?php if ($list_question[$j]->parent_name == $list_parent[$i]->parent_name){ ?>
                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="form-group">
                                                        <div class="col-lg-12">
                                                            <label><?php $c++; echo $c; ?>. &nbsp <?php echo $list_question[$j]->question; ?></label>
                                                            <br>
                                                            <input type="hidden" value="<?php echo $this->session->userdata('nopeg')?>" name="responden" />
                                                            <input type="hidden" value="<?php echo $list_question[$j]->id_child?>" name="id_question<?php echo $j;?>" />
                                                            <input type="hidden" value="<?php echo $list_question[$j]->type?>" name="type<?php echo $j;?>" />
                                                        </div>
                                                    </div>
                                                    <?php if ($list_question[$j]->userfile!= NULL){?>
                                                        <div class="text-center" style="margin-bottom: 20px;">
                                                            <img src="<?php echo base_url()?>uploads/<?php echo $list_question[$j]->userfile?>" style="max-height: 250px;">
                                                        </div>
                                                    <?php } else {}?>
                                                    <?php if ($list_question[$j]->type=='skala'){?>
                                                    <div class="form-group">
                                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                                            <h5 style="text-align:center; vertical-align:middle" class="label label-danger pull-right">Tidak Setuju</h5>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                                            <input type="text" id="<?php echo $list_question[$j]->id_child?>" value="1" name="nilai<?php echo $j;?>" />
                                                            <br>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                                            <h5 style="text-align:center; vertical-align:middle" class="label label-primary pull-left">Setuju</h5>
                                                        </div>                                                        
                                                    </div>
                                                    <?php } elseif ($list_question[$j]->type=='input'){ ?>
                                                    <div class="form-group">
                                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                                            
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                                            <input type="text" required class="form-control" name="nilai<?php echo $j;?>" />
                                                            <br>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                                            
                                                        </div>                                                        
                                                    </div>
                                                    <?php } elseif ($list_question[$j]->type=='textarea'){ ?>
                                                    <div class="form-group">
                                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                                            
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                                            <textarea style="height: 100px;" type="text" class="form-control " required name="nilai<?php echo $j;?>"></textarea>
                                                            <br>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                                            
                                                        </div>                                                        
                                                    </div>
                                                    <?php } elseif ($list_question[$j]->type=='multiple choice'){ ?>
                                                    <div class="form-group">
                                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                                            
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                                        <?php $d=count($list_multiple_choice); for($n=0; $n<$d; $n++) { ?>
                                                            <?php if($list_multiple_choice[$n]->id_question == $list_question[$j]->id_child) {?>
                                                                <div class="col-xs-6">
                                                                    <h5 style="font-size: 13.5px"><input type="radio" value="1" name="input_radio<?php echo $j ?>" style="margin-right: 10px;"> A. <?php echo $list_multiple_choice[$n]->choice1 ?></h5>
                                                                    <h5 style="font-size: 13.5px"><input type="radio" value="2" name="input_radio<?php echo $j ?>" style="margin-right: 10px;"> B. <?php echo $list_multiple_choice[$n]->choice2 ?></h5>
                                                                </div>
                                                                <div class="col-xs-6">
                                                                    <h5 style="font-size: 13.5px"><input type="radio" value="3" name="input_radio<?php echo $j ?>" style="margin-right: 10px;"> C. <?php echo $list_multiple_choice[$n]->choice3 ?></h5>
                                                                    <h5 style="font-size: 13.5px"><input type="radio" value="4" name="input_radio<?php echo $j ?>" style="margin-right: 10px;"> D. <?php echo $list_multiple_choice[$n]->choice4 ?></h5>
                                                                </div>
                                                            <?php } ?>
                                                        <?php } ?>
                                                            <br>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-md-1 col-sm-1 col-xs-1">                                                            
                                                        </div>                                                        
                                                    </div>
                                                    <?php } elseif ($list_question[$j]->type=='forced choice'){ ?>
                                                    <div class="form-group">                                                        
                                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                                            
                                                        </div>
                                                        <div class="col-md-10 col-sm-10 col-xs-10">
                                                        <?php $f=count($list_forced_choice); for($g=0; $g<$f; $g++) { ?>
                                                            <?php if($list_forced_choice[$g]->id_child == $list_question[$j]->id_child) {?>
                                                                <input type="hidden" value="<?php echo $list_forced_choice[$g]->id_forced?>" name="id_forced<?php echo $j;?>" />
                                                                <div class="col-md-5">
                                                                    <div class="row">
                                                                        <h5 style="font-size: 13px">[A]</h5>
                                                                        <h5 style="font-size: 13px"><?php echo $list_forced_choice[$g]->pertanyaan1?></h5>
                                                                    </div>
                                                                    <div class="row">
                                                                        <h5 style="font-size: 13px">[B]</h5>
                                                                        <h5 style="font-size: 13px"><?php echo $list_forced_choice[$g]->pertanyaan2?></h5>
                                                                    </div>                                                           
                                                                </div>
                                                                <div class="col-md-7" style="line-height: 45px;">
                                                                    <div class="row text-center">
                                                                        <div class="col-md-6 text-center">
                                                                            <h4>Saat Ini</h4>
                                                                        </div>
                                                                         <div class="col-md-6 text-center">
                                                                            <h4>Harapan</h4>
                                                                         </div>
                                                                    </div>
                                                                    <div class="row text-center">
                                                                        <div class="col-md-6 text-center">
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>0</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>1</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>2</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>3</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>4</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>5</h5>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 text-center">
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>0</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>1</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>2</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>3</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>4</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>5</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row text-center">
                                                                        <div class="col-md-6 text-center">
                                                                            <div class="col-md-2 text-center">
                                                                                <input type="radio" value="0" name="pil<?php echo $list_forced_choice[$g]->id_child?>">
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <input type="radio" value="1" name="pil<?php echo $list_forced_choice[$g]->id_child?>">
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <input type="radio" value="2" name="pil<?php echo $list_forced_choice[$g]->id_child?>">
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <input type="radio" value="3" name="pil<?php echo $list_forced_choice[$g]->id_child?>">
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <input type="radio" value="4" name="pil<?php echo $list_forced_choice[$g]->id_child?>">
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <input type="radio" value="5" name="pil<?php echo $list_forced_choice[$g]->id_child?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 text-center">
                                                                            <div class="col-md-2 text-center">
                                                                                <input type="radio" value="0" name="pila<?php echo $list_forced_choice[$g]->id_child?>">
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <input type="radio" value="1" name="pila<?php echo $list_forced_choice[$g]->id_child?>">
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <input type="radio" value="2" name="pila<?php echo $list_forced_choice[$g]->id_child?>">
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <input type="radio" value="3" name="pila<?php echo $list_forced_choice[$g]->id_child?>">
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <input type="radio" value="4" name="pila<?php echo $list_forced_choice[$g]->id_child?>">
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <input type="radio" value="5" name="pila<?php echo $list_forced_choice[$g]->id_child?>">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="row" text-center>
                                                                        <div class="col-md-6 text-center">
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>5</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>4</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>3</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>2</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>1</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>0</h5>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 text-center">
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>5</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>4</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>3</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>2</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>1</h5>
                                                                            </div>
                                                                            <div class="col-md-2 text-center">
                                                                                <h5>0</h5>
                                                                            </div>
                                                                        </div>                 
                                                                    </div>
                                                                </div>
                                                                
                                                            <?php } ?>
                                                        <?php } ?>
                                                            <br>

                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                                            
                                                        </div>                                                        
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                    <hr>
                                    <div class="text-center">
                                        <div><span>Pastikan anda mengisi data dengan benar.</span></div><br>
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                    </div>
                                <?php echo form_close()?>                                
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer">
                    <strong>Copyright</strong> Garuda Indonesia &copy; 2017
            </div>

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
      <?php $b=count($list_question); for ($j=0; $j < $b; $j++) {  ?>  
          $("#<?php echo $list_question[$j]->id_child?>").ionRangeSlider({
              type: "single",
              min: 1,
              max: <?php echo $list_question[$j]->jumlah?>,
              from: 1,
              to: 10,
          });
      <?php } ?>

      });
    </script>


</body>

</html>
