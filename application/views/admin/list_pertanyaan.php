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
    <script type="text/javascript">
    $(document).ready(function(){
        $("#pilihan").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue == "skala"){
                    $("#jumla").not("." + optionValue).show();
                    $("#multiple_choice").hide();
                    $("#forced_choice").hide();
                } else if (optionValue == "multiple choice"){
                    $("#jumla").hide();
                    $("#multiple_choice").not("." + optionValue).show();
                    $("#forced_choice").hide();
                } else if (optionValue == "forced choice"){
                    $("#jumla").hide();
                    $("#forced_choice").not("." + optionValue).show();
                    $("#multiple_choice").hide();
                    $("#question").hide();
                } else {
                    $("#jumla").hide();
                    $("#multiple_choice").hide();
                    $("#forced_choice").hide();
                }
            });
        }).change();
    });
    </script>
    <?php 
    for ($i=1;$i<=count($list_pertanyaan);$i++) {
    ?>
    
    <script type="text/javascript">
    $(document).ready(function(){
        $("#pilih<?php echo $i?>").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue == "skala"){
                    $("#jml<?php echo $i?>").not("." + optionValue).show();
                    $("#multiple_choice<?php echo $i?>").hide();
                    $("#forced<?php echo $i?>").hide();
                } else if (optionValue == "multiple choice"){
                    $("#jml<?php echo $i?>").hide();
                    $("#multiple_choice<?php echo $i?>").not("." + optionValue).show();
                    $("#forced<?php echo $i?>").hide();
                } else if (optionValue == "forced choice"){
                    $("#jml<?php echo $i?>").hide();
                    $("#multiple_choice<?php echo $i?>").hide();
                    $("#forced<?php echo $i?>").not("." + optionValue).show();
                    $("#quest<?php echo $i?>").hide();
                } else {
                    $("#jml<?php echo $i?>").hide();
                    $("#multiple_choice<?php echo $i?>").hide();
                    $("#forced<?php echo $i?>").hide();
                }
            });
        }).change();
    });
    </script>
    <?php } ?>
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
                    <h2>List Pertanyaan</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>admin">Home</a>
                        </li>
                        <li class="active">
                            <strong>List Pertanyaan</strong>
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
                                            <th class="text-center" style="width: 25%;">Construct</th>
                                            <th class="text-center" style="width: 50%;">Pertanyaan</th>
                                            <th class="text-center" style="width: 10%;">Tipe</th>
                                            <th class="text-center" style="width: 15%;">
                                            <button type="button" class="btn btn-primary btn-xs table-hover" data-toggle="modal" data-target="#modal_tambah">Tambah</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $p=0; foreach($list_pertanyaan as $hasil) : $p++;?>
                                            <tr>
                                                <td style="width: 25%;"><?php echo $hasil->parent_name?></td>
                                                <td style="width: 50%;"><?php echo $hasil->question?></td>
                                                <td class="text-center" style="width: 10%;"><?php echo $hasil->type?></td></td>
                                                <td class="text-center" style="width: 15%;">
                                                    <button type="button" class="btn btn-default btn-xs table-hover" data-toggle="modal" data-target="#<?php echo $hasil->id_child?>">Edit</button> 
                                                    <?=anchor( 'admin/delete/' . $hasil->id_child,
                                                       'Hapus',
                                                       ['class'=>'btn btn-xs btn-danger',
                                                       'onclick'=>'return confirm(\'Apakah Anda Yakin?\')'
                                                    ])?>        
                                                </td>
                                            </tr>
                                        
                                <?php 
                                $id_child=$hasil->id_child;
                                if($this->input->post('is_submitted')){
                                            $id_form            = set_value('id_form');
                                            $parent_id          = set_value('parent_name');
                                            $question           = set_value('question');
                                            $type               = set_value('type');
                                            $kategori           = set_value('kategori');
                                            $jumlah             = set_value('jumlah');

                                }
                                else {
                                            $id_form            = $hasil->id_form;
                                            $parent_id          = $hasil->parent_id;
                                            $question           = $hasil->question;
                                            $type               = $hasil->type;
                                            $kategori           = $hasil->kategori;
                                            $jumlah             = $hasil->jumlah;

                                }
                                ?>
                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo $hasil->id_child?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Tambah Pertanyaan</h4>
                                      </div>
                                      <div class="modal-body">
                                        <!-- Isi Modal -->
                                        <div class="box-body">                                                            
                                            <?php echo form_open_multipart('admin/edit_pertanyaan/'. $id_child)?>
                                                <div class="row" style="margin-left: 0;">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>ID Form</label>
                                                            <select class="form-control" required="" name="id_form">
                                                                <option value="<?=$id_form?>"><?=$id_form?></option>
                                                                <?php $z=count($data_form); for ($i=0; $i < $z ; $i++) { ?>
                                                                <option value="<?php echo $data_form[$i]->id_form; ?>"><?php echo $data_form[$i]->id_form; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Construct</label>
                                                            <select class="form-control" required="" name="parent_id">
                                                                <option value="<?php echo $parent_id?>"><?php echo $hasil->parent_name?></option>
                                                                <?php foreach ($list_construct as $a) : ?>
                                                                    <option value="<?php echo $a->id_parent?>"><?php echo $a->parent_name?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Insert Image(.JPG or .PNG)</label>                
                                                        <input type="file" name="userfile">
                                                        <div>
                                                          <?php if($hasil->userfile == NULL){ ?>
                                                           <h5>Tidak ada file</h5>
                                                          <?php } else {?>
                                                          <a href="<?php echo base_url();?>uploads/<?php echo $hasil->userfile ?>"><?php echo $hasil->userfile ?></a>
                                                          <?php }?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" id="quest<?php echo $p;?>">    
                                                        <div class="form-group">
                                                            <label>Pertanyaan</label>
                                                            <textarea style="height: 100px;" type="text" class="form-control " name="question" placeholder="Tuliskan pertanyaan disini" value="<?php echo $question?>"><?php echo $question?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tipe Jawaban</label>
                                                            <select id="pilih<?php echo $p;?>" class="form-control" required=""  name="type">
                                                                <option value="<?=$type?>"><?=$type?></option>
                                                                <option value="skala">Skala</option>
                                                                <option value="textarea">Textarea</option>
                                                                <option value="input">Input Text</option>
                                                                <option value="multiple choice">Multiple Choice</option>
                                                                <option value="forced choice">Forced Choice</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" >
                                                        <div id="jml<?php echo $p;?>" style="display: none;">
                                                            <div class="col-md-6" >
                                                                <label>Nilai Maksimal Skala</label>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" value="<?php echo $jumlah?>" name="jumlah" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" >
                                                                <div class="form-group">
                                                                    <label>Kategori</label>
                                                                    <select id="kategori" class="form-control" required="" name="kategori">
                                                                            <option value="<?=$kategori?>"><?=$kategori?></option>
                                                                            <option value="Synergy">Synergy</option>
                                                                            <option value="Integrity">Integrity</option>
                                                                            <option value="Customer Focus">Customer Focus</option>
                                                                            <option value="Agility">Agility</option>
                                                                            <option value="Safety">Safety</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" id="multiple_choice<?php echo $p;?>" style="margin-left: 0;">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php $e=0; $d=count($list_multiple_choice); for($i=0; $i<$d; $i++) { $e++; ?>
                                                                <?php if($list_multiple_choice[$i]->id_question == $id_child) {?>
                                                                <input type="hidden" class="form-control" value="<?php $list_multiple_choice[$i]->id_choice ?>" name="id_choice" />
                                                                <div class="row" style="margin-bottom: 5px;">
                                                                    <div class="col-lg-1 text-right"><input type="radio" name="jawaban" <?php if($list_multiple_choice[$i]->answer ==1) {echo "checked";}?> value="1"></div>
                                                                    <div class="col-lg-11"><input type="text" class="form-control" value="<?php echo $list_multiple_choice[$i]->choice1?>" name="edittext[]"></div>
                                                                </div>
                                                                <div class="row" style="margin-bottom: 5px;">
                                                                    <div class="col-lg-1 text-right"><input type="radio" name="jawaban" <?php if($list_multiple_choice[$i]->answer ==2) {echo "checked";}?>  value="2"></div>
                                                                    <div class="col-lg-11"><input type="text" class="form-control" value="<?php echo $list_multiple_choice[$i]->choice2?>" name="edittext[]"></div>
                                                                </div>
                                                                <div class="row" style="margin-bottom: 5px;">
                                                                    <div class="col-lg-1 text-right"><input type="radio" name="jawaban" <?php if($list_multiple_choice[$i]->answer ==3) {echo "checked";}?>  value="3"></div>
                                                                    <div class="col-lg-11"><input type="text" class="form-control" value="<?php echo $list_multiple_choice[$i]->choice3?>" name="edittext[]"></div>
                                                                </div>
                                                                <div class="row" style="margin-bottom: 5px;">
                                                                    <div class="col-lg-1 text-right"><input type="radio" name="jawaban" <?php if($list_multiple_choice[$i]->answer ==4) {echo "checked";}?>  value="4"></div>
                                                                    <div class="col-lg-11"><input type="text" class="form-control" value="<?php echo $list_multiple_choice[$i]->choice4?>" name="edittext[]"></div>
                                                                </div>
                                                                <?php } ?>
                                                            <?php } ?>
                                                            <?php if ($e==0) {?>
                                                            <div class="form-group">
                                                                <div class="row" style="margin-top: 5px;">
                                                                    <div class="col-lg-1 text-right"><input type="radio" name="jawaban" value="1"></div>
                                                                    <div class="col-lg-11"><input type="text" class="form-control" name="tanya1"></div>
                                                                </div>
                                                                <div class="row" style="margin-top: 5px;">
                                                                    <div class="col-lg-1 text-right"><input type="radio" name="jawaban" value="2"></div>
                                                                    <div class="col-lg-11"><input type="text" class="form-control" name="tanya2"></div>
                                                                </div>
                                                                <div class="row" style="margin-top: 5px;">
                                                                    <div class="col-lg-1 text-right"><input type="radio" name="jawaban" value="3"></div>
                                                                    <div class="col-lg-11"><input type="text" class="form-control" name="tanya3"></div>
                                                                </div>
                                                                <div class="row" style="margin-top: 5px;">
                                                                    <div class="col-lg-1 text-right"><input type="radio" name="jawaban" value="4"></div>
                                                                    <div class="col-lg-11"><input type="text" class="form-control" name="tanya4"></div>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        
                                                    </div>
                                                </div>
                                                <div class="row" id="forced<?php echo $p;?>" style="margin-left: 0;">
                                                <?php $e=0; $d=count($list_forced_choice); for($i=0; $i<$d; $i++) {  ?>
                                                <?php if($list_forced_choice[$i]->id_child == $id_child) { $e++;?>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Perintah</label>
                                                        <input type="text" class="form-control" name="perintah" placeholder="Masukkan perintah untuk menjawab pertanyaan dibawah" value="<?php echo $question?>">
                                                    </div>
                                                </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Pertanyaan 1</label>
                                                            <textarea style="height: 100px;" type="text" class="form-control" name="pertanyaan1" placeholder="Tuliskan pertanyaan pertama disini" value="<?php echo $list_forced_choice[$i]->pertanyaan1?>"><?php echo $list_forced_choice[$i]->pertanyaan1?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Kategori</label>
                                                            <select id="pilih_forced" class="form-control" name="kategori1">
                                                                    <option value="<?php echo $list_forced_choice[$i]->kategori1?>"><?php echo $list_forced_choice[$i]->kategori1?></option>
                                                                    <option value="Supportive">Supportive</option>
                                                                    <option value="Goal Oriented">Goal Oriented</option>
                                                                    <option value="Innovative">Innovative</option>
                                                                    <option value="Rules Oriented">Rules Oriented</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Pertanyaan 2</label>
                                                            <textarea style="height: 100px;" type="text" class="form-control" name="pertanyaan2" placeholder="Tuliskan pertanyaan kedua disini" value="<?php echo $list_forced_choice[$i]->pertanyaan2?>"><?php echo $list_forced_choice[$i]->pertanyaan1?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Kategori</label>
                                                            <select id="pilih_forced2" class="form-control"  name="kategori2">
                                                                    <option value="<?php echo $list_forced_choice[$i]->kategori2?>"><?php echo $list_forced_choice[$i]->kategori2?></option>
                                                                    <option value="Supportive">Supportive</option>
                                                                    <option value="Goal Oriented">Goal Oriented</option>
                                                                    <option value="Innovative">Innovative</option>
                                                                    <option value="Rules Oriented">Rules Oriented</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <?php } ?>
                                                <?php if ($e==0) {?>
                                                    <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Perintah</label>
                                                        <input type="text" class="form-control" name="perintah" placeholder="Masukkan perintah untuk menjawab pertanyaan dibawah">
                                                    </div>
                                                </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Pertanyaan 1</label>
                                                            <textarea style="height: 100px;" type="text" class="form-control" name="pertanyaan1" placeholder="Tuliskan pertanyaan pertama disini"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Kategori</label>
                                                            <select id="pilih_forced" class="form-control" name="kategori1">
                                                                    <option value="Supportive">Supportive</option>
                                                                    <option value="Goal Oriented">Goal Oriented</option>
                                                                    <option value="Innovative">Innovative</option>
                                                                    <option value="Rules Oriented">Rules Oriented</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Pertanyaan 2</label>
                                                            <textarea style="height: 100px;" type="text" class="form-control" name="pertanyaan2" placeholder="Tuliskan pertanyaan kedua disini"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Kategori</label>
                                                            <select id="pilih_forced2" class="form-control"  name="kategori2">
                                                                    <option value="Supportive">Supportive</option>
                                                                    <option value="Goal Oriented">Goal Oriented</option>
                                                                    <option value="Innovative">Innovative</option>
                                                                    <option value="Rules Oriented">Rules Oriented</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <?php } ?>
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
                                    <h4 class="modal-title" id="myModalLabel">Tambah Pertanyaan</h4>
                                  </div>
                                  <div class="modal-body">
                                    <!-- Isi Modal -->
                                    <div class="box-body">                                                            
                                        <?php echo form_open_multipart('admin/tambah_pertanyaan')?>
                                            <div class="row" style="margin-left: 0;">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>ID Form</label>
                                                        <select class="form-control" required="" name="id_form">
                                                            <?php $z=count($data_form); for ($i=0; $i < $z ; $i++) { ?>
                                                            <option value="<?php echo $data_form[$i]->id_form; ?>"><?php echo $data_form[$i]->id_form; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Construct</label>
                                                        <select class="form-control" required="" name="parent_id">
                                                            <?php foreach ($list_construct as $a) : ?>
                                                                <option value="<?php echo $a->id_parent?>"><?php echo $a->parent_name?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                    <div class="col-md-4">
                                                        <label>Insert Image (Max 2MB)</label>                
                                                        <input type="file" name="userfile" >
                                                    </div>
            
                                                <div class="col-md-12" id="question">
                                                    <div class="form-group">
                                                        <label>Pertanyaan</label>
                                                        <textarea style="height: 100px;" type="text" class="form-control " name="question" placeholder="Tuliskan pertanyaan disini"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tipe Jawaban</label>
                                                        <select id="pilihan" class="form-control" required="" name="type">
                                                                <option value="textarea">Textarea</option>
                                                                <option value="skala">Skala</option>
                                                                <option value="input">Input Text</option>
                                                                <option value="multiple choice">Multiple Choice</option>
                                                                <option value="forced choice">Forced Choice</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" >
                                                    <div id="jumla" style="display: none;">
                                                        <div class="col-md-6" >
                                                            <label>Nilai Maksimal Skala</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="jumlah" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" >
                                                            <div class="form-group">
                                                                <label>Kategori</label>
                                                                <select id="kategori" class="form-control" required="" name="kategori">
                                                                        <option value="">Pilih Kategori</option>
                                                                        <?php $s=count($list_kategori); for($y=0; $y < $s; $y++){ ?>
                                                                            <option value="<?php echo $list_kategori[$y]->id_kategori?>"><?php echo $list_kategori[$y]->nama_kategori ?></option>
                                                                        <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="multiple_choice" style="margin-left: 0;">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="row" style="margin-top: 5px;">
                                                                <div class="col-lg-1 text-right"><input type="radio" name="jawaban" value="1"></div>
                                                                <div class="col-lg-11"><input type="text" class="form-control" name="tanya1"></div>
                                                            </div>
                                                            <div class="row" style="margin-top: 5px;">
                                                                <div class="col-lg-1 text-right"><input type="radio" name="jawaban" value="2"></div>
                                                                <div class="col-lg-11"><input type="text" class="form-control" name="tanya2"></div>
                                                            </div>
                                                            <div class="row" style="margin-top: 5px;">
                                                                <div class="col-lg-1 text-right"><input type="radio" name="jawaban" value="3"></div>
                                                                <div class="col-lg-11"><input type="text" class="form-control" name="tanya3"></div>
                                                            </div>
                                                            <div class="row" style="margin-top: 5px;">
                                                                <div class="col-lg-1 text-right"><input type="radio" name="jawaban" value="4"></div>
                                                                <div class="col-lg-11"><input type="text" class="form-control" name="tanya4"></div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="row" id="forced_choice" style="margin-left: 0;">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Perintah</label>
                                                        <input type="text" class="form-control" name="perintah" placeholder="Masukkan perintah untuk menjawab pertanyaan dibawah">
                                                    </div>
                                                </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Pertanyaan 1</label>
                                                            <textarea style="height: 100px;" type="text" class="form-control" name="pertanyaan1" placeholder="Tuliskan pertanyaan pertama disini"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Kategori</label>
                                                            <select id="pilih_forced" class="form-control" name="kategori1">
                                                                    <option value="Supportive">Supportive</option>
                                                                    <option value="Goal Oriented">Goal Oriented</option>
                                                                    <option value="Innovative">Innovative</option>
                                                                    <option value="Rules Oriented">Rules Oriented</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Pertanyaan 2</label>
                                                            <textarea style="height: 100px;" type="text" class="form-control" name="pertanyaan2" placeholder="Tuliskan pertanyaan kedua disini"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Kategori</label>
                                                            <select id="pilih_forced2" class="form-control"  name="kategori2">
                                                                    <option value="Supportive">Supportive</option>
                                                                    <option value="Goal Oriented">Goal Oriented</option>
                                                                    <option value="Innovative">Innovative</option>
                                                                    <option value="Rules Oriented">Rules Oriented</option>
                                                            </select>
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

    <script type="text/javascript">
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            
            var x = 1; //initlal text box count
            <?php $jawab=0; ?>
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    <?php $jawab++; ?>
                    $(wrapper).append('<div class="col-lg-1 text-right" style="margin-top:5px;"><input type="radio" name="jawaban[]"></div><div class="col-lg-11"><input type="text" class="form-control" name="mytext[]"/><a href="#" class="remove_field"> Remove</a></div>'); //add input box
                }
            });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        }); 
    </script>
    <script type="text/javascript">
    <?php 
    for ($i=1;$i<=count($list_pertanyaan);$i++) {
    ?>
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap<?php echo $i?>"); //Fields wrapper
            var add_button      = $(".add_field_button<?php echo $i?>"); //Add button ID
            
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div style="margin-top:5px;"><input type="text" class="form-control" name="edittext[]"/><a href="#" class="remove_field<?php echo $i?>"> Remove</a></div>'); //add input box
                }
            });
            
            $(wrapper).on("click",".remove_field<?php echo $i?>", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        }); 
    <?php } ?>
    </script>
    

</body>

</html>
