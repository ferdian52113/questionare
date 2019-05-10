<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo isset($companyName)? $companyName->valueName." | " : ""?> ADMIN</title>

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
                                        <button id="btnAddSection" class="btn btn-xs btn-primary"><i class="fa fa-add"></i> Add Section</button>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="ibox float-e-margins">
                            <?php for($i=0;$i<count($section);$i++) { $no=0;?>
                                <input type="hidden" name="sectionID" value="<?php echo $section[$i]->sectionID?>">
                                <div id="section-<?php echo $section[$i]->sectionID?>">
                                    <div id="sectionContainer-<?php echo $section[$i]->sectionID?>">
                                        <div class="ibox-content orange-bg sectionTitle" id="sectionTitle-<?php echo $section[$i]->sectionID?>" >
                                            <h2><?php echo $section[$i]->title?> </h2>
                                            <?php if($section[$i]->description == "" ){
                                                echo '<h2>
                                                <span style="margin-right:10px"><button class="btn btn-xs btn-info btnAddQuestion"><i class="fa fa-add"></i> Add Question</button></span>
                                                <span><button class="btn btn-xs btn-warning btnEditSection" data-sectionID="'.$section[$i]->sectionID.'"><i class="fa fa-add"></i> Edit Section</button></span>
                                                </h2>';
                                            }?>
                                        </div>
                                        <?php if($section[$i]->description){ ?>
                                            <div class="ibox-content sectionDescription" id="sectionDescription-<?php echo $section[$i]->sectionID?>">
                                                <h5><?php echo $section[$i]->description?></h5>
                                                <h2>
                                                    <span style="margin-right:10px"><button class="btn btn-xs btn-info btnAddQuestion"><i class="fa fa-add"></i> Add Question</button></span>
                                                    <span><button class="btn btn-xs btn-warning btnEditSection" data-sectionID="<?php echo $section[$i]->sectionID?>"><i class="fa fa-add"></i> Edit Section</button></span>
                                                </h2>
                                            </div>  
                                        <?php } ?>
                                    </div>
                                    <div id="formSection-<?php echo $section[$i]->sectionID?>" data-sectionID="<?php echo $section[$i]->sectionID?>">
                                        <input type="hidden" class="formCode" name="formCode" value="<?php echo $form[0]->formCode?>">
                                        <input type="hidden" class="responseID" name="responseID" value="">
                                        <input type="hidden" name="sectionID" value="<?php echo $section[$i]->sectionID?>">
                                        <div class="ibox-content" id="questionContainer-<?php echo $section[$i]->sectionID?>" style="margin-bottom: 25px;">
                                            <?php for($j=0;$j<count($question);$j++) {
                                                if($question[$j]->sectionID == $section[$i]->sectionID) {
                                                    $no++;
                                                    /*Type Input*/
                                                    if($question[$j]->questionType == 'Input') {
                                                        echo '<div id="questionContainer-'.$question[$j]->questionID.'">
                                                        <div id="section'.$section[$i]->sectionID.'-question'.$question[$j]->questionID.'" >
                                                        <div class="row">
                                                        <div class="col-md-12">
                                                        <label>'.($no) . '. '.$question[$j]->question.' <span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" autocomplete="off" name="'.$question[$j]->questionID.'" '.($question[$j]->isRequired==1? " required" : "").'>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>';
                                                    }
                                                    /*Type Multiple Choice*/
                                                    else if ($question[$j]->questionType=='Multiple Choice'){
                                                        echo '<div id="questionContainer-'.$question[$j]->questionID.'">
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
                                                        </div>';
                                                    }
                                                    /*Likert Input*/
                                                    else if($question[$j]->questionType == 'Skala') {
                                                        echo '<div id="questionContainer-'.$question[$j]->questionID.'">
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
                                                        <td style="width:25%;text-align: left;">Sangat Setuju</td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>';
                                                    }
                                                    echo '<h2>
                                                    <span style="margin-right:10px"><a href=""><button class="btn btn-xs btn-info"><i class="fa fa-add"></i> Edit Question</button></a></span>
                                                    <span style="margin-right:10px"><a href=""><button class="btn btn-xs btn-danger"><i class="fa fa-add"></i> Delete Question</button></a></span>
                                                    <span><a href=""><button class="btn btn-xs btn-warning"><i class="fa fa-add"></i> Move Question</button></a></span>
                                                    </h2>
                                                    <br></br>';  
                                                }
                                            }
                                            echo "</div></div></div>";
                                        } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include('admin_footer.php') ?>
                </div>
            </div>
            <!-- Modal Section -->
            <div id="Section" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content section-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" id="modal-title">Add Section</h4>
                        </div>
                        <div class="modal-body">
                            <form id="modalSection" method="post" >
                                <input type="hidden" id="formCode" name="formCode" value="<?php echo $form[0]->formCode?>">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Section Name <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" placeholder="ex: Section 1: Informasi Umum" autocomplete="off" id="sectionTitleModal" name="sectionTitleModal" required="">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Section Description</label>
                                        <textarea class="form-control" autocomplete="off" id="sectionDescriptionModal" name="sectionDescriptionModal" rows="10" style="height:100%"></textarea>
                                    </div>
                                    <div class="col-md-12 text-right form-group">
                                        <button type="submit" class="btn btn-primary" >Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Question -->
            <div id="Question" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content question-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" id="modal-title-question">Add Question</h4>
                        </div>
                        <div class="modal-body">
                            <form id="modalQuestion" method="post" >
                                <input type="hidden" id="formCode" name="formCode" value="<?php echo $form[0]->formCode?>">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Question Type<span style="color:red">*</span></label>
                                        <select name="questionTypeModal" >
                                            <option value="0">--Please Select--</option>
                                            <option value="1">Input</option>
                                            <option value="2">Multiple Choices</option>
                                            <option value="3">Skala</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Question</label>
                                        <textarea class="form-control" autocomplete="off" id="questionModal" name="questionModal" rows="10" style="height:100%"></textarea>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label class="checkbox-inline i-checks"> <input type="checkbox" class="form-control" checked="" value="1" name="isRequired"> Is required?</label>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label class="checkbox-inline i-checks"> <input type="checkbox" class="form-control" checked="" value="1" name="isRequired"> Responden can choose other answers?</label>
                                    </div>
                                    <div class="col-md-12 text-right form-group">
                                        <button type="submit" class="btn btn-primary" >Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div






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
                    var btnEdit = "";
                    $('#btnAddSection').click(function(e){
                        $('#sectionTitleModal').val("");
                        $('#sectionDescriptionModal').html("");

                        $('#modal-title').html("Add Section");
                        $('#modalSection').attr("action","<?php echo base_url('admin/addSection')?>");
                        $('#Section').modal();
                    });

                    $('.btnEditSection').click(function(e){
                        btnEdit = $(this);
                        var sectionID = btnEdit.attr("data-sectionID");
                        var sectionTitle = typeof($('#sectionTitle-'+sectionID).children()[0]) !== "undefined"? $('#sectionTitle-'+sectionID).children()[0].innerText : "";
                        var sectionDescription = typeof($('#sectionDescription-'+sectionID).children()[0]) !== "undefined"? $('#sectionDescription-'+sectionID).children()[0].innerText : "";

                        $('#sectionTitleModal').val(sectionTitle);
                        $('#sectionDescriptionModal').html(sectionDescription);


                        $('#modal-title').html("Edit Section");
                        $('#modalSection').attr("action","<?php echo base_url('admin/editSection')?>/"+sectionID);
                        $('#Section').modal();
                    });

                    $('.btnAddQuestion').click(function(e){
                        btnEdit = $(this);
                        var sectionID = btnEdit.attr("data-sectionID");
                        var sectionTitle = typeof($('#sectionTitle-'+sectionID).children()[0]) !== "undefined"? $('#sectionTitle-'+sectionID).children()[0].innerText : "";
                        var sectionDescription = typeof($('#sectionDescription-'+sectionID).children()[0]) !== "undefined"? $('#sectionDescription-'+sectionID).children()[0].innerText : "";

                        $('#sectionTitleModal').val(sectionTitle);
                        $('#sectionDescriptionModal').html(sectionDescription);


                        $('#modal-title').html("Add Question");
                        $('#modalSection').attr("action","<?php echo base_url('admin/addQuestion')?>/"+sectionID);
                        $('#Question').modal();
                    });


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