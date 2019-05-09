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

</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">

            <?php include('admin_header.php') ?>

            <div class="wrapper wrapper-content">

                <div class="container">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="row">
                        <!-- Create Form-->
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins" >
                                <div class="ibox-content">
                                    <?php for ($i=0; $i < count($form) ; $i++) { ?>
                                        <div>
                                            <h3><b><?php echo $form[$i]->title?>  </b><span class="label label<?php echo $form[$i]->isActive==1? '-success">Aktif' : '-danger">Tidak Aktif'?></span></h3>
                                            <p><?php echo $form[$i]->description ?></p>
                                            <a href=""><button class="btn btn-xs btn-primary"><i class="fa fa-add"></i> Add Section</button></a>
                                        </div>
                                        <div class="pull-right">
                                            
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <!-- My Form -->
                        <div class="col-lg-8">
                            <!-- <div id="section-1">
                                <div id="sectionContainer-1">
                                    <div class="ibox-content orange-bg sectionTitle" id="sectionTitle-1">
                                        <h2>Bagian 1: Informasi Umum <span class="pull-right"><a href=""><button class="btn btn-xs btn-info"><i class="fa fa-add"></i> Add Question</button></a></span></h2> 
                                    </div>
                                </div>
                                <div id="formSection-1" data-sectionid="1">
                                    <input type="hidden" name="formCode" value="gTyluecT6G">
                                    <input type="hidden" class="responseID" name="responseID" value="FLePs">
                                    <input type="hidden" name="sectionID" value="1">
                                    <div class="ibox-content" id="questionContainer-1" style="margin-bottom: 25px;">
                                        <div id="questionContaine-1">
                                            <div id="section1-question1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>1. Nama Perusahaan Anda 
                                                            <span style="color:red">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" autocomplete="off" name="1" required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div> -->
                            <?php for($i=0;$i<count($section);$i++) { $no=0;?>
                                <input type="hidden" name="sectionID" value="<?php echo $section[$i]->sectionID?>">
                                <div id="section-<?php echo $section[$i]->sectionID?>">
                                    <div id="sectionContainer-<?php echo $section[$i]->sectionID?>">
                                        <div class="ibox-content orange-bg sectionTitle" id="sectionTitle-<?php echo $section[$i]->sectionID?>" >
                                            <h2><?php echo $section[$i]->title?></h2>
                                        </div>
                                        <?php if($section[$i]->description){ ?>
                                            <div class="ibox-content sectionDescription" id="sectionDescription-<?php echo $section[$i]->sectionID?>">
                                                <h5><?php echo $section[$i]->description?></h5>
                                            </div>  
                                        <?php } ?>
                                    </div>
                                    <div id="formSection-<?php echo $section[$i]->sectionID?>" data-sectionID="<?php echo $section[$i]->sectionID?>" >
                                        <input type="hidden" name="formCode" name="formCode" value="<?php echo $form[0]->formCode?>">
                                        <input type="hidden" class="responseID" name="responseID" value="">
                                        <input type="hidden" name="sectionID" value="<?php echo $section[$i]->sectionID?>">
                                        <div class="ibox-content" id="questionContainer-<?php echo $section[$i]->sectionID?>" style="margin-bottom: 25px;">
                                            <?php for($j=0;$j<count($question);$j++) {
                                                if($question[$j]->sectionID == $section[$i]->sectionID) {
                                                    $no++;
                                                    /*Type Input*/
                                                    if($question[$j]->questionType == 'Input') {
                                                        echo '<div id="questionContaine-'.$question[$j]->questionID.'">
                                                        <div id="section'.$section[$i]->sectionID.'-question'.$question[$j]->questionID.'" >
                                                        <div class="row">
                                                        <div class="col-md-12">
                                                        <label>'.($no) . '. '.$question[$j]->question.' <span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" autocomplete="off" name="'.$question[$j]->questionID.'" '.($question[$j]->isRequired==1? " required" : "").'>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div><br></br>';
                                                    }
                                                    /*Type Multiple Choice*/
                                                    else if ($question[$j]->questionType=='Multiple Choice'){
                                                        echo '<div id="questionContaine-'.$question[$j]->questionID.'">
                                                        <div id="section'.$section[$i]->sectionID.'-question'.$question[$j]->questionID.'" >
                                                        <div class="row">
                                                        <div class="col-md-12">
                                                        <label>'.($no) . '. '.$question[$j]->question.' 
                                                        <span style="color:red">*</span>
                                                        </label><br>';
                                                        for($k=0;$k<count($questionDetail);$k++) {
                                                            if($questionDetail[$k]->questionID == $question[$j]->questionID){
                                                                echo '<div class="i-checks">
                                                                <label><input type="radio" value="'.$questionDetail[$k]->value.'" name="'.$questionDetail[$k]->questionID.'" required> '.$questionDetail[$k]->value.'</label>
                                                                </div>';
                                                            }
                                                        }
                                                        if($question[$j]->isOthers == 1){
                                                            echo '<div class="i-checks">
                                                            <label><input type="radio" value="other" name="'.$question[$j]->questionID.'"  required> Yang lain: <input class="form" type="text" name="'.$question[$j]->questionID.'-other" ></label>
                                                            </div>';
                                                        }
                                                        echo '
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        <br></br>';
                                                    }
                                                    /*Likert Input*/
                                                    else if($question[$j]->questionType == 'Skala') {
                                                        echo '<div id="questionContaine-'.$question[$j]->questionID.'">
                                                        <div id="section'.$section[$i]->sectionID.'-question'.$question[$j]->questionID.'" >
                                                        <div class="row">
                                                        <div class="form-group">
                                                        <div class="col-lg-12">
                                                        <label>'.($no) . '. '.$question[$j]->question.' <span style="color:red">*</span></label>
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <table width="100%">
                                                        <thead class="">
                                                        <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                        <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                        <td style="width:10%;text-align: center;">
                                                        <input class="i-checks" type="radio" value="1" name="'.$question[$j]->questionID.'" required/>
                                                        </td>
                                                        <td style="width:10%;text-align: center;">
                                                        <input class="i-checks" type="radio" value="2" name="'.$question[$j]->questionID.'" required/>
                                                        </td>
                                                        <td style="width:10%;text-align: center;">
                                                        <input class="i-checks" type="radio" value="3" name="'.$question[$j]->questionID.'" required/>
                                                        </td>
                                                        <td style="width:10%;text-align: center;">
                                                        <input class="i-checks" type="radio" value="4" name="'.$question[$j]->questionID.'" required/>
                                                        </td>
                                                        <td style="width:10%;text-align: center;">
                                                        <input class="i-checks" type="radio" value="5" name="'.$question[$j]->questionID.'" required/>
                                                        </td>
                                                        <td style="width:25%;text-align: left;">Sanget Setuju</td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div><br></br>';
                                                    }
                                                }
                                            }
                                            echo "</div>";
                                        } ?>    
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
                        });
                    </script>

                </body>
                </html>