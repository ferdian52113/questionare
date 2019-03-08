<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <title>Garuda Indonesia Group</title>

    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo base_url()?>css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url()?>js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/legend.css" rel="stylesheet">
</head>
<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="#" class="navbar-brand">Garuda Indonesia</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a aria-expanded="false" role="button" href="<?php echo base_url()?>admin"> Dashboard</a>
                    </li>
                    <li>
                        <a aria-expanded="false" role="button" href="<?php echo base_url()?>admin/data"> Data</a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                           <h4><i class="fa fa-map-marker"></i>  Welcome Admin </h4>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>admin/logout">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <?php if ($corporate[0]->rata_dir >= 85){ ?>
                            <div class="widget-head-color-box navy-bg p-lg text-center" style="padding-bottom: 10px;">
                                <div class="m-b-md">
                                <h2 class="font-bold no-margins">
                                    Corporate
                                </h2>
                                    <small>Engagement Score</small>
                                    <h1 style="font-size: 100px; margin-top:5px; margin-bottom: 10px;  "><?php if ($corporate==0){ echo '0';} else echo $corporate[0]->rata_dir?></h1>
                                    <span>Score in percentage</span> 
                                </div>                           
                            </div>
                            <div class="widget-text-box">
                                <h4 class="media-heading">Category <span class="btn btn-xs btn-primary"></i> Highly Engaged</span></h4>
                                <p style="font-size: 14px;">
                                    Karyawan memiliki komitmen dan ketertarikan <strong>sangat kuat</strong> terhadap perusahaan.
                                </p>
                                <div class="hr-line-dashed"></div>
                                <h5 class="text-navy">Rekomendasi</h5>
                                <p style="font-size: 14px;">
                                    <strong>Pertahankan</strong>
                                </p>
                            </div>
                        <?php } elseif ($corporate[0]->rata_dir >= 75 && $corporate[0]->rata_dir < 85){ ?>
                            <div class="widget-head-color-box navy-bg p-lg text-center" style="padding-bottom: 10px;">
                                <div class="m-b-md">
                                <h2 class="font-bold no-margins">
                                    Corporate
                                </h2>
                                    <small>Engagement Score</small>
                                    <h1 style="font-size: 100px; margin-top:5px; margin-bottom: 10px;  "><?php if ($corporate==0){ echo '0';} else echo $corporate[0]->rata_dir?></h1>
                                    <span>Score in percentage</span> 
                                </div>                           
                            </div>
                            <div class="widget-text-box">
                                <h4 class="media-heading">Category <span class="btn btn-xs btn-primary"></i> Engaged</span></h4>
                                <p style="font-size: 14px;">
                                    Karyawan memiliki komitmen dan ketertarikan <strong>sangat kuat</strong> terhadap perusahaan.
                                </p>
                                <div class="hr-line-dashed"></div>
                                <h5 class="text-navy">Rekomendasi</h5>
                                <p style="font-size: 14px;">
                                    <strong>Pelihara</strong>
                                </p>
                            </div>
                        <?php } elseif ($corporate[0]->rata_dir >= 65 && $corporate[0]->rata_dir < 75){ ?>
                            <div class="widget-head-color-box yellow-bg p-lg text-center" style="padding-bottom: 10px;">
                                <div class="m-b-md">
                                <h2 class="font-bold no-margins">
                                    Corporate
                                </h2>
                                    <small>Engagement Score</small>
                                    <h1 style="font-size: 100px; margin-top:5px; margin-bottom: 10px;  "><?php if ($corporate==0){ echo '0';} else echo $corporate[0]->rata_dir?></h1>
                                    <span>Score in percentage</span> 
                                </div>                           
                            </div>
                            <div class="widget-text-box">
                                <h4 class="media-heading">Category <span class="btn btn-xs btn-warning"></i> Disengaged</span></h4>
                                <p style="font-size: 14px;">
                                    Karyawan memiliki komitmen dan ketertarikan <strong>yang rendah</strong> terhadap perusahaan.
                                </p>
                                <div class="hr-line-dashed"></div>
                                <h5 style="color: #f7be3b;">Rekomendasi</h5>
                                <p style="font-size: 14px;">
                                    <strong>Tingkatkan</strong>
                                </p>
                            </div>
                        <?php } elseif ($corporate[0]->rata_dir >= 55 && $corporate[0]->rata_dir < 65){ ?>
                            <div class="widget-head-color-box yellow-bg p-lg text-center" style="padding-bottom: 10px;">
                                <div class="m-b-md">
                                <h2 class="font-bold no-margins">
                                    Corporate
                                </h2>
                                    <small>Engagement Score</small>
                                    <h1 style="font-size: 100px; margin-top:5px; margin-bottom: 10px;  "><?php if ($corporate==0){ echo '0';} else echo $corporate[0]->rata_dir?></h1>
                                    <span>Score in percentage</span> 
                                </div>                           
                            </div>
                            <div class="widget-text-box">
                                <h4 class="media-heading">Category <span class="btn btn-xs btn-warning"></i> Disengaged</span></h4>
                                <p style="font-size: 14px;">
                                    Karyawan memiliki komitmen dan ketertarikan <strong>yang rendah</strong> terhadap perusahaan.
                                </p>
                                <div class="hr-line-dashed"></div>
                                <h5 style="color: #f7be3b;">Rekomendasi</h5>
                                <p style="font-size: 14px;">
                                    <strong>Perlu Diwaspadai</strong>
                                </p>
                            </div>
                        <?php } elseif ($corporate[0]->rata_dir < 65){ ?>
                            <div class="widget-head-color-box red-bg p-lg text-center" style="padding-bottom: 10px;">
                                <div class="m-b-md">
                                <h2 class="font-bold no-margins">
                                    Corporate
                                </h2>
                                    <small>Engagement Score</small>
                                    <h1 style="font-size: 100px; margin-top:5px; margin-bottom: 10px;  "><?php if ($corporate==0){ echo '0';} else echo $corporate[0]->rata_dir?></h1>
                                    <span>Score in percentage</span> 
                                </div>                           
                            </div>
                            <div class="widget-text-box">
                                <h4 class="media-heading">Category <span class="btn btn-xs btn-danger"></i> Highly Disengaged</span></h4>
                                <p style="font-size: 14px;">
                                    Karyawan memiliki komitmen dan ketertarikan <strong>sangat rendah</strong> terhadap perusahaan.
                                </p>
                                <div class="hr-line-dashed"></div>
                                <h5 style="color: #E84A5F;">Rekomendasi</h5>
                                <p style="font-size: 14px;">
                                    <strong>Perlu Perbaikan</strong>
                                </p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-8" style="margin-top: 10px;">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="row text-center">
                                        <h2>Engagement Dimensions Score</h2>
                                        <h4 class="text-navy">For Corporate Level</h4>
                                    </div>
                                    <div class="row">
                                            <div id="score"></div>                             
                                    </div>
                                </div>

                            </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div id="direk"></div>
                                    </div> 
                                    <div class="col-lg-3">
                                    <h1 style="font-size: 40px;">Engagement</h1>
                                    <h1 style="font-size: 40px;">Score</h1>
                                    <h4 class="text-navy">Direktorat Comparison</h4>
                                    </div>
                                                                  
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Engagement Dimension Score</h5>
                            </div>
                            <div class="ibox-content">
                              <h2>TOP 3</h2>
                              <medium>Tiga dimensi dengan nilai tertinggi.</medium>
                              
                              <ul class="todo-list m-t">
                                  <?php $b=0; foreach($admin_top3 as $hasil) : $b++ ?>
                                  <li>
                                      <span style="color:#07926d"><?php echo $b?></span>
                                      <span class="m-l-xs"><?php echo $hasil->kriteria?></span>
                                      <small class="label label-primary" style="font-size: 12px;"></i> <?php echo $hasil->nilai?></small>
                                  </li>
                                  <?php endforeach; ?>                         
                              </ul>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Engagement Dimension Score</h5>
                            </div>
                            <div class="ibox-content">
                              <h2>Bottom 3</h2>
                              <medium>Tiga dimensi dengan nilai terendah.</medium>
                              
                              <ul class="todo-list m-t">
                                  <?php $b=0; foreach($admin_bottom3 as $hasil) : $b++ ?>
                                  <li>
                                      <span style="color:#e23650"><?php echo $b?></span>
                                      <span class="m-l-xs"><?php echo $hasil->kriteria?></span>
                                      <small class="label label-danger" style="font-size: 12px;"></i> <?php echo $hasil->nilai?></small>
                                  </li>
                                  <?php endforeach; ?>                         
                              </ul>
                          </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Gender </h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>                            
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content" style="position: relative">
                                <div id="gender"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Lokasi </h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div id="lokasi"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Usia </h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="stat-list">
                                            <li>
                                                <?php 
                                                if ($Husia[0]->Jumlah==0) {
                                                    $nilai1=0;
                                                    $nilai2=0;
                                                    $nilai3=0;
                                                    $nilai4=0;
                                                    $nilai5=0;
                                                } else {
                                                    $nilai1=$usia[0]->Jumlah/$Husia[0]->Jumlah;
                                                    $nilai2=$usia[1]->Jumlah/$Husia[0]->Jumlah;
                                                    $nilai3=$usia[2]->Jumlah/$Husia[0]->Jumlah;
                                                    $nilai4=$usia[3]->Jumlah/$Husia[0]->Jumlah;
                                                    $nilai5=$usia[4]->Jumlah/$Husia[0]->Jumlah;
                                                }                                            
                                                ?>
                                                <h3 class="no-margins">18-30 tahun</h3>
                                                <h4><?php echo $usia[0]->Jumlah;?></h4>
                                                <div class="stat-percent"><?php echo number_format($nilai1*100,0,".","."); ?>% <i class="fa fa-level-up text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($nilai1*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>                                        
                                            <li>
                                                <h3 class="no-margins ">31-40 tahun</h3>
                                                <h4><?php echo $usia[1]->Jumlah;?></h4>
                                                <div class="stat-percent"><?php echo number_format($nilai2*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($nilai2*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>                                            
                                                <h3 class="no-margins ">41-50 tahun</h3>
                                                <h4><?php echo $usia[2]->Jumlah;?></h4>
                                                <div class="stat-percent"><?php echo number_format($nilai3*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($nilai3*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h3 class="no-margins ">51-58 tahun</h3>
                                                <h4><?php echo $usia[3]->Jumlah;?></h4>
                                                <div class="stat-percent"><?php echo number_format($nilai4*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($nilai4*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h3 class="no-margins ">> 58 tahun</h3>
                                                <h4><?php echo $usia[4]->Jumlah;?></h4>
                                                <div class="stat-percent"><?php echo number_format($nilai5*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($nilai5*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            
                                            </ul>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Generasi </h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="stat-list">
                                            <li>
                                                <?php 
                                                if ($Hgenerasi[0]->Jumlah==0) {
                                                    $v1=0;
                                                    $v2=0;
                                                    $v3=0;
                                                    $v4=0;
                                                } else {
                                                    $v1=$generasi[0]->Jumlah/$Hgenerasi[0]->Jumlah;
                                                    $v2=$generasi[1]->Jumlah/$Hgenerasi[0]->Jumlah;
                                                    $v3=$generasi[2]->Jumlah/$Hgenerasi[0]->Jumlah;
                                                    $v4=$generasi[3]->Jumlah/$Hgenerasi[0]->Jumlah;
                                                }                                            
                                                ?>
                                                <h3 class="no-margins">Baby Boomers</h3>
                                                <small><?php echo $generasi[0]->Jumlah;?></small>
                                                <div class="stat-percent"><?php echo number_format($v1*100,0,".","."); ?>% <i class="fa fa-level-up text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($v1*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>                                        
                                            <li>
                                                <h3 class="no-margins ">Gen X</h3>
                                                <small><?php echo $generasi[0]->Jumlah;?></small>
                                                <div class="stat-percent"><?php echo number_format($v2*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($v2*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h3 class="no-margins ">Gen Y</h3>
                                                <small><?php echo $generasi[0]->Jumlah;?></small>
                                                <div class="stat-percent"><?php echo number_format($v3*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($v3*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h3 class="no-margins ">Gen Z</h3>
                                                <small><?php echo $generasi[0]->Jumlah;?></small>
                                                <div class="stat-percent"><?php echo number_format($v4*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($v4*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>                                        
                                            </ul>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>    
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Profesi </h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div id="profesi"></div>
                                <div id="lprofesi" class="donut-legend"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Posisi </h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div id="posisi"></div>
                                <div id="lposisi" class="donut-legend"></div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Pendidikan </h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div id="pendidikan"></div>
                                <div id="lpendidikan" class="donut-legend"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Status Pegawai </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="status"></div>
                            <div id="lstatus" class="donut-legend"></div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Latest Action Added <small> Lihat aksi lebih lengkap di menu Action Monitoring.</small></h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <div class="table-responsive">
                                            <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                                            <thead>
                                            <tr>
                                              <th style="width:20%" class="text-center">Unit</th>
                                              <th style="width:55%" class="text-center">Aksi</th>
                                              <th style="width:15%" class="text-center">Penanggung Jawab</th>
                                              <th style="width:10%" class="text-center">Batas Pelaksanaan</th>
                                              
                                            </tr>
                                            </thead>
                                            <tbody>
                                             <?php $b=0; foreach($latest_action as $hasil) : $b++ ?>
                                              <tr>
                                              <td style="width:20%"><?php echo $hasil->id_unit?></td>
                                              <td style="width:55%"><a class="table-hover" data-toggle="modal" data-target="#<?php echo $hasil->id_aksi ?>"><?php echo $hasil->aksi?></a></td>
                                              <td style="width:15%" class="text-center"><?php echo $hasil->penanggung_jawab?></td>
                                              <td style="width:10%" class="text-center"><?php echo $hasil->batas_pelaksanaan?></td>
                                            </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="<?php echo $hasil->id_aksi?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Action <small style="color: #f7be3b;"> Daftar aksi yang telah masuk.</small></h4>
                                          </div>
                                          <div class="modal-body">
                                                <!-- Isi Modal -->
                                                <div class="box-body">
                                                <?php echo form_open_multipart('user/action/')?>
                                                  <div class="row">
                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                        <label>Rekomendasi</label>
                                                        <textarea disabled="true" style="height: 100px;" type="text" class="form-control " required name="rekomendasi" placeholder="Rekomendasi" value="<?php echo $hasil->bottom;?>"><?php echo $hasil->bottom; ?></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                        <label>Aksi</label>
                                                        <textarea style="height: 100px;" type="text" class="form-control " disabled="true" required name="aksi" placeholder="Tuliskan aksi yang akan anda lakukan disini" value="<?php echo $hasil->aksi; ?>"><?php echo $hasil->aksi; ?></textarea>
                                                      </div>
                                                    </div>                   
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label>Kode Unit</label>
                                                        <input type="text" class="form-control " disabled="true" name="unit" placeholder="Unit" value="<?php echo $hasil->id_unit; ?>">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label>Penanggung Jawab</label>
                                                        <input type="text" class="form-control " name="penanggung_jawab" disabled="true" placeholder="Penanggung Jawab" value="<?php echo $hasil->penanggung_jawab; ?>">
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label>Frekuensi</label>
                                                        <input type="text" class="form-control" name="frekuensi" disabled="true" placeholder="Frekuensi Pelaksanaan" value="<?php echo $hasil->frekuensi; ?>">
                                                      </div>
                                                    </div>
                                                
                                                    <div class="col-md-6">
                                                        <div class="form-group" id="data_1">
                                                            <label>Waktu Pelaksanaan</label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="waktu_pelaksanaan" disabled="true" value="<?php echo $hasil->waktu_pelaksanaan; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" id="data_1">
                                                            <label>Batas Waktu Pelaksanaan</label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="batas_pelaksanaan" disabled="true" value="<?php echo $hasil->batas_pelaksanaan; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                                <?php echo form_close()?>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                  <label>*klik pada aksi untuk melihat detail</label>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
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

    <!-- Morris -->
    <script src="<?php echo base_url()?>js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/morris/morris.js"></script>
    <script src="<?php echo base_url()?>js/muter.js"></script>

    <!-- EayPIE -->
    <script src="<?php echo base_url();?>js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- svg Donut-->    
    <script src="<?php echo base_url()?>js/jquery.svgDoughnutChart.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo base_url();?>js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo base_url();?>js/demo/sparkline-demo.js"></script>

    <!-- Data picker -->
   <script src="<?php echo base_url();?>js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?php echo base_url();?>js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="<?php echo base_url();?>js/plugins/daterangepicker/daterangepicker.js"></script>

    <script type="text/javascript">
        Morris.Bar({
        element: 'score',
        data: [
        {y: '<?php echo $nilai_corporate[0]->kriteria;?>', a: <?php echo $nilai_corporate[0]->nilai; ?>},
        {y: '<?php echo $nilai_corporate[1]->kriteria;?>', a: <?php echo $nilai_corporate[1]->nilai; ?>},
        {y: '<?php echo $nilai_corporate[2]->kriteria;?>', a: <?php echo $nilai_corporate[2]->nilai; ?>},
        {y: '<?php echo $nilai_corporate[3]->kriteria;?>', a: <?php echo $nilai_corporate[3]->nilai; ?>},
        {y: '<?php echo $nilai_corporate[4]->kriteria;?>', a: <?php echo $nilai_corporate[4]->nilai; ?>},
        {y: '<?php echo $nilai_corporate[5]->kriteria;?>', a: <?php echo $nilai_corporate[5]->nilai; ?>},
        {y: '<?php echo $nilai_corporate[6]->kriteria;?>', a: <?php echo $nilai_corporate[6]->nilai; ?>},
       
      ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Score',],
        hideHover: 'auto',
        resize: true,
        gridTextSize:'10px',
        gridTextFamily:'open sans',
        xLabelAngle: 60,
        barColors: function (row, series, type) {
        console.log("--> "+row.label, series, type);
        if(row.label == "<?php echo $nilai_corporate[0]->kriteria;?>") return "#65a56a";
        else if(row.label == "<?php echo $nilai_corporate[1]->kriteria;?>") return "#95c48b";
        else if(row.label == "<?php echo $nilai_corporate[2]->kriteria;?>") return "#bbe098";
        else if(row.label == "<?php echo $nilai_corporate[3]->kriteria;?>") return "#fcd58d";
        else if(row.label == "<?php echo $nilai_corporate[4]->kriteria;?>") return "#FF847C";
        else if(row.label == "<?php echo $nilai_corporate[5]->kriteria;?>") return "#E84A5F";
        else if(row.label == "<?php echo $nilai_corporate[6]->kriteria;?>") return "#d1273e";
        }

        });
    </script>

    <script type="text/javascript">
        Morris.Bar({
        element: 'direk',
        data: [
        {y: '<?php echo $direktur[0]->kode_dir;?>', a: <?php if ($direktur[0]->rata_rata==0){echo 0;} else echo $direktur[0]->rata_rata;?>},
        {y: '<?php echo $direktur[1]->kode_dir;?>', a: <?php if ($direktur[1]->rata_rata==0){echo 0;} else echo $direktur[1]->rata_rata;?>},
        {y: '<?php echo $direktur[2]->kode_dir;?>', a: <?php if ($direktur[2]->rata_rata==0){echo 0;} else echo $direktur[2]->rata_rata;?>},
        {y: '<?php echo $direktur[3]->kode_dir;?>', a: <?php if ($direktur[3]->rata_rata==0){echo 0;} else echo $direktur[3]->rata_rata;?>},
        {y: '<?php echo $direktur[4]->kode_dir;?>', a: <?php if ($direktur[4]->rata_rata==0){echo 0;} else echo $direktur[4]->rata_rata;?>},
        {y: '<?php echo $direktur[5]->kode_dir;?>', a: <?php if ($direktur[5]->rata_rata==0){echo 0;} else echo $direktur[5]->rata_rata;?>},
        {y: '<?php echo $direktur[6]->kode_dir;?>', a: <?php if ($direktur[6]->rata_rata==0){echo 0;} else echo $direktur[6]->rata_rata;?>},
        {y: '<?php echo $direktur[6]->kode_dir;?>', a: <?php if ($direktur[7]->rata_rata==0){echo 0;} else echo $direktur[7]->rata_rata;?>},
       
      ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Nilai',],
        hideHover: 'auto',
        resize: true,
        gridTextSize:'10px',
        gridTextFamily:'open sans',
        barColors: function (row, series, type) {
        console.log("--> "+row.label, series, type);
        if(row.label == "<?php echo $direktur[0]->kode_dir;?>") return "#65a56a";
        else if(row.label == "<?php echo $direktur[1]->kode_dir;?>") return "#95c48b";
        else if(row.label == "<?php echo $direktur[2]->kode_dir;?>") return "#bbe098";
        else if(row.label == "<?php echo $direktur[3]->kode_dir;?>") return "#fcd58d";
        else if(row.label == "<?php echo $direktur[4]->kode_dir;?>") return "#FF847C";
        else if(row.label == "<?php echo $direktur[5]->kode_dir;?>") return "#E84A5F";
        else if(row.label == "<?php echo $direktur[6]->kode_dir;?>") return "#d1273e";
        else if(row.label == "<?php echo $direktur[7]->kode_dir;?>") return "#d1273e";
        }

        });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
       $('input[type="radio"]').click(function() {
           if($(this).attr('id') == 'option1') {
                $('#tampil_option1').show();
                $('#tampil_option2').hide();
                $('#tampil_option3').hide();            
           }
           else if($(this).attr('id') == 'option2') {
                $('#tampil_option2').show();
                $('#tampil_option1').hide();
                $('#tampil_option3').hide();            
           }
           else if($(this).attr('id') == 'option3') {
                $('#tampil_option3').show();
                $('#tampil_option2').hide();
                $('#tampil_option1').hide();            
           }
           else {
                $('#tampil_option1').hide();
                $('#tampil_option2').hide();
                $('#tampil_option3').hide();   
           }
       });
    });
    </script>

    <script type="text/javascript">
        Morris.Donut({
          element: 'posisi',
          resize: true, 
          colors: ['#87d6c6', '#54cdb4','#1ab394'],
          data: [
            {label: "Non Struktural", value: <?php echo $posisi[0]->Jumlah; ?>},
            {label: "Pimpinan Unit Kerja", value: <?php echo $posisi[1]->Jumlah; ?>},
            {label: "Struktural", value: <?php echo $posisi[2]->Jumlah; ?>}
          ],
          hideHover: 'auto'
        });
    </script>
    <script type="text/javascript">
        Morris.Bar({
        element: 'usia',
        horizontal: true,
        data: [{ y: '18-30', a: <?php echo $usia[0]->Jumlah; ?>},
            { y: '31-40', a: <?php echo $usia[1]->Jumlah; ?>},
            { y: '41-50', a: <?php echo $usia[2]->Jumlah; ?>},
            { y: '51-58', a: <?php echo $usia[3]->Jumlah; ?>},          
            { y: '>58', a: <?php echo $usia[4]->Jumlah; ?>} ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Series A',],
        hideHover: 'auto',
        resize: true,
        barColors: ['#1ab394'],

        });
    </script>
    <script type="text/javascript">
        Morris.Bar({
        element: 'generasi',
        data: [
        {y: 'Baby Boomers', a: <?php echo $generasi[0]->Jumlah; ?>},
        {y: 'X', a: <?php echo $generasi[1]->Jumlah; ?>},
        {y: 'Y', a: <?php echo $generasi[2]->Jumlah; ?>},
        {y: 'Z', a: <?php echo $generasi[3]->Jumlah; ?>}
       
      ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Series A',],
        hideHover: 'auto',
        resize: true,
        barColors: ['#5adee2'],

        });
    </script>
    <script>
        <?php 
        if (count($lokasi)==1){
            $prosen = 100;
            if ($lokasi[0]->lokasi=="Back Office") {
                $pt= $lokasi[0]->Jumlah." Orang Back Office";
                $nt= "Null";
            }
            else 
                $pt= $lokasi[0]->Jumlah." Orang Head Office";
                $nt= "Null";
        }
        else {
            $prosenB = $lokasi[0]->Jumlah/($lokasi[0]->Jumlah+$lokasi[1]->Jumlah)*100; 
            $prosenH = $lokasi[1]->Jumlah/($lokasi[0]->Jumlah+$lokasi[1]->Jumlah)*100; 
            if ($prosenB>$prosenH)
            {
                $prosen = $prosenB;
                $pt = $lokasi[0]->Jumlah." Orang Head Office";
                $nt = $lokasi[1]->Jumlah." Orang Back Office";
            } 
            else 
            { 
                $prosen = $prosenH;
                $pt = $lokasi[0]->Jumlah." Orang Head Office";
                $nt = $lokasi[1]->Jumlah." Orang Back Office";
            }
        }
        ?>
        $('#lokasi').doughnutChart({
        positiveColor: "#3BB0D6",
        negativeColor: "#ff3838",
        backgroundColor: "white",
        percentage: <?php echo $prosen?>,
        size: 250,
        doughnutSize: 0.35,
        innerText: '<?php echo number_format($prosen,0,".",".")."%";?>',
        innerTextOffset: 12,
        Title: "Responden by Lokasi",
        positiveText: "<?php echo $pt?>",
        negativeText: "<?php echo $nt?>"
    });
    </script>
    <script>
        <?php 
        if (count($gender)==1){
            $prosen = 100;
            if ($gender[0]->gender=="LAKI-LAKI") {
                $pt= $gender[0]->Jumlah." Orang Laki-laki";
                $nt= "Null";
            }
            else 
                $pt= $gender[0]->Jumlah." Orang Perempuan";
                $nt= "Null";
        }
        else {
            $prosenL = $gender[0]->Jumlah/($gender[0]->Jumlah+$gender[1]->Jumlah)*100; 
            $prosenP = $gender[1]->Jumlah/($gender[0]->Jumlah+$gender[1]->Jumlah)*100; 
            if ($prosenL>$prosenP)
            {
                $prosen = $prosenL;
                $pt = $gender[0]->Jumlah." Orang Laki-laki";
                $nt = $gender[1]->Jumlah." Orang Perempuan";
            } 
            else 
            { 
                $prosen = $prosenP;
                $pt = $gender[0]->Jumlah." Orang Laki-laki";
                $nt = $gender[1]->Jumlah." Orang Perempuan";
            }
        }
        ?>
        $('#gender').doughnutChart({
        positiveColor: "#3BB0D6",
        negativeColor: "#ff3838",
        backgroundColor: "white",
        percentage: <?php echo $prosen?>,
        size: 250,
        doughnutSize: 0.35,
        innerText: '<?php echo number_format($prosen,0,".",".")."%";?>',
        innerTextOffset: 12,
        Title: "Responden by Gender",
        positiveText: "<?php echo $pt?>",
        negativeText: "<?php echo $nt?>"
    });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
          var color_array = ['#00b6ff','#1af22c', '#ff3838', '#F28C4B', '#7E6F6A', '#36AFB2', '#9c6db2', '#d24a67', '#89a958', '#00739a', '#BDBDBD'];
          var browsersChart = Morris.Donut({
            element: 'status',

          <?php $pembagi=$Hstatus[0]->Hasil;?>
          formatter: function (value, data) { return (Math.round((value/<?php echo $pembagi;?> *100)*10)/10) + '%'; },
            data   : [<?php
                    foreach ($status as $key => $value) {
                    ?>
                      {value: <?php echo $value->Jumlah; ?>, label: '<?php echo $value->status_pegawai; ?>', formatted: '<?php echo $value->Jumlah; ?>' },
                   <?php 
                    }
                   ?>],
            colors: color_array
          });
          browsersChart.options.data.forEach(function(label, i){            
            var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " )" ).prepend('<i>&nbsp;</i>');
            legendItem.find('i').css('backgroundColor', browsersChart.options.colors[i]);
            $('#lstatus').append(legendItem)
          })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
          var color_array = ['#00b6ff','#1af22c', '#ff3838', '#F28C4B', '#7E6F6A', '#36AFB2', '#9c6db2', '#d24a67', '#89a958', '#00739a', '#BDBDBD'];
          var browsersChart = Morris.Donut({
            element: 'profesi',
          <?php $pembagi=$Hprofesi[0]->Hasil;?>
          formatter: function (value, data) { return (Math.round((value/<?php echo $pembagi;?> *100)*10)/10) + '%'; },
            data   : [<?php
                    $pembagi=$Hprofesi[0]->Hasil; 
                    foreach ($profesi as $key => $value) {
                    ?>
                      {value: <?php echo $value->Jumlah; ?>, label: '<?php echo $value->profesi; ?>', formatted: '<?php echo $value->Jumlah; ?>' },
                   <?php 
                    }
                   ?>],
            colors: color_array
          });
          browsersChart.options.data.forEach(function(label, i){            
            var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " )" ).prepend('<i>&nbsp;</i>');
            legendItem.find('i').css('backgroundColor', browsersChart.options.colors[i]);
            $('#lprofesi').append(legendItem)
          })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
          var color_array = ['#00b6ff','#1af22c', '#ff3838', '#F28C4B', '#7E6F6A', '#36AFB2', '#9c6db2', '#d24a67', '#89a958', '#00739a', '#BDBDBD'];
          var browsersChart = Morris.Donut({
            element: 'posisi',

          <?php $pembagi=$Hposisi[0]->Hasil;?>
          formatter: function (value, data) { return (Math.round((value/<?php echo $pembagi;?> *100)*10)/10) + '%'; },
            data   : [<?php
                    $pembagi=$Hposisi[0]->Hasil; 
                    foreach ($posisi as $key => $value) {
                    ?>
                      {value: <?php echo $value->Jumlah; ?>, label: '<?php echo $value->posisi; ?>', formatted: '<?php echo $value->Jumlah; ?>' },
                   <?php 
                    }
                   ?>],
            colors: color_array
          });
          browsersChart.options.data.forEach(function(label, i){            
            var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " )" ).prepend('<i>&nbsp;</i>');
            legendItem.find('i').css('backgroundColor', browsersChart.options.colors[i]);
            $('#lposisi').append(legendItem)
          })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
          var color_array = ['#00b6ff','#1af22c', '#ff3838', '#F28C4B', '#7E6F6A', '#36AFB2', '#9c6db2', '#d24a67', '#89a958', '#00739a', '#BDBDBD'];
          var browsersChart = Morris.Donut({
            element: 'pendidikan',

          <?php $pembagi=$Hpendidikan[0]->Hasil;?>
          formatter: function (value, data) { return (Math.round((value/<?php echo $pembagi;?> *100)*10)/10) + '%'; },
            data   : [<?php
                    
                    foreach ($pendidikan as $key => $value) {
                    ?>
                      {value: <?php echo $value->Jumlah; ?>, label: '<?php echo $value->pendidikan; ?>', formatted: '<?php echo $value->Jumlah; ?>' },
                   <?php 
                    }
                   ?>],
            colors: color_array
          });
          browsersChart.options.data.forEach(function(label, i){            
            var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " )" ).prepend('<i>&nbsp;</i>');
            legendItem.find('i').css('backgroundColor', browsersChart.options.colors[i]);
            $('#lpendidikan').append(legendItem)
          })
        });
    </script>  
        <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });
    </script>
    
</body>
</html>
    