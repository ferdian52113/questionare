<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <title>Garuda Indonesia Group | Login</title>

    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">

</head>
<body class="gray-bg" style="display: table;
    position: relative;
    width: 100%;
    height: 100%;
    background: url(assets/home-bg.jpg) no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;">

    <div class="middle-box text-center loginscreen animated fadeInDown">
            <div class="pembuka">
                <!--<h1 class="logo-name pull-left" style="padding-left: 30px;">GA</h1>-->
                <img src="assets/logo.png" class="img-responsive">
            </div>
            <h2 style="font-size: 35px;">Simple Apps</h2>

            <p>Login in o see how your score made.</p>
            <form class="m-t" role="form" action="<?php echo base_url()."login/pegawai"?>" method="POST">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="form-group row">
                        <div class="col-md-2"><label>Email</label></div>
                        <div class="col-md-10"><input type="text" class="form-control" placeholder="ex: hendra@gmail.com" name="email" required=""></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"><label>Nama</label></div>
                        <div class="col-md-10"><input type="text" class="form-control" placeholder="ex: hendra" name="nama" required=""></div>
                    </div>
                    <button type="submit" class="btn btn-info block full-width m-b">Login</button>
                <div class="hr-line-dashed" style="border-color: #b2b2b2"></div>
                <strong>Copyright</strong> &copy; 2017 Garuda Indonesia. All rights reserved.
                </form>
            </div>
            <div class="col-md-2"></div>
    </div>
    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>js/inspinia.js"></script>
    <script src="<?php echo base_url();?>js/plugins/pace/pace.min.js"></script>
</body>

</html>
