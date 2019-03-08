<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <title>Garuda Indonesia Group | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
            <h2>Simple Apps</h2>

            <p>Login for administrator.</p>
                <form class="m-t" role="form" action="<?php echo base_url()."admin_login/login/"?>" method="POST">
                        <div class="form-group">
                            <div class="hr-line-dashed" style="border-color: #b2b2b2"></div>
                            <input type="text" class="form-control" placeholder="Username" name="username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" required="">
                        </div>
                        <button type="submit" class="btn btn-info block full-width m-b">Login</button>

                        <p class="text-muted text-center">
                            <small>Masukkan username dan password untuk masuk ke halaman administrator.</small>
                        </p>
                </form>
            <div class="hr-line-dashed" style="border-color: #b2b2b2"></div>
            <strong>Copyright</strong> &copy; 2017 Garuda Indonesia. All rights reserved.
    </div>

</body>

</html>
