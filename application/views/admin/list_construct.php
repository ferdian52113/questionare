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
                        IN+
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
                    <h2>List Construct</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>admin">Home</a>
                        </li>
                        <li class="active">
                            <strong>List Construct</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content  animated fadeInRight article">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                        <th class="text-center" style="width: 10%;">ID Form</th>
                                            <th class="text-center" style="width: 55%;">Construct</th>
                                            <th class="text-center" style="width: 15%;">
                                            <button type="button" class="btn btn-primary btn-xs table-hover" data-toggle="modal" data-target="#modal_tambah">Tambah</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($list_construct as $hasil) : ?>
                                        <tr>
                                            <td class="text-center" style="width: 10%;"><?php echo $hasil->id_form?></td>
                                            <td style="width: 55%;"><?php echo $hasil->parent_name?></td>
                                            <td class="text-center" style="width: 15%;">
                                                <button type="button" class="btn btn-default btn-xs table-hover" data-toggle="modal" data-target="#<?php echo $hasil->id_parent?>">Edit</button> 
                                                <?=anchor( 'admin/delete_construct/' . $hasil->id_parent,
                                                    'Hapus',
                                                    ['class'=>'btn btn-xs btn-danger',
                                                    'onclick'=>'return confirm(\'Apakah Anda Yakin?\')'
                                                ])?>        
                                            </td>
                                        </tr>
                                        
                                <?php 
                                $id_parent=$hasil->id_parent;
                                if($this->input->post('is_submitted')){
                                            $parent_name        = set_value('parent_name');
                                            $id_form            = set_value('id_form');
                                }
                                else {
                                            $parent_name        = $hasil->parent_name;
                                            $id_form            = $hasil->id_form;
                                }
                                ?>
                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo $hasil->id_parent?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Tambah Pertanyaan</h4>
                                      </div>
                                      <div class="modal-body">
                                        <!-- Isi Modal -->
                                        <div class="box-body">                                                            
                                            <?php echo form_open_multipart('admin/edit_construct/'. $id_parent)?>
                                                <div class="row" style="margin-left: 0;">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label>ID Form</label>
                                                            <select id="pilihan" class="form-control" required="" name="id_form">
                                                                <option value="<?=$id_form?>"><?=$id_form?></option>
                                                                <?php $z=count($data_form); for ($i=0; $i < $z ; $i++) { ?>
                                                                <option value="<?php echo $data_form[$i]->id_form; ?>"><?php echo $data_form[$i]->id_form; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Construct</label>
                                                            <textarea style="height: 100px;" type="text" class="form-control " required name="parent_name" placeholder="Tuliskan pertanyaan disini" value="<?php echo $parent_name?>"><?php echo $parent_name?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>                                                               
                                            <?php echo form_close()?>                                         
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- End of Modal -->
                                <?php endforeach; ?>                                                        
                                </tbody>
                                </table>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Tambah Construct</h4>
                                  </div>
                                  <div class="modal-body">
                                    <!-- Isi Modal -->
                                    <div class="box-body">                                                            
                                        <?php echo form_open_multipart('admin/tambah_construct')?>
                                            <div class="row" style="margin-left: 0;">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>ID Form</label>
                                                        <select id="pilihan" class="form-control" required="" name="id_form">
                                                            <?php $z=count($data_form); for ($i=0; $i < $z ; $i++) { ?>
                                                            <option value="<?php echo $data_form[$i]->id_form; ?>"><?php echo $data_form[$i]->id_form; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Pertanyaan</label>
                                                        <textarea style="height: 100px;" type="text" class="form-control " required name="parent_name" placeholder="Tuliskan pertanyaan disini"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>                                                               
                                        <?php echo form_close()?>                                         
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- End of Modal -->
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
