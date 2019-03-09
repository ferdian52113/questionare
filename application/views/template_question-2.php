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

<body class="gray-bg top-navigation" style="display: table;
position: relative;
width: 100%;
height: 100%;
background: url(assets/home-b.jpg) no-repeat center center scroll;
-webkit-background-size: cover;
-moz-background-size: cover;
background-size: cover;
-o-background-size: cover;">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="wrapper wrapper-content">
            <div class="container">
                <?php echo $this->session->flashdata('msg'); ?>
                <div class="row">
                    <!-- Questionare-->
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="ibox float-e-margins">
                            <div id="formContainer">
                             <div class="ibox-title" id="formTitle" >
                                <h1><?php echo $form[0]->title?></h1>
                            </div>
                            <div class="ibox-content" id="formDescription" style="text-align: justify;">
                                <?php echo $form[0]->description?>
                            </div>  
                        </div>
                        <?php for($i=0;$i<count($section);$i++) {?>
                            <div id="sectionContainer-<?php echo $section[$i]->sectionID?>">
                                <div class="ibox-content orange-bg sectionTitle" id="sectionTitle[$i]-<?php echo $section[$i]->sectionID?>" >
                                    <h2><?php echo $section[$i]->title?></h2>
                                </div>
                                <?php if($section[$i]->description){ ?>
                                    <div class="ibox-content sectionDescription" id="sectionDescription-<?php echo $section[$i]->sectionID?>" style="text-align: justify;">
                                        <h5><?php echo $section[$i]->description?></h5>
                                    </div>  
                                <?php } ?>
                            </div>
                            <?php for($j=0;$j<count($question);$j++) {
                                if($question[$j]->sectionID == $section[$i]->sectionID) {
                                    /*Type Input*/
                                    if($question[$j]->questionType == 'Input') {
                                        echo '<div id="questionContaine-'.$question[$j]->questionID.'">
                                        <div class="ibox-content" id="question-'.$question[$j]->questionID.'" >
                                        <div class="row">
                                        <div class="col-md-6">
                                        <label>'.($j+1) . '. '.$question[$j]->question.' <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="'.$question[$j]->question.'" '.($question[$j]->isRequired==1? " required" : "").'>
                                        </div>
                                        </div>
                                        </div>
                                        </div>';
                                    }
                                    /*Type Multiple Choice*/
                                }
                            }
                        } ?>
                        <div id="questionContaine-">
                            <div class="ibox-content" id="question-" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Jenis Kelamin<span style="color:red">*</span></label><br>
                                        <div class="i-checks">
                                            <label><input type="radio" value="Laki-laki" name="jenisKelamin"> Laki-Laki</label>
                                        </div>
                                        <div class="i-checks">
                                            <label><input type="radio" value="Perempuan" name="jenisKelamin"> Perempuan</label>
                                        </div>
                                        <div class="i-checks">
                                            <label><input type="radio" value="" name="jenisKelamin"> Yang lain: <input class="form" type="text" name="jenisKelamin"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
        $('.i-checks').show();
    });
</script>

</body>
</html>