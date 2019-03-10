<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Creator</title>

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
                                <h5>Kirim persepsi lagi <a href="<?php echo base_url("open?formCode=".$form[0]->formCode)?>">disini</h5>
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
    <script>
        $(document).ready(function () {
            var count = <?php echo count($section)?>;

            init();

            for (var i = 1; i <= count; i++) {
                $('#formSection-'+i).submit(function(e) {
                e.preventDefault();

                var me = $(this);

                // perform ajax
                $.ajax({
                    url: me.attr('action'),
                    type: 'post',
                    data: me.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            // if success we would show message
                            // and also remove the error class
                            if(i==count){
                                window.location = "<?php echo base_url() . "open/done" ?>";
                            } else {
                                showhide(me.attr('data-sectionID'));
                            }
                            
                        }
                        else {
                            alert("Please refresh page");
                        }
                    },
                    error: function(){
                        alert("Please refresh page");
                    },
                });
            });
            }

            function init(){
                var responseID = generateResponseID();
                $('.responseID').val(responseID);

                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
                $('.i-checks').show();
            }

            function generateResponseID(){
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for (var i = 0; i < 5; i++)
                    text += possible.charAt(Math.floor(Math.random() * possible.length));

                return text;
            }
            function showhide(id){
                var show = $('#next-'+id).attr("data-show");
                var hide = $('#next-'+id).attr('data-section');

                $('#'+show).show();
                $('#'+hide).hide();

                $('html, body').animate({scrollTop: $("#" + show).offset().top}, 200);
            }

            $(".prev-button").on('click', function (e) {
                var show = $(this).attr("data-show");
                var hide = $(this).attr('data-section');

                $('#'+show).show();
                $('#'+hide).hide();

                $('html, body').animate({scrollTop: $("#" + show).offset().top}, 200);
            });


            });
        </script>

    </body>
    </html>