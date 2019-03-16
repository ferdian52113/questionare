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
                    
                        <!-- Dashboard -->
                        <?php for ($i=0; $i < count($question); $i++) { 
                            $no = $i+1; ?>

                        <?php if($i%2==0) {?>
                            <div class="row">
                        <?php } ?>

                        <?php if ($question[$i]->questionType=='Input') { ?>
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <div class="row" >
                                            <div class="col-md-1" style="transform: translateY(-15%);"><h2><?php echo $no ?></h2></div>
                                            <div class="col-md-11"><span><?php echo $question[$i]->question ?></span></div>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div>
                                            <textarea id="input<?php echo $question[$i]->questionID ?>" style="width: 100%;height: 300px" readonly="true">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else if ($question[$i]->questionType=='Multiple Choice') {?>
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <div class="row">
                                            <div class="col-md-1" style="transform: translateY(-15%);"><h2><?php echo $no ?></h2></div>
                                            <div class="col-md-11"><span><?php echo $question[$i]->question ?></span></div>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div>
                                            <div id="pie<?php echo $question[$i]->questionID ?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else if ($question[$i]->questionType=='Skala') {?>
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <div class="row">
                                            <div class="col-md-1" style="transform: translateY(-15%);"><h2><?php echo $no ?></h2></div>
                                            <div class="col-md-11"><span><?php echo $question[$i]->question ?></span></div>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div>
                                            <div id="gauge<?php echo $question[$i]->questionID ?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }  ?>

                        <?php if($i%2!=0) {?>
                            </div>
                        <?php } ?>

                        <?php } ?>
                        <!-- END -->
                    
                    
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
                bindto: '#stocked',
                data:{
                    columns: [
                        ['LikertScale', 200,100,400,150,250],
                        ['Average', 120,120,120,120,120]
                    ],
                    colors:{
                        LikertScale: '#1ab394',
                        Average: '#BABABA'
                    },
                    type: 'bar',
                    types: {
                        Average: 'line'
                    },
                    axis: {
                      x: {
                        max: 1
                        
                      }
                    }
                }
            });

            // Skala
            <?php for ($c=0; $c < count($question); $c++) { 
                if ($question[$c]->questionType=='Skala') {
            ?>
            c3.generate({
                bindto: '#gauge<?php echo $question[$c]->questionID ?>',
                data:{
                    columns: [
                        <?php for ($d=0; $d < count($answerScale); $d++) { 
                            if ($answerScale[$d]->questionID == $question[$c]->questionID) {
                        ?>
                        ['data', <?php echo $answerScale[$d]->average ?>]
                        <?php } } ?>
                    ],

                    type: 'gauge'
                },
                gauge: {
                    label: {
                        format: function(value, ratio) {
                            return value;
                        }
                    },
                    min: 1,
                    max: 5
                },
                color:{
                    pattern: ['#1ab394', '#BABABA']

                }

            });
            <?php } } ?>

            // Multiple Choice
            <?php for ($a=0; $a < count($question); $a++) { 
                if ($question[$a]->questionType=='Multiple Choice') {
            ?>
            c3.generate({
                bindto: '#pie<?php echo $question[$a]->questionID ?>',
                data:{
                    columns: [
                        <?php for ($b=0; $b < count($answerChoice); $b++) { 
                            if ($answerChoice[$b]->questionID == $question[$a]->questionID) {
                        ?>
                            ['<?php echo $answerChoice[$b]->value ?>', <?php echo $answerChoice[$b]->total ?>],
                        <?php } } ?>
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    },
                    type : 'pie'
                }
            });
            <?php } } ?>

            <?php for ($a=0; $a < count($question); $a++) { 
                if ($question[$a]->questionType=='Input') {
            ?>
            <?php $ans="";
            for ($j=0; $j < count($answerInput) ; $j++) {  
                    if($answerInput[$j]->questionID==$question[$a]->questionID) {
                        $ans = $ans.trim($answerInput[$j]->value).'\n';
                        ?> 
                    <?php } 
                }
            ?>
            <?php }?> 
                var ans = "<?php echo $ans?>";
                $("#input"+<?php echo $question[$a]->questionID?>).val(ans.trim());
            <?php } ?>


        });

    </script>


</body>
</html>