<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DMI | ADMIN</title>

    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/iCheck/custom.css" rel="stylesheet">

    <!-- c3 Charts -->
    <link href="<?php echo base_url()?>css/plugins/c3/c3.min.css" rel="stylesheet">

</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        
            <?php include('admin_header.php') ?>

            <div class="wrapper wrapper-content">

                <div class="container">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="row">
                        <!-- Dashboard -->
                        <?php for ($i=0; $i < $question ; $i++) { 
                        ?>

                                        <h5><?php echo $i.' '.$question[$i]->question ?>  </h5>

                        <?php } ?>
                        <!-- END -->
                    </div>
                    
                </div>

            </div>
            <?php include('admin_footer.php') ?>
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

<!-- d3 and c3 charts -->
<script src="<?php echo base_url()?>js/plugins/d3/d3.min.js"></script>
<script src="<?php echo base_url()?>js/plugins/c3/c3.min.js"></script>

<!-- iCheck -->
<script src="<?php echo base_url()?>js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
    <script>

        $(document).ready(function () {

            c3.generate({
                bindto: '#gauge',
                data:{
                    columns: [
                        ['data', 91.4]
                    ],

                    type: 'gauge'
                },
                color:{
                    pattern: ['#1ab394', '#BABABA']

                }
            });

            c3.generate({
                bindto: '#pie',
                data:{
                    columns: [
                        ['data1', 30],
                        ['data2', 120]
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    },
                    type : 'pie'
                }
            });

        });

    </script>


</body>
</html>