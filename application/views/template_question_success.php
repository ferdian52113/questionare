<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DMI</title>

    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/iCheck/custom.css" rel="stylesheet">

</head>

<body class="gray-bg top-navigation">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="wrapper wrapper-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="ibox float-e-margins">
                            <div id="formContainer">
                             <div class="ibox-title" id="formTitle" >
                                <h1 class="text-center"><?php echo $form[0]->title?></h1>
                            </div>
                            <div class="ibox-content" id="formDescription" style="text-align: center;">
                                <h4>Persepsi Anda telah kami catat. Terimakasih :)</h4>
                                <h5>Kirim persepsi lagi <a href="<?php echo base_url("open/questioner/".rawurlencode($form[0]->link))?>">disini</h5>
                            </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <?php include('admin/admin_footer.php') ?>
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

    <!-- ChartJS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>

    <!-- Morris -->
    <script src="<?php echo base_url()?>js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/morris/morris.js"></script>

    <script src="<?php echo base_url()?>js/plugins/dataTables/datatables.min.js"></script>

    <!-- iCheck -->
    <script src="<?php echo base_url()?>js/plugins/iCheck/icheck.min.js"></script>
    <script src="<?php echo base_url()?>js/jquery.validate.js"></script>

    </body>
    </html>