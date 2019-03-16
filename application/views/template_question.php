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
                        <!-- <form action="http://localhost:8080/questionare/user/tambah" method="post" accept-charset="utf-8" enctype="multipart/form-data">  -->
                            <?php for($i=0;$i<count($section);$i++) { $no=0;?>
                                <input type="hidden" name="sectionID" value="<?php echo $section[$i]->sectionID?>">
                                <div id="section-<?php echo $section[$i]->sectionID?>" <?php echo ($section[$i]->sectionID>1)? "style='display:none'" : ""?>>
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
                                    <form id="formSection-<?php echo $section[$i]->sectionID?>" data-sectionID="<?php echo $section[$i]->sectionID?>" action="<?php echo $section[$i]->sectionID==$section[count($section)-1]->sectionID ? base_url()."open/save/final" : base_url()."open/save"?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                        <input type="hidden" name="formCode" name="formCode" value="<?php echo $form[0]->formCode?>">
                                        <input type="hidden" class="responseID" name="responseID" value="">
                                        <input type="hidden" name="sectionID" value="<?php echo $section[$i]->sectionID?>">
                                        <div class="ibox-content" id="questionContainer-<?php echo $section[$i]->sectionID?>" style="margin-bottom: 25px;<?php echo ($section[$i]->sectionID < 1)? "display: none" : ""?>">
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
                                            if($section[$i]->sectionID==$section[0]->sectionID){
                                                echo '
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <input type="submit" class="btn btn-success" data-show="section-'.$section[$i+1]->sectionID.'" data-section="section-'.$section[$i]->sectionID.'" id="next-'.$section[$i]->sectionID.'" value="Selanjutnya">
                                                    </div>
                                                </div>
                                                </div></div>';
                                            } else if ($section[$i]->sectionID==$section[count($section)-1]->sectionID){
                                                echo '
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <input type="button" data-show="section-'.$section[$i-1]->sectionID.'" data-section="section-'.$section[$i]->sectionID.'" class="prev-button btn btn-success" id="prev-'.$section[$i]->sectionID.'" value="Sebelumnya">
                                                        <input type="submit" class="btn btn-success" id="kirim-'.$section[$i]->sectionID.'" value="Kirim">
                                                    </div>
                                                </div>
                                                </div></div>';
                                            } else {
                                                echo '
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <input type="button" data-show="section-'.$section[$i-1]->sectionID.'" data-section="section-'.$section[$i]->sectionID.'" class="prev-button btn btn-success" id="prev-'.$section[$i]->sectionID.'" value="Sebelumnya">
                                                        <input type="submit" class="btn btn-success" data-show="section-'.$section[$i+1]->sectionID.'" data-section="section-'.$section[$i]->sectionID.'" id="next-'.$section[$i]->sectionID.'" value="Selanjutnya">
                                                    </div>
                                                </div>
                                                </div></div>';
                                            }
                                            echo "</form>";
                                        } ?>
                                    
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
            var lastSection = <?php echo $section[count($section)-1]->sectionID?>;
            var btnNext="";
            init();

            for (var i = 1; i <= count; i++) {
                $('#formSection-'+i).submit(function(e) {
                btnNext = $(this);
                e.preventDefault();
                if (btnNext.data('requestRunning')) {
                    return;
                }
                btnNext.data('requestRunning',true);
                var me = $(this);
                var sec  = me.attr('data-sectionID');
                var formCode=$("input[name=formCode]").val();
                // perform ajax
                $.ajax({
                    url: me.attr('action'),
                    type: 'post',
                    data: me.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            if(sec==lastSection){
                                window.location = "<?php echo base_url() . "open/done/" ?>"+formCode;
                            } else {
                                showhide(me.attr('data-sectionID'));
                            }
                        }
                        else {
                            alert("Please refresh page");
                        }
                        btnNext.data('requestRunning',false);
                    },
                    error: function(){
                        alert("Please refresh page");
                        btnNext.data('requestRunning',false);
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