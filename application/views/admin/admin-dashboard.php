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
                        <div class="col-md-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Jumlah Cakupan Rutin 2018</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label>Provinsi</label><br>
                                            <select class="form-control" name="prov" id="prov-cakupanori0">              
                                                <option value='' selected disabled>--Pilih Provinsi--</option>
                                                <?php foreach ($provinsi as $prov) {?>
                                                 <?php echo "<option class='select-extra' value='".$prov->id_provinsi."'>".$prov->nama_provinsi."</option>";?>
                                             <?php } ?>      
                                         </select>
                                     </div>
                                     <div class="col-md-3">
                                        <label>Kab/Kota</label><br>
                                        <select class="form-control" name="bulan" id="kabupaten-cakupanori0" disabled>         
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tabs-container" id="tabs">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#tab-1-cakupanOri0"> Data</a></li>
                                                <li class=""><a data-toggle="tab" href="#tab-2-cakupanOri0">Grafik</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="tab-1-cakupanOri0" class="tab-pane active">
                                                    <div class="panel-body">
                                                        <div>
                                                            <div class="ibox-content">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped table-bordered table-hover " id="tabel-cakupanori0" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-center">NO</th>
                                                                                <th class="text-center">KABUPATEN/KOTA</th>
                                                                                <th class="text-center">PROYEKSI</th>
                                                                                <th class="text-center">RIIL</th>
                                                                                <th class="text-center">CAKUPAN</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="text-center" id="cakupanori0-content">
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="tab-2-cakupanOri0" class="tab-pane">
                                                    <div class="panel-body">
                                                        <div>
                                                            <canvas id="chart-cakupanOri0" height="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Jumlah Cakupan ORI 1 - 2018</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label>Provinsi</label><br>
                                        <select class="form-control" name="prov" id="prov-cakupanori1">              
                                            <option value='' selected disabled>--Pilih Provinsi--</option>
                                            <?php foreach ($provinsi as $prov) {?>
                                             <?php echo "<option class='select-extra' value='".$prov->id_provinsi."'>".$prov->nama_provinsi."</option>";?>
                                         <?php } ?>      
                                     </select>
                                 </div>
                                 <div class="col-md-3">
                                    <label>Kab/Kota</label><br>
                                    <select class="form-control" name="bulan" id="kabupaten-cakupanori1" disabled>         
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tabs-container" id="tabs">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#tab-1-cakupanOri1"> Data</a></li>
                                            <li class=""><a data-toggle="tab" href="#tab-2-cakupanOri1">Grafik</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1-cakupanOri1" class="tab-pane active">
                                                <div class="panel-body">
                                                    <div>
                                                        <div class="ibox-content">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-bordered table-hover text-center " id="tabel-cakupanori1" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-center">NO</th>
                                                                            <th class="text-center">KABUPATEN/KOTA</th>
                                                                            <th class="text-center">PROYEKSI</th>
                                                                            <th class="text-center">RIIL</th>
                                                                            <th class="text-center">CAKUPAN</th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tab-2-cakupanOri1" class="tab-pane">
                                                <div class="panel-body">
                                                    <div>
                                                        <canvas id="chart-cakupanOri1" height="100px"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Jumlah Cakupan ORI 2 - 2018</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label>Provinsi</label><br>
                                    <select class="form-control" name="prov" id="prov-cakupanori2">              
                                        <option value='' selected disabled>--Pilih Provinsi--</option>
                                        <?php foreach ($provinsi as $prov) {?>
                                         <?php echo "<option class='select-extra' value='".$prov->id_provinsi."'>".$prov->nama_provinsi."</option>";?>
                                     <?php } ?>      
                                 </select>
                             </div>
                             <div class="col-md-3">
                                <label>Kab/Kota</label><br>
                                <select class="form-control" name="bulan" id="kabupaten-cakupanori2" disabled>         
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tabs-container" id="tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#tab-1-cakupanOri2"> Data</a></li>
                                        <li class=""><a data-toggle="tab" href="#tab-2-cakupanOri2">Grafik</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-1-cakupanOri2" class="tab-pane active">
                                            <div class="panel-body">
                                                <div>
                                                    <div class="ibox-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover " id="tabel-cakupanori2" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">NO</th>
                                                                        <th class="text-center">KABUPATEN/KOTA</th>
                                                                        <th class="text-center">PROYEKSI</th>
                                                                        <th class="text-center">RIIL</th>
                                                                        <th class="text-center">CAKUPAN</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="text-center" id="cakupanori2-content">
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2-cakupanOri2" class="tab-pane">
                                            <div class="panel-body">
                                                <div>
                                                    <canvas id="chart-cakupanOri2" height="100px"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Jumlah Cakupan ORI 3 - 2018</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label>Provinsi</label><br>
                                <select class="form-control" name="prov" id="prov-cakupanori3">              
                                    <option value='' selected disabled>--Pilih Provinsi--</option>
                                    <?php foreach ($provinsi as $prov) {?>
                                     <?php echo "<option class='select-extra' value='".$prov->id_provinsi."'>".$prov->nama_provinsi."</option>";?>
                                 <?php } ?>      
                             </select>
                         </div>
                         <div class="col-md-3">
                            <label>Kab/Kota</label><br>
                            <select class="form-control" name="bulan" id="kabupaten-cakupanori3" disabled>         
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs-container" id="tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1-cakupanOri3"> Data</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2-cakupanOri3">Grafik</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1-cakupanOri3" class="tab-pane active">
                                        <div class="panel-body">
                                            <div>
                                                <div class="ibox-content">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover " id="tabel-cakupanori3" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">NO</th>
                                                                    <th class="text-center">KABUPATEN/KOTA</th>
                                                                    <th class="text-center">PROYEKSI</th>
                                                                    <th class="text-center">RIIL</th>
                                                                    <th class="text-center">CAKUPAN</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-center" id="cakupanori3-content">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-2-cakupanOri3" class="tab-pane">
                                        <div class="panel-body">
                                            <div>
                                                <canvas id="chart-cakupanOri3" height="100px"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Jumlah Penderita Difteri 2018</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Provinsi</label><br>
                            <select class="form-control" name="prov" id="prov-penderitadifteri2018">              
                                <option value='' selected disabled>--Pilih Provinsi--</option>
                                <?php foreach ($provinsi as $prov) {?>
                                 <?php echo "<option class='select-extra' value='".$prov->id_provinsi."'>".$prov->nama_provinsi."</option>";?>
                             <?php } ?>               
                         </select>
                     </div>
                     <div class="col-md-3">
                        <label>Kota/Kab</label><br>
                        <select class="form-control" name="kecamatan" id="kabupaten-penderitadifteri2018">
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs-container" id="tabs">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1-penderitadifteri2018"> Data</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2-penderitadifteri2018">Grafik</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1-penderitadifteri2018" class="tab-pane active">
                                    <div class="panel-body">
                                        <div>
                                            <div class="ibox-content">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover text-center" id="tabel-penderitadifteri2018" width="100%">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th class="text-center">KOTA</th>
                                                                <th class="text-center">JANUARI</th>
                                                                <th class="text-center">FEBRUARI</th>
                                                                <th class="text-center">MARET</th>
                                                                <th class="text-center">APRIL</th>
                                                                <th class="text-center">MEI</th>
                                                                <th class="text-center">JUNI</th>
                                                                <th class="text-center">JULI</th>
                                                                <th class="text-center">AGUSTUS</th>
                                                                <th class="text-center">SEPTEMBER</th>
                                                                <th class="text-center">OKTOBER</th>
                                                                <th class="text-center">NOPEMBER</th>
                                                                <th class="text-center">DESEMBER</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2-penderitadifteri2018" class="tab-pane">
                                    <div class="panel-body">
                                        <div>
                                            <canvas id="chart-penderitadifteri2018" height="100px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Jumlah Penderita Difteri 2018 Berdasarkan Terima ADS dan Tidak Terima ADS</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Provinsi</label><br>
                        <select class="form-control" name="prov" id="prov-penderitadifteribyterimaads2018">              
                            <option value='' selected disabled>--Pilih Provinsi--</option>
                            <?php foreach ($provinsi as $prov) {?>
                             <?php echo "<option class='select-extra' value='".$prov->id_provinsi."'>".$prov->nama_provinsi."</option>";?>
                         <?php } ?>               
                     </select>
                 </div>
                 <div class="col-md-3">
                    <label>Kota/Kab</label><br>
                    <select class="form-control" name="kecamatan" id="kabupaten-penderitadifteribyterimaads2018">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container" id="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1-penderitadifteribyterimaads2018"> Data</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2-penderitadifteribyterimaads2018">Grafik</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1-penderitadifteribyterimaads2018" class="tab-pane active">
                                <div class="panel-body">
                                    <div>
                                        <div class="ibox-content">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover text-center" id="tabel-penderitadifteribyterimaads2018" width="100%">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th class="text-center">PENDERITA</th>
                                                            <th class="text-center">JANUARI</th>
                                                            <th class="text-center">FEBRUARI</th>
                                                            <th class="text-center">MARET</th>
                                                            <th class="text-center">APRIL</th>
                                                            <th class="text-center">MEI</th>
                                                            <th class="text-center">JUNI</th>
                                                            <th class="text-center">JULI</th>
                                                            <th class="text-center">AGUSTUS</th>
                                                            <th class="text-center">SEPTEMBER</th>
                                                            <th class="text-center">OKTOBER</th>
                                                            <th class="text-center">NOPEMBER</th>
                                                            <th class="text-center">DESEMBER</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2-penderitadifteribyterimaads2018" class="tab-pane">
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart-penderitadifteribyterimaads2018" height="100px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Jumlah Penderita Difteri 2018 Yang Terima ADS Berdasarkan Status Imunisasi</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Provinsi</label><br>
                        <select class="form-control" name="prov" id="prov-penderitadifteribyterimaadsstatusimun2018">              
                            <option value='' selected disabled>--Pilih Provinsi--</option>
                            <?php foreach ($provinsi as $prov) {?>
                             <?php echo "<option class='select-extra' value='".$prov->id_provinsi."'>".$prov->nama_provinsi."</option>";?>
                         <?php } ?>               
                     </select>
                 </div>
                 <div class="col-md-3">
                    <label>Kota/Kab</label><br>
                    <select class="form-control" name="kecamatan" id="kabupaten-penderitadifteribyterimaadsstatusimun2018">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container" id="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1-penderitadifteribyterimaadsstatusimun2018"> Data</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2-penderitadifteribyterimaadsstatusimun2018">Grafik</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1-penderitadifteribyterimaadsstatusimun2018" class="tab-pane active">
                                <div class="panel-body">
                                    <div>
                                        <div class="ibox-content">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover text-center" id="tabel-penderitadifteribyterimaadsstatusimun2018" width="100%">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th class="text-center">PENDERITA</th>
                                                            <th class="text-center">JANUARI</th>
                                                            <th class="text-center">FEBRUARI</th>
                                                            <th class="text-center">MARET</th>
                                                            <th class="text-center">APRIL</th>
                                                            <th class="text-center">MEI</th>
                                                            <th class="text-center">JUNI</th>
                                                            <th class="text-center">JULI</th>
                                                            <th class="text-center">AGUSTUS</th>
                                                            <th class="text-center">SEPTEMBER</th>
                                                            <th class="text-center">OKTOBER</th>
                                                            <th class="text-center">NOPEMBER</th>
                                                            <th class="text-center">DESEMBER</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2-penderitadifteribyterimaadsstatusimun2018" class="tab-pane">
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart-penderitadifteribyterimaadsstatusimun2018" height="100px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Jumlah Penderita Difteri 2018 Yang Tidak Terima ADS Berdasarkan Status Imunisasi</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Provinsi</label><br>
                        <select class="form-control" name="prov" id="prov-penderitadifteribyterimaadsstatusimun12018">              
                            <option value='' selected disabled>--Pilih Provinsi--</option>
                            <?php foreach ($provinsi as $prov) {?>
                             <?php echo "<option class='select-extra' value='".$prov->id_provinsi."'>".$prov->nama_provinsi."</option>";?>
                         <?php } ?>               
                     </select>
                 </div>
                 <div class="col-md-3">
                    <label>Kota/Kab</label><br>
                    <select class="form-control" name="kecamatan" id="kabupaten-penderitadifteribyterimaadsstatusimun12018">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container" id="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1-penderitadifteribyterimaadsstatusimun12018"> Data</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2-penderitadifteribyterimaadsstatusimun12018">Grafik</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1-penderitadifteribyterimaadsstatusimun12018" class="tab-pane active">
                                <div class="panel-body">
                                    <div>
                                        <div class="ibox-content">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover text-center" id="tabel-penderitadifteribyterimaadsstatusimun12018" width="100%">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th class="text-center">PENDERITA</th>
                                                            <th class="text-center">JANUARI</th>
                                                            <th class="text-center">FEBRUARI</th>
                                                            <th class="text-center">MARET</th>
                                                            <th class="text-center">APRIL</th>
                                                            <th class="text-center">MEI</th>
                                                            <th class="text-center">JUNI</th>
                                                            <th class="text-center">JULI</th>
                                                            <th class="text-center">AGUSTUS</th>
                                                            <th class="text-center">SEPTEMBER</th>
                                                            <th class="text-center">OKTOBER</th>
                                                            <th class="text-center">NOPEMBER</th>
                                                            <th class="text-center">DESEMBER</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2-penderitadifteribyterimaadsstatusimun12018" class="tab-pane">
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart-penderitadifteribyterimaadsstatusimun12018" height="100px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Jumlah Penderita Difteri 2018 Berdasarkan Kelompok Umur</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Provinsi</label><br>
                        <select class="form-control" name="prov" id="prov-penderitadifteribyumur2018">              
                            <option value='' selected disabled>--Pilih Provinsi--</option>
                            <?php foreach ($provinsi as $prov) {?>
                             <?php echo "<option class='select-extra' value='".$prov->id_provinsi."'>".$prov->nama_provinsi."</option>";?>
                         <?php } ?>               
                     </select>
                 </div>
                 <div class="col-md-3">
                    <label>Kota/Kab</label><br>
                    <select class="form-control" name="kecamatan" id="kabupaten-penderitadifteribyumur2018">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container" id="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1-penderitadifteribyumur2018"> Data</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2-penderitadifteribyumur2018">Grafik</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1-penderitadifteribyumur2018" class="tab-pane active">
                                <div class="panel-body">
                                    <div>
                                        <div class="ibox-content">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover text-center" id="tabel-penderitadifteribyumur2018" width="100%">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th class="text-center">PENDERITA</th>
                                                            <th class="text-center">JANUARI</th>
                                                            <th class="text-center">FEBRUARI</th>
                                                            <th class="text-center">MARET</th>
                                                            <th class="text-center">APRIL</th>
                                                            <th class="text-center">MEI</th>
                                                            <th class="text-center">JUNI</th>
                                                            <th class="text-center">JULI</th>
                                                            <th class="text-center">AGUSTUS</th>
                                                            <th class="text-center">SEPTEMBER</th>
                                                            <th class="text-center">OKTOBER</th>
                                                            <th class="text-center">NOPEMBER</th>
                                                            <th class="text-center">DESEMBER</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2-penderitadifteribyumur2018" class="tab-pane">
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart-penderitadifteribyumur2018" height="100px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Jumlah Penderita Difteri 2018 Berdasarkan Kelompok Umur Yang Terima ADS</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Provinsi</label><br>
                        <select class="form-control" name="prov" id="prov-penderitadifteribyumurterimaads2018">              
                            <option value='' selected disabled>--Pilih Provinsi--</option>
                            <?php foreach ($provinsi as $prov) {?>
                             <?php echo "<option class='select-extra' value='".$prov->id_provinsi."'>".$prov->nama_provinsi."</option>";?>
                         <?php } ?>               
                     </select>
                 </div>
                 <div class="col-md-3">
                    <label>Kota/Kab</label><br>
                    <select class="form-control" name="kecamatan" id="kabupaten-penderitadifteribyumurterimaads2018">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container" id="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1-penderitadifteribyumurterimaads2018"> Data</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2-penderitadifteribyumurterimaads2018">Grafik</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1-penderitadifteribyumurterimaads2018" class="tab-pane active">
                                <div class="panel-body">
                                    <div>
                                        <div class="ibox-content">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover text-center" id="tabel-penderitadifteribyumurterimaads2018" width="100%">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th class="text-center">PENDERITA</th>
                                                            <th class="text-center">JANUARI</th>
                                                            <th class="text-center">FEBRUARI</th>
                                                            <th class="text-center">MARET</th>
                                                            <th class="text-center">APRIL</th>
                                                            <th class="text-center">MEI</th>
                                                            <th class="text-center">JUNI</th>
                                                            <th class="text-center">JULI</th>
                                                            <th class="text-center">AGUSTUS</th>
                                                            <th class="text-center">SEPTEMBER</th>
                                                            <th class="text-center">OKTOBER</th>
                                                            <th class="text-center">NOPEMBER</th>
                                                            <th class="text-center">DESEMBER</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2-penderitadifteribyumurterimaads2018" class="tab-pane">
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart-penderitadifteribyumurterimaads2018" height="100px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Jumlah Penderita Difteri 2018 Berdasarkan Kelompok Umur Yang Tidak Direkomendasikan Terima ADS</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Provinsi</label><br>
                        <select class="form-control" name="prov" id="prov-penderitadifteribyumurtidakrekomenads2018">              
                            <option value='' selected disabled>--Pilih Provinsi--</option>
                            <?php foreach ($provinsi as $prov) {?>
                             <?php echo "<option class='select-extra' value='".$prov->id_provinsi."'>".$prov->nama_provinsi."</option>";?>
                         <?php } ?>               
                     </select>
                 </div>
                 <div class="col-md-3">
                    <label>Kota/Kab</label><br>
                    <select class="form-control" name="kecamatan" id="kabupaten-penderitadifteribyumurtidakrekomenads2018">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container" id="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1-penderitadifteribyumurtidakrekomenads2018"> Data</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2-penderitadifteribyumurtidakrekomenads2018">Grafik</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1-penderitadifteribyumurtidakrekomenads2018" class="tab-pane active">
                                <div class="panel-body">
                                    <div>
                                        <div class="ibox-content">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover text-center" id="tabel-penderitadifteribyumurtidakrekomenads2018" width="100%">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th class="text-center">PENDERITA</th>
                                                            <th class="text-center">JUMLAH</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2-penderitadifteribyumurtidakrekomenads2018" class="tab-pane">
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart-penderitadifteribyumurtidakrekomenads2018" height="100px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Jumlah Penderita Difteri 2018 Berdasarkan Kelompok Umur Yang Terima ADS Berdasarkan Status Imunisasi </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Provinsi</label><br>
                        <select class="form-control" name="prov" id="prov-penderitadifteribyumurterimaadsstatusimun2018">              
                            <option value='' selected disabled>--Pilih Provinsi--</option>
                            <?php foreach ($provinsi as $prov) {?>
                             <?php echo "<option class='select-extra' value='".$prov->id_provinsi."'>".$prov->nama_provinsi."</option>";?>
                         <?php } ?>               
                     </select>
                 </div>
                 <div class="col-md-3">
                    <label>Kota/Kab</label><br>
                    <select class="form-control" name="kecamatan" id="kabupaten-penderitadifteribyumurterimaadsstatusimun2018">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container" id="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1-penderitadifteribyumurterimaadsstatusimun2018"> Data</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2-penderitadifteribyumurterimaadsstatusimun2018">Grafik</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1-penderitadifteribyumurterimaadsstatusimun2018" class="tab-pane active">
                                <div class="panel-body">
                                    <div>
                                        <div class="ibox-content">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover text-center" id="tabel-penderitadifteribyumurterimaadsstatusimun2018" width="100%">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th class="text-center">PENDERITA</th>
                                                            <th class="text-center">JANUARI</th>
                                                            <th class="text-center">FEBRUARI</th>
                                                            <th class="text-center">MARET</th>
                                                            <th class="text-center">APRIL</th>
                                                            <th class="text-center">MEI</th>
                                                            <th class="text-center">JUNI</th>
                                                            <th class="text-center">JULI</th>
                                                            <th class="text-center">AGUSTUS</th>
                                                            <th class="text-center">SEPTEMBER</th>
                                                            <th class="text-center">OKTOBER</th>
                                                            <th class="text-center">NOPEMBER</th>
                                                            <th class="text-center">DESEMBER</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2-penderitadifteribyumurterimaadsstatusimun2018" class="tab-pane">
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart-penderitadifteribyumurterimaadsstatusimun2018" height="100px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Jumlah Penderita Difteri 2018 Berdasarkan Kelompok Umur Yang Tidak Terima ADS Berdasarkan Status Imunisasi </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Provinsi</label><br>
                        <select class="form-control" name="prov" id="prov-penderitadifteribyumurterimaadsstatusimun12018">              
                            <option value='' selected disabled>--Pilih Provinsi--</option>
                            <?php foreach ($provinsi as $prov) {?>
                             <?php echo "<option class='select-extra' value='".$prov->id_provinsi."'>".$prov->nama_provinsi."</option>";?>
                         <?php } ?>               
                     </select>
                 </div>
                 <div class="col-md-3">
                    <label>Kota/Kab</label><br>
                    <select class="form-control" name="kecamatan" id="kabupaten-penderitadifteribyumurterimaadsstatusimun12018">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container" id="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1-penderitadifteribyumurterimaadsstatusimun12018"> Data</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2-penderitadifteribyumurterimaadsstatusimun12018">Grafik</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1-penderitadifteribyumurterimaadsstatusimun12018" class="tab-pane active">
                                <div class="panel-body">
                                    <div>
                                        <div class="ibox-content">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover text-center" id="tabel-penderitadifteribyumurterimaadsstatusimun12018" width="100%">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th class="text-center">PENDERITA</th>
                                                            <th class="text-center">JANUARI</th>
                                                            <th class="text-center">FEBRUARI</th>
                                                            <th class="text-center">MARET</th>
                                                            <th class="text-center">APRIL</th>
                                                            <th class="text-center">MEI</th>
                                                            <th class="text-center">JUNI</th>
                                                            <th class="text-center">JULI</th>
                                                            <th class="text-center">AGUSTUS</th>
                                                            <th class="text-center">SEPTEMBER</th>
                                                            <th class="text-center">OKTOBER</th>
                                                            <th class="text-center">NOPEMBER</th>
                                                            <th class="text-center">DESEMBER</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2-penderitadifteribyumurterimaadsstatusimun12018" class="tab-pane">
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart-penderitadifteribyumurterimaadsstatusimun12018" height="100px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
