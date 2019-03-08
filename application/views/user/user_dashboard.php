
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

    <link href="<?php echo base_url()?>css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
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
                <li>
                    <a href="<?php echo base_url()?>user"><i class="fa fa-desktop"></i> <span class="nav-label">Survey</span></a>
                </li>
                <li class="active">
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
                    <h2>Dashboard</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>user">Home</a>
                        </li>
                        <li class="active">
                            <strong>Dashboard</strong>
                        </li>
                    </ol>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="container">
            <!-- <div class="row"> -->
                <!-- Reset Data-->
                            <!-- <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <div class="pull-right">
                                    <p >Reset Data <a type="button" href="<?php echo base_url()?>user/extract_akselerasi" class="btn btn-xs btn-danger">Reset</a> </p>
                                </div>
                            </div> -->
                <!-- End Of Reset Data-->
            <!-- </div> -->
            <div class="row">
                <!-- Data Organizational Culture -->
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h1 style="font-size: 30px;">Organizational Culture</h1>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>
                                        Data diperoleh berdasarkan hasil survey
                                    </p>
                                    <div class="flot-chart" style="max-height: 300px; height: 300px;">
                                        <div class="flot-chart-content" id="sincerity-flot-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Of Summary-->
                <!-- Data 360 -->
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                        <h1 style="font-size: 30px;">Score 360</h1>
                        <hr>
                            <div class="row">     
                                <div class="col-lg-12">
                                    <p>
                                        Nilai ketercapaian program 360
                                    </p>
                                    <div id="ketercapaian-360" style="
                                        max-width: 300px;
                                        height: 300px;
                                        padding: 0;
                                        margin: 0 auto 0 auto;">                                    
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Of 360 -->
        </div>
            <!-- Data Engagement -->
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <h1 style="font-size: 30px;">Data Engagement <small style="font-size: 15px;"> Data diperoleh dari survey engagement yang telah anda lakukan</small></h1>
                        <hr>
                        <div class="row">
                        <?php if ($engagement_score[0]->myscore == NULL){ ?>
                            <div class="text-center">
                                <h5>Tidak ada data yang tersedia</h5>
                                <h2>Silahkan isi survey terlebih dahulu</h2>
                            </div>
                        <?php } else {?>
                            <div class="col-lg-4">
                                <?php if ($engagement_score[0]->myscore >= 85){ ?>
                                    <div class="widget-head-color-box navy-bg p-lg text-center" style="padding-bottom: 10px;">
                                        <div class="m-b-md">
                                        <h2 class="font-bold no-margins">
                                            Corporate
                                        </h2>
                                            <small>Engagement Score</small>
                                            <h1 style="font-size: 100px; margin-top:5px; margin-bottom: 10px;  "><?php if ($engagement_score==0){ echo '0';} else echo $engagement_score[0]->myscore?></h1>
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
                                <?php } elseif ($engagement_score[0]->myscore >= 75 && $engagement_score[0]->myscore < 85){ ?>
                                    <div class="widget-head-color-box navy-bg p-lg text-center" style="padding-bottom: 10px;">
                                        <div class="m-b-md">
                                        <h2 class="font-bold no-margins">
                                            Corporate
                                        </h2>
                                            <small>Engagement Score</small>
                                            <h1 style="font-size: 100px; margin-top:5px; margin-bottom: 10px;  "><?php if ($engagement_score==0){ echo '0';} else echo $engagement_score[0]->myscore?></h1>
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
                                <?php } elseif ($engagement_score[0]->myscore >= 65 && $engagement_score[0]->myscore < 75){ ?>
                                    <div class="widget-head-color-box yellow-bg p-lg text-center" style="padding-bottom: 10px;">
                                        <div class="m-b-md">
                                        <h2 class="font-bold no-margins">
                                            Corporate
                                        </h2>
                                            <small>Engagement Score</small>
                                            <h1 style="font-size: 100px; margin-top:5px; margin-bottom: 10px;  "><?php if ($engagement_score==0){ echo '0';} else echo $engagement_score[0]->myscore?></h1>
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
                                <?php } elseif ($engagement_score[0]->myscore >= 55 && $engagement_score[0]->myscore < 65){ ?>
                                    <div class="widget-head-color-box yellow-bg p-lg text-center" style="padding-bottom: 10px;">
                                        <div class="m-b-md">
                                        <h2 class="font-bold no-margins">
                                            Corporate
                                        </h2>
                                            <small>Engagement Score</small>
                                            <h1 style="font-size: 100px; margin-top:5px; margin-bottom: 10px;  "><?php if ($engagement_score==0){ echo '0';} else echo $engagement_score[0]->myscore?></h1>
                                            <span>Score in percentage</span> 
                                        </div>                           
                                    </div>
                                    <div class="widget-text-box">
                                        <h4 class="media-heading">Category <span class="btn btn-xs btn-warning"></i> Disengaged</span></h4>
                                        <p style="font-size: 14px;">
                                            Karyawan memiliki komitmen dan ketertarikan <strong> yang rendah </strong> terhadap perusahaan.
                                        </p>
                                        <div class="hr-line-dashed"></div>
                                        <h5 style="color: #f7be3b;">Rekomendasi</h5>
                                        <p style="font-size: 14px;">
                                            <strong>Perlu Diwaspadai</strong>
                                        </p>
                                    </div>
                                <?php } elseif ($engagement_score[0]->myscore < 65){ ?>
                                    <div class="widget-head-color-box red-bg p-lg text-center" style="padding-bottom: 10px;">
                                        <div class="m-b-md">
                                        <h2 class="font-bold no-margins">
                                            Corporate
                                        </h2>
                                            <small>Engagement Score</small>
                                            <h1 style="font-size: 100px; margin-top:5px; margin-bottom: 10px;  "><?php if ($engagement_score==0){ echo '0';} else echo $engagement_score[0]->myscore?></h1>
                                            <span>Score in percentage</span> 
                                        </div>                           
                                    </div>
                                    <div class="widget-text-box">
                                        <h4 class="media-heading">Category <span class="btn btn-xs btn-danger"></i> Highly Disengaged</span></h4>
                                        <p style="font-size: 14px;">
                                            Karyawan memiliki komitmen dan ketertarikan <strong> sangat rendah </strong> terhadap perusahaan.
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
                                <div class="row text-center">
                                    <h2>Engagement Dimensions Score</h2>
                                    <h4 class="text-navy">For <?php echo $this->session->userdata('level'); ?> Level</h4>
                                </div>
                                <div class="row">
                                    <div id="nilai-engagement"></div>                             
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- End Of Engagement-->
            <!-- Akselerasi -->
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                    <div class="pull-right">
                        <a type="button" href="<?php echo base_url()?>user/extract_akselerasi" class="btn btn-xs btn-default" style="margin-top: 10px;">Download</a>
                        <button type="button" class="btn btn-xs btn-default table-hover" style="margin-top: 10px;" data-toggle="modal" data-target="#data-akselerasi">Upload New Data</button>
                    </div>
                            <!-- Modal -->
                            <div class="modal fade" id="data-akselerasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Upload Data Akselerasi <small class="text-navy"> Jika id akselerasi sama, maka KPI dengan id akselerasi yang sama akan digantikan.</small></h4>
                                  </div>
                                  <div class="modal-body">
                                        <!-- Isi Modal -->
                                        <?php echo form_open_multipart('user/upload_akselerasi')?>  
                                        <div class="form-group">                                     
                                          <input type="hidden" class="form-control" name="judul" autocomplete="off" value="a" placeholder="Judul">
                                        </div> 
                                        <div class="form-group">
                                            <label>File (Max 2MB dan XLS)</label>
                                            <p><i>Format kolom data akselerasi :</i></p>
                                            <p>ID Akselerasi | Pelaksana <i>(Sitacode Anda)</i> | Mission <i>(KPI Milik Anda)</i> | Progres</p>
                                            <input type="file" name="userfile" >
                                        </div>
                                    
                                                                                             
                                        <div class="hr-line-dashed"></div>
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>   Submit</button>
                                        <?php echo form_close()?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- End of Modal -->
                    <h1 style="font-size: 30px;">Akselerasi <small style="font-size: 15px;"> Upload data untuk memvisualisasi progres pencapaian KPI anda</small></h1>
                        <hr>
                        <div class="row">
                            <?php if ($data_akselerasi == NULL){ ?>
                                <div class="text-center">
                                    <h5>Tidak ada data yang tersedia</h5>
                                    <h2>Silahkan upload data excel dari KPI yang anda miliki</h2>
                                </div>
                            <?php } else {?>
                                <div class="col-lg-4">
                                    <h5> Prosentase Ketercapaian Seluruh KPI </h5>
                                    <div id="gauge" style="
                                        max-width: 660px;
                                        margin: auto;
                                        height: 400px;
                                        margin: 0 auto;">                                    
                                    </div>
                                </div>
                                <div class="col-lg-8">   
                                <h5> Progres Pencapaian Masing - Masing KPI </h5>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="stat-list">
                                                <?php $p=count($data_akselerasi); for ($i=0; $i <$p ; $i++) { ?>
                                                    <h3 class="no-margins "><?php echo $data_akselerasi[$i]->mission ?></h3>
                                                    <small>KPI Corporate</small>
                                                    <div class="stat-percent"><?php if ($data_akselerasi[$i]->progres == NULL) {echo 0;} else echo $data_akselerasi[$i]->progres?>%</div>
                                                    <div class="progress progress-mini">
                                                        <div style="width: <?php if ($data_akselerasi[$i]->progres == NULL) {echo 0;} else echo $data_akselerasi[$i]->progres?>%;" class="<?php if ($data_akselerasi[$i]->progres <= 50) {?>progress-bar progress-bar-danger<?php } elseif ($data_akselerasi[$i]->progres > 50 && $data_akselerasi[$i]->progres < 75) { ?>progress-bar progress-bar-warning <?php } else { ?>progress-bar progress-bar-primary<?php } ?>"></div>
                                                    </div>
                                                    <br>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                      </div>
                                                
                                </div>
                              </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- End Of Akselerasi -->
            </div>  
        </div>
        <div class="footer">
            <div>
                <strong>Copyright</strong> PT. Garuda Indonesia Tbk. &copy; 2017
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

    <!-- Morris -->
    <script src="<?php echo base_url()?>js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/morris/morris.js"></script>
    <script src="<?php echo base_url()?>js/muter.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>js/inspinia.js"></script>
    <script src="<?php echo base_url();?>js/plugins/pace/pace.min.js"></script>
    <!-- ChartJS-->
    <script src="<?php echo base_url();?>js/plugins/chartJs/Chart.min.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>vendors/nprogress/nprogress.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="<?php echo base_url();?>vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Echarts -->
    <script src="<?php echo base_url()?>js/echarts.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url()?>js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url()?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url()?>js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url()?>js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url()?>js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="<?php echo base_url()?>js/plugins/flot/jquery.flot.time.js"></script>

        <!-- Peity -->
    <script src="<?php echo base_url()?>js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url()?>js/demo/peity-demo.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url()?>js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="<?php echo base_url()?>js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="<?php echo base_url()?>js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo base_url()?>js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo base_url()?>js/demo/sparkline-demo.js"></script>

    <script type="text/javascript">
        //GAUGE CHART//
        var dom = document.getElementById("ketercapaian-360");
        var myChart = echarts.init(dom);
        var app = {};
        option = null;
        option = 
            {
                tooltip : 
                    {
                        formatter: "{a} <br/>{b} : {c}%"
                    },
                
                    series: [
                    {
                        name: '业务指标',
                        type: 'gauge',
                        detail: 
                        {formatter: '<?php echo number_format($ketercapaian_360,1,".",".")."%" ?>'},
                        data: <?php echo number_format($ketercapaian_360,1,".",".") ?>, 
                        name:'Prosentase Ide Kreatif',
                        axisLine:
                            {
                              show: true,
                              lineStyle:
                                {
                                  color: [[0.5, '#fc0000'], [0.8, '#eeff00'], [1, '#2cfc19']],
                                  width: 30
                                }
                            },
                    }
                        ] 
                
            };


            if (option && typeof option === "object") 
                {
                    myChart.setOption(option, true);
                }
    </script>
    <script type="text/javascript">
        //GAUGE CHART//
            var dom = document.getElementById("gauge");
            var myChart = echarts.init(dom);
            var app = {};
            option = null;
            option = 
                {
                    tooltip : 
                        {
                            formatter: "{a} <br/>{b} : {c}%"
                        },

                    series: [
                        {
                            name: '业务指标',
                            type: 'gauge',

                             detail: {formatter: '<?php echo number_format($gauge_akselerasi[0]->progres,1,".",".")."%";?>'},
                            data: <?php echo $gauge_akselerasi[0]->progres?>, 
                            name:'Prosentase Ide Kreatif',
                            axisLine:
                                {
                                  show: true,
                                  lineStyle:
                                    {
                                      color: [[0.5, '#fc0000'], [0.8, '#eeff00'], [1, '#2cfc19']],
                                      width: 30
                                    }
                                },
                        }
                            ]
                };


                if (option && typeof option === "object") 
                    {
                        myChart.setOption(option, true);
                    }
    </script>
    <script type="text/javascript">
        Morris.Bar({
        element: 'nilai-engagement',
        data: [
        {y: '<?php echo $engagement_dimensi[0]->nama_kategori;?>', a:<?php echo $engagement_dimensi[0]->score; ?>},
        {y: '<?php echo $engagement_dimensi[1]->nama_kategori;?>', a:<?php echo $engagement_dimensi[1]->score; ?>},
        {y: '<?php echo $engagement_dimensi[2]->nama_kategori;?>', a:<?php echo $engagement_dimensi[2]->score; ?>},
        {y: '<?php echo $engagement_dimensi[3]->nama_kategori;?>', a:<?php echo $engagement_dimensi[3]->score; ?>},
        {y: '<?php echo $engagement_dimensi[4]->nama_kategori;?>', a:<?php echo $engagement_dimensi[4]->score; ?>},
        {y: '<?php echo $engagement_dimensi[5]->nama_kategori;?>', a:<?php echo $engagement_dimensi[5]->score; ?>},
        {y: '<?php echo $engagement_dimensi[6]->nama_kategori;?>', a:<?php echo $engagement_dimensi[6]->score; ?>},
      ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Score',],
        hideHover: 'auto',
        ymax: 100,
        resize: true,
        gridTextSize:'10px',
        gridTextFamily:'open sans',
        xLabelAngle: 90,
        barColors: function (row, series, type) {
        console.log("--> "+row.label, series, type);
        if(row.label == "<?php echo $engagement_dimensi[0]->nama_kategori;?>") return "#65a56a";
        else if(row.label == "<?php echo $engagement_dimensi[1]->nama_kategori;?>") return "#95c48b";
        else if(row.label == "<?php echo $engagement_dimensi[2]->nama_kategori;?>") return "#bbe098";
        else if(row.label == "<?php echo $engagement_dimensi[3]->nama_kategori;?>") return "#fcd58d";
        else if(row.label == "<?php echo $engagement_dimensi[4]->nama_kategori;?>") return "#FF847C";
        else if(row.label == "<?php echo $engagement_dimensi[5]->nama_kategori;?>") return "#E84A5F";
        else if(row.label == "<?php echo $engagement_dimensi[6]->nama_kategori;?>") return "#d1273e";
        }

        });
    </script>
    
    <style type="text/css">
        .tickLabel { font-size: 85% }
    </style>
    <script>
        $(document).ready(function() {

            var data2 = [
                <?php if ($avg_adkar!=NULL){?>
                    [<?php echo 0?>, <?php echo $avg_adkar[0]->avg_score;?>],
                    [<?php echo 1?>, <?php echo $avg_adkar[0]->avg_score;?>],
                    [<?php echo 2?>, <?php echo $avg_adkar[0]->avg_score;?>],
                    [<?php echo 3?>, <?php echo $avg_adkar[0]->avg_score;?>],
                    [<?php echo 4?>, <?php echo $avg_adkar[0]->avg_score;?>]
                <?php } ?>
            ];

            var data3 = [
                <?php if ($plot_adkar!=NULL){?>
                    [<?php echo 0?>, <?php echo $plot_adkar[1]->score?>],
                    [<?php echo 1?>, <?php echo $plot_adkar[2]->score?>],
                    [<?php echo 2?>, <?php echo $plot_adkar[3]->score?>],
                    [<?php echo 3?>, <?php echo $plot_adkar[0]->score?>],
                    [<?php echo 4?>, <?php echo $plot_adkar[4]->score?>],
                <?php } ?>
            ];

            var ticks = [
                <?php if ($plot_adkar!=NULL){?>
                    [<?php echo 0?>, "<?php echo $plot_adkar[1]->nama_kategori?>"],
                    [<?php echo 1?>, "<?php echo $plot_adkar[2]->nama_kategori?>"],
                    [<?php echo 2?>, "<?php echo $plot_adkar[3]->nama_kategori?>"],
                    [<?php echo 3?>, "<?php echo $plot_adkar[0]->nama_kategori?>"],
                    [<?php echo 4?>, "<?php echo $plot_adkar[4]->nama_kategori?>"],
                <?php } ?>
            ];


            var dataset = [
                {
                    label: "Nilai Sincerity",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 0.5,
                        lineWidth:0
                    }

                }, {
                    label: "Rata - rata",
                    data: data2,
                    color: "#1C84C6",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.4
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    axisLabel: "Unit",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5",
                    labelAngle: 90,
                    ticks: ticks
                },
                yaxes: {
                    position: "left",
                    max: 100,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                },
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "sw"
                },
                grid: {
                    hoverable: true,
                    borderWidth: 0,
                    backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
                }
            };

            $.plot($("#sincerity-flot-chart"), dataset, options);
        });
    </script>
</body>
</html>
