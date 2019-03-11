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
                                                <h3><b><?php echo $form[$i]->title?>  </b><span class="label label<?php echo $form[$i]->isActive==1? '-success">Aktif' : '-danger">Tidak Aktif'?></span></h3>
                                                <p><a href="<?php echo base_url()?>open/questioner/<?php echo rawurlencode($form[$i]->link) ?>"><?php echo base_url()?>open/questioner/<?php echo rawurlencode($form[$i]->link) ?></a></p>
                                                <p><?php echo $form[$i]->description ?></p>
                                                <button class="btn btn-xs btn-warning"><i class="fa fa-pencil "></i> Edit Form</button>
                                                <button class="btn btn-xs btn-danger"><i class="fa fa-trash "></i> Hapus Form</button>
                                                <a href="<?php echo base_url('admin/'.$form[$i]->formCode)?>"><button class="btn btn-xs btn-success"><i class="fa fa-eye"></i> Lihat Respon</button></a>
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