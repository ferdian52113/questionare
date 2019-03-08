<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Build Your Own Questionare</title>

    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">

</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg">
                <nav class="navbar navbar-static-top" role="navigation">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <i class="fa fa-reorder"></i>
                        </button>
                        <a href="#" class="navbar-brand">B</a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a aria-expanded="false" role="button" href="<?php echo base_url()?>admin">Homepage</a>
                            </li>
                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="">Menu item</a></li>
                                    <li><a href="">Menu item</a></li>
                                    <li><a href="">Menu item</a></li>
                                    <li><a href="">Menu item</a></li>
                                </ul>
                            </li>

                        </ul>
                        <ul class="nav navbar-top-links navbar-right">
                            <li><p>Hi, <strong><?php echo strtoupper($this->session->userdata('username'));?></strong></p></li>
                            <li>
                                <a href="<?php echo base_url()?>admin/logout">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="wrapper wrapper-content">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-12">
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

        </div>

    </div>
    <div class="footer">
        <div>
            <strong>Kejadian Ikutan Pasca Imunisasi</strong> &copy; 2017-2018
        </div>
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

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>

<!-- Morris -->
<script src="<?php echo base_url()?>js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="<?php echo base_url()?>js/plugins/morris/morris.js"></script>

<script src="js/plugins/dataTables/datatables.min.js"></script>



<script>
    $(document).ready(function() {

    });
</script>

</body>

</html>
