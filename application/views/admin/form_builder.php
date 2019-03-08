
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Culture Compas | Survey Builder</title>

    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
    <script src="<?php echo base_url()?>js/jquery-2.1.1.js"></script>

</head>


<body class="canvas-menu">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">

        <div class="sidebar-collapse">
            <a class="close-canvas-menu"><i class="fa fa-times"></i></a>
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url()?>img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Hello</strong>
                             </span> <span class="text-muted text-xs block">Admin <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?php echo base_url()?>admin/logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        GA
                    </div>
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Survey</span>  <span class="pull-right label label-primary">SPECIAL</span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url()?>admin/forms">Forms</a></li>
                        <li><a href="<?php echo base_url()?>admin/construct">Construct</a></li>
                        <li><a href="<?php echo base_url()?>admin">Question</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url()?>admin/data"><i class="fa fa-files-o"></i> <span class="nav-label">Data</span></a>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Garuda Culture Compas.</span>
                </li>
                <li>
                    <a href="<?php echo base_url()?>admin/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Form Builder</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>admin">Home</a>
                        </li>
                        <li class="active">
                            <strong>Form Builder</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content  animated fadeInRight article">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                    <h5>Form List</h5>
                            </div>
                        </div>
                        
                            <?php if ($data_form == 0){ ?>                       
                                <div class="ibox-content">
                                    <h4 class="text-navy">Data penilaian belum tersedia</h4>
                                </div>                   
                            <?php } else { ?>  
                                <?php $c=count($data_form); for ($i=0; $i < $c; $i++) { ?>
                                <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="row">
                                        <h6>ID Form <?php echo $data_form[$i]->id_form ?></h6>
                                        <h3><?php echo $data_form[$i]->judul ?></h3>
                                        <h5 style="font-weight: normal;"><?php echo $data_form[$i]->deskripsi ?></h5>
                                        <h4 class="label label-info"><?php echo $data_form[$i]->nama ?></h4>
                                        <div class="hr-line-dashed"></div>
                                        <button type="button" class="btn btn-primary btn-xs table-hover pull-right" data-toggle="modal" data-target="#<?php echo $i ?>">Edit Form</button>

                                    </div>
                                </div>
                                <?php 
                                    $id_form=$data_form[$i]->id_form;
                                    if($this->input->post('is_submitted')){
                                        $judul          = set_value('judul');
                                        $deskripsi      = set_value('deskripsi');
                                        $form_type      = set_value('deskripsi');
                                    }
                                    else {
                                        $judul          = $data_form[$i]->judul;
                                        $deskripsi      = $data_form[$i]->deskripsi;
                                        $form_type      = $data_form[$i]->form_type;
                                    }
                                ?>

                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Form</h4>
                                      </div>
                                      <div class="modal-body">
                                            <!-- Isi Modal -->
                                            <div class="ibox-content">
                                            <?php echo form_open_multipart('admin/edit_form/'. $id_form)?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Judul</label>
                                                    <textarea style="height: 100px;" type="text" class="form-control " required value="<?=$judul?>" name="judul"><?=$judul?></textarea>
                                                    <label>Deskripsi</label>
                                                    <textarea style="height: 100px;" type="text" class="form-control " required value="<?=$deskripsi?>" name="deskripsi"><?=$deskripsi?></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tipe Form</label>
                                                        <select id="pilihan" class="form-control" required="" name="form_type">
                                                            <option value="<?=$form_type?>"><?php echo $data_form[$i]->nama?></option>
                                                            <?php $s=count($list_survey_type); for($a=0; $a < $s; $a++){ ?>
                                                                <option value="<?php echo $list_survey_type[$a]->id_survey ?>"><?php echo $list_survey_type[$a]->nama ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                                <div class="modal-footer">                     
                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o "></i>  Save</button>
                                                </div> 
                                            <?php echo form_close()?>
                                            </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                <!-- End of Modal -->
                                <?php } ?>
                            <?php } ?>
                        
                    </div>
                    <div class="col-lg-8">
                        <div class="ibox float-e-margins" >
                            <div class="ibox-title">
                                <h5>Form Builder</h5>
                            </div>  
                            <div class="ibox-content">
                                <?php echo form_open_multipart('admin/add_form/')?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Judul</label>
                                        <textarea style="height: 100px;" type="text" class="form-control " required name="judul"></textarea>
                                        <label>Deskripsi</label>
                                        <textarea style="height: 100px;" type="text" class="form-control " required name="deskripsi"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipe Form</label>
                                            <select id="pilihan" class="form-control" required="" name="form_type">
                                                <?php $s=count($list_survey_type); for($i=0; $i < $s; $i++){ ?>
                                                    <option value="<?php echo $list_survey_type[$i]->id_survey ?>"><?php echo $list_survey_type[$i]->nama ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Add New Form</button>
                                <?php echo form_close()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                    <strong>Copyright</strong> Garuda Indonesia &copy; 2017
            </div>

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

    <script>
        $('body.canvas-menu .sidebar-collapse').slimScroll({
                        height: '100%',
                        railOpacity: 0.9
                    });
    </script>
    <script src="<?php echo base_url();?>js/plugins/dataTables/datatables.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });
    </script>

</body>

</html>
