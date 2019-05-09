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
                                <div class="ibox-title">
                                    <h5>Create New Form</h5>
                                </div>  
                                <div class="ibox-content">
                                    <?php echo form_open_multipart('admin/add_form/')?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Form Title</label>
                                            <input type="text" class="form-control" name="title" required="">
                                            <br>
                                            <label>Link</label>
                                            <p><small> <?php echo base_url("open/questioner/")?> {<i>your url</i> } </small></p>
                                            <input type="text" class="form-control" name="link" required="">
                                            <br>
                                            <label>Description</label>
                                            <textarea style="height: 100px;" type="text" class="form-control" name="description" required></textarea>
                                            
                                            <br>
                                            <label class="checkbox-inline i-checks"> <input type="checkbox" class="form-control" checked="" value="1" name="status"> is Active?</label>
                                        </div>
                                    </div>

                                    <br>
                                    <button class="btn btn-block btn-primary" type="submit"><i class="fa fa-pencil "></i> Create</button>
                                    <?php echo form_close()?>
                                </div>
                            </div>
                        </div>

                        <!-- My Form -->
                        <div class="col-lg-8">
                            <div class="ibox float-e-margins" >
                                <div class="ibox-title">
                                    <h5>My Form</h5>
                                </div>  
                            </div>
                            <div class="row">
                            <?php for ($i=0; $i < count($form) ; $i++) { ?>
                            
                                <div class="col-md-12">
                                    <div class="ibox float-e-margins" >
                                        <div class="ibox-content">
                                            <div>
                                                <!-- <input type="hidden" value="<?php echo base_url()?>open/questioner/<?php echo rawurlencode($form[$i]->link) ?>" id="url-formCode-<?php echo $form[$i]->formCode?>"> -->
                                                <h3><b><?php echo $form[$i]->title?>  </b><span class="label label<?php echo $form[$i]->isActive==1? '-success">Aktif' : '-danger">Tidak Aktif'?></span></h3>
                                                <?php if($form[$i]->isActive==1) {?>
                                                
                                                <?php }?>
                                                <a href="<?php echo base_url()?>open/questioner/<?php echo rawurlencode($form[$i]->link) ?>" target="_blank"><button type="button" class="btn btn-xs btn-warning">View Questionare</button></a>
                                                <!-- <button type="button" class="btn btn-xs btn-info myTooltip" data-toggle="tooltip" data-placement="top" title="Copy to clipboard" data-formCode="<?php echo $form[$i]->formCode?>">Copy URL</button> -->
                                                <p><?php echo $form[$i]->description ?></p>
                                                <button class="btn btn-xs btn-warning" disabled=""><i class="fa fa-pencil "></i> Edit Form</button>
                                                <button class="btn btn-xs btn-danger" disabled=""><i class="fa fa-trash "></i> Delete Form</button>
                                                <a href="<?php echo base_url('admin/question/'.$form[$i]->formCode)?>"><button class="btn btn-xs btn-info"><i class="fa fa-question"></i> Add Question</button></a>
                                                <a href="<?php echo base_url('admin/export_excel/'.$form[$i]->formCode)?>"><button class="btn btn-xs btn-primary"><i class="fa fa-download"></i> Download Result</button></a>
                                                <a href="<?php echo base_url('admin/view_dashboard/'.$form[$i]->formCode)?>"><button class="btn btn-xs btn-success"><i class="fa fa-eye"></i> View Dashboard</button></a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                            <?php } ?>
                            </div>
                        </div>

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



<script src="<?php echo base_url()?>js/plugins/dataTables/datatables.min.js"></script>

<!-- iCheck -->
    <script src="<?php echo base_url()?>js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();

                $('.myTooltip').click(function(e){
                    var me = $(this);
                    var formCode = me.attr("data-formCode");
                    var copyText = document.getElementById("url-formCode-"+formCode);
                    copyText.select();
                    document.execCommand("copy");
                });

                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>

</body>
</html>