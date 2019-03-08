<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EVALUASI KIPI</title>

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
                        <a href="#" class="navbar-brand">KIPI</a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a aria-expanded="false" role="button" href="<?php echo base_url()?>layouts.html"> Back to main Layout page</a>
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
                            <li>
                                <a href="<?php echo base_url()?>login.html">
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
    var cakupanOri1F,cakupanOri2F,cakupanOri3F,cakupanOri0F,penderitaDifteriF,penderitaDifteriByTerimaADSF,penderitaDifteriByTerimaADSStatusImunF,penderitaDifteriByTerimaADSStatusImun1F,penderitaDifteriByumurF,penderitaDifteriByumurTerimaADSF,penderitaDifteriByUmurTidakRekomenADSF,penderitaDifteriByumurTerimaADSImunF,penderitaDifteriByumurTerimaADSImun1F = 0;
    var myChart1,myBar = null;
    $(document).ready(function() {

        initData();
/*
        $('#kecamatan').change(function(){
            $('#kabupaten').prop("disabled",false);
            $('#kecamatan').prop("disabled",false);
            $('#desa').prop("disabled",false);
        });

        $('#desa').change(function(){
            $('#kabupaten').prop("disabled",false);
            $('#kecamatan').prop("disabled",false);
            $('#desa').prop("disabled",false);
        });*/
        
        
    });

    function initData(){
        $('#kabupaten-cakupanori0').prop("disabled",true);
        $('#kabupaten-cakupanori1').prop("disabled",true);
        $('#kabupaten-cakupanori2').prop("disabled",true);
        $('#kabupaten-cakupanori3').prop("disabled",true);

        $('#kabupaten-penderitadifteri2018').prop("disabled",true);
        $('#kecamatan-penderitadifteri2018').prop("disabled",true);
        $('#desa-penderitadifteri2018').prop("disabled",true);  

        $('#kabupaten-penderitadifteribyterimaads2018').prop("disabled",true);
        $('#kecamatan-penderitadifteribyterimaads2018').prop("disabled",true);
        $('#desa-penderitadifteribyterimaads2018').prop("disabled",true);    

        $('#kabupaten-penderitadifteribyterimaadsstatusimun2018').prop("disabled",true);
        $('#kecamatan-penderitadifteribyterimaadsstatusimun2018').prop("disabled",true);
        $('#desa-penderitadifteribyterimaadsstatusimun2018').prop("disabled",true);   

        $('#kabupaten-penderitadifteribyterimaadsstatusimun12018').prop("disabled",true);
        $('#kecamatan-penderitadifteribyterimaadsstatusimun12018').prop("disabled",true);
        $('#desa-penderitadifteribyterimaadsstatusimun12018').prop("disabled",true);

        $('#kabupaten-penderitadifteribyumur2018').prop("disabled",true);
        $('#kecamatan-penderitadifteribyumur2018').prop("disabled",true);
        $('#desa-penderitadifteribyumur2018').prop("disabled",true);

        $('#kabupaten-penderitadifteribyumurterimaads2018').prop("disabled",true);
        $('#kecamatan-penderitadifteribyumurterimaads2018').prop("disabled",true);
        $('#desa-penderitadifteribyumurterimaads2018').prop("disabled",true);  

        $('#kabupaten-penderitadifteribyumurtidakrekomenads2018').prop("disabled",true);
        $('#kecamatan-penderitadifteribyumurtidakrekomenads2018').prop("disabled",true);
        $('#desa-penderitadifteribyumurtidakrekomenads2018').prop("disabled",true);

        $('#kabupaten-penderitadifteribyumurterimaadsstatusimun2018').prop("disabled",true);
        $('#kecamatan-penderitadifteribyumurterimaadsstatusimun2018').prop("disabled",true);
        $('#desa-penderitadifteribyumurterimaadsstatusimun2018').prop("disabled",true);

        $('#kabupaten-penderitadifteribyumurterimaadsstatusimun12018').prop("disabled",true);
        $('#kecamatan-penderitadifteribyumurterimaadsstatusimun12018').prop("disabled",true);
        $('#desa-penderitadifteribyumurterimaadsstatusimun12018').prop("disabled",true);    

        $('#prov-cakupanori0').change(function(e){
            if($(this).val() < 1){
                $('#kabupaten-cakupanori0').prop("disabled",true);
            } else {
                $('#kabupaten-cakupanori0').prop("disabled",false);
                get_kota("kabupaten-cakupanori0","prov-cakupanori0");    
            }
            cakupanOri(0);
        }); 

        $('#kabupaten-cakupanori0').change(function(){
            $('#kabupaten-cakupanori0').prop("disabled",false);
            cakupanOri(0);
        });

        $('#prov-cakupanori1').change(function(e){
            if($(this).val() < 1){
                $('#kabupaten-cakupanori1').prop("disabled",true);
            } else {
                $('#kabupaten-cakupanori1').prop("disabled",false);
                get_kota("kabupaten-cakupanori1","prov-cakupanori1");    
            }
            cakupanOri(1);
        }); 

        $('#kabupaten-cakupanori1').change(function(){
            $('#kabupaten-cakupanori1').prop("disabled",false);
            cakupanOri(1);
        });

        $('#prov-cakupanori2').change(function(e){
            if($(this).val() < 1){
                $('#kabupaten-cakupanori2').prop("disabled",true);
            } else {
                $('#kabupaten-cakupanori2').prop("disabled",false);
                get_kota("kabupaten-cakupanori2","prov-cakupanori2");    
            }
            cakupanOri(2);
        }); 

        $('#kabupaten-cakupanori2').change(function(){
            $('#kabupaten-cakupanori2').prop("disabled",false);
            cakupanOri(2);
        });

        $('#prov-cakupanori3').change(function(e){
            if($(this).val() < 1){
                $('#kabupaten-cakupanori3').prop("disabled",true);
            } else {
                $('#kabupaten-cakupanori3').prop("disabled",false);
                get_kota("kabupaten-cakupanori3","prov-cakupanori3");    
            }
            cakupanOri(3);
        }); 

        $('#kabupaten-cakupanori3').change(function(){
            $('#kabupaten-cakupanori3').prop("disabled",false);
            cakupanOri(3);
        });

        $('#prov-penderitadifteri2018').change(function(e){
            if($(this).val() < 1){
                $('#kabupaten-penderitadifteri2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteri2018').prop("disabled",false);
                get_kota("kabupaten-penderitadifteri2018","prov-penderitadifteri2018");    
            }
            $('#kecamatan-penderitadifteri2018').prop("disabled",true);
            $('#desa-penderitadifteri2018').prop("disabled",true);
            penderitaDifteri(2018);
        }); 

        $('#kabupaten-penderitadifteri2018').change(function(){
            if($(this).val() == '' || typeof(this)==='undefined'){
                $('#kabupaten-penderitadifteri2018').prop("disabled",false);
                $('#kecamatan-penderitadifteri2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteri2018').prop("disabled",false);
                $('#kecamatan-penderitadifteri2018').prop("disabled",false);
            }
            $('#desa-penderitadifteri2018').prop("disabled",true);
            penderitaDifteri(2018);
        });

        $('#kecamatan-penderitadifteri2018').change(function(){
            if($(this).val() == '' || typeof(this)==='undefined'){
                $('#kabupaten-penderitadifteri2018').prop("disabled",false);
                $('#kecamatan-penderitadifteri2018').prop("disabled",false);
                $('#desa-penderitadifteri2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteri2018').prop("disabled",false);
                $('#kecamatan-penderitadifteri2018').prop("disabled",false);
                $('#desa-penderitadifteri2018').prop("disabled",false);
            }
        });

        $('#desa-penderitadifteri2018').change(function(){
            $('#kabupaten-penderitadifteri2018').prop("disabled",false);
            $('#kecamatan-penderitadifteri2018').prop("disabled",false);
            $('#desa-penderitadifteri2018').prop("disabled",false);
        });

        $('#prov-penderitadifteribyterimaads2018').change(function(e){
            if($(this).val() < 1){
                $('#kabupaten-penderitadifteribyterimaads2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyterimaads2018').prop("disabled",false);
                get_kota("kabupaten-penderitadifteribyterimaads2018","prov-penderitadifteribyterimaads2018");    
            }
            $('#kecamatan-penderitadifteribyterimaads2018').prop("disabled",true);
            $('#desa-penderitadifteribyterimaads2018').prop("disabled",true);
            penderitadifteribyterimaads(2018);
        }); 

        $('#kabupaten-penderitadifteribyterimaads2018').change(function(){
            if($(this).val() == '' || typeof(this)==='undefined'){
                $('#kabupaten-penderitadifteribyterimaads2018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyterimaads2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyterimaads2018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyterimaads2018').prop("disabled",false);
            }
            $('#desa-penderitadifteribyterimaads2018').prop("disabled",true);
            penderitadifteribyterimaads(2018);
        });


        $('#prov-penderitadifteribyterimaadsstatusimun2018').change(function(e){
            if($(this).val() < 1){
                $('#kabupaten-penderitadifteribyterimaadsstatusimun2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyterimaadsstatusimun2018').prop("disabled",false);
                get_kota("kabupaten-penderitadifteribyterimaadsstatusimun2018","prov-penderitadifteribyterimaadsstatusimun2018");    
            }
            $('#kecamatan-penderitadifteribyterimaadsstatusimun2018').prop("disabled",true);
            $('#desa-penderitadifteribyterimaadsstatusimun2018').prop("disabled",true);
            penderitadifteribyterimaadsstatusimun2018(2018,1);
        }); 

        $('#kabupaten-penderitadifteribyterimaadsstatusimun2018').change(function(){
            if($(this).val() == '' || typeof(this)==='undefined'){
                $('#kabupaten-penderitadifteribyterimaadsstatusimun2018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyterimaadsstatusimun2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyterimaadsstatusimun2018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyterimaadsstatusimun2018').prop("disabled",false);
            }
            $('#desa-penderitadifteribyterimaadsstatusimun2018').prop("disabled",true);
            penderitadifteribyterimaadsstatusimun2018(2018,1);
        });

        $('#prov-penderitadifteribyterimaadsstatusimun12018').change(function(e){
            if($(this).val() < 1){
                $('#kabupaten-penderitadifteribyterimaadsstatusimun12018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyterimaadsstatusimun12018').prop("disabled",false);
                get_kota("kabupaten-penderitadifteribyterimaadsstatusimun12018","prov-penderitadifteribyterimaadsstatusimun12018");    
            }
            $('#kecamatan-penderitadifteribyterimaadsstatusimun12018').prop("disabled",true);
            $('#desa-penderitadifteribyterimaadsstatusimun12018').prop("disabled",true);
            penderitadifteribyterimaadsstatusimun2018(2018,0);
        }); 

        $('#kabupaten-penderitadifteribyterimaadsstatusimun12018').change(function(){
            if($(this).val() == '' || typeof(this)==='undefined'){
                $('#kabupaten-penderitadifteribyterimaadsstatusimun12018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyterimaadsstatusimun12018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyterimaadsstatusimun12018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyterimaadsstatusimun12018').prop("disabled",false);
            }
            $('#desa-penderitadifteribyterimaadsstatusimun12018').prop("disabled",true);
            penderitadifteribyterimaadsstatusimun2018(2018,0);
        });

         $('#prov-penderitadifteribyumur2018').change(function(e){
            if($(this).val() < 1){
                $('#kabupaten-penderitadifteribyumur2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyumur2018').prop("disabled",false);
                get_kota("kabupaten-penderitadifteribyumur2018","prov-penderitadifteribyumur2018");    
            }
            $('#kecamatan-penderitadifteribyumur2018').prop("disabled",true);
            $('#desa-penderitadifteribyumur2018').prop("disabled",true);
            penderitadifteribyumur2018(2018);
        }); 

        $('#kabupaten-penderitadifteribyumur2018').change(function(){
            if($(this).val() == '' || typeof(this)==='undefined'){
                $('#kabupaten-penderitadifteribyumur2018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyumur2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyumur2018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyumur2018').prop("disabled",false);
            }
            $('#desa-penderitadifteribyumur2018').prop("disabled",true);
            penderitadifteribyumur2018(2018);
        });

        $('#prov-penderitadifteribyumurterimaads2018').change(function(e){
            if($(this).val() < 1){
                $('#kabupaten-penderitadifteribyumurterimaads2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyumurterimaads2018').prop("disabled",false);
                get_kota("kabupaten-penderitadifteribyumurterimaads2018","prov-penderitadifteribyumurterimaads2018");    
            }
            $('#kecamatan-penderitadifteribyumurterimaads2018').prop("disabled",true);
            $('#desa-penderitadifteribyumurterimaads2018').prop("disabled",true);
            penderitadifteribyumur2018(2018,1);
        }); 

        $('#kabupaten-penderitadifteribyumurterimaads2018').change(function(){
            if($(this).val() == '' || typeof(this)==='undefined'){
                $('#kabupaten-penderitadifteribyumurterimaads2018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyumurterimaads2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyumurterimaads2018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyumurterimaads2018').prop("disabled",false);
            }
            $('#desa-penderitadifteribyumurterimaads2018').prop("disabled",true);
            penderitadifteribyumur2018(2018,1);
        });

        $('#prov-penderitadifteribyumurtidakrekomenads2018').change(function(e){
            if($(this).val() < 1){
                $('#kabupaten-penderitadifteribyumurtidakrekomenads2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyumurtidakrekomenads2018').prop("disabled",false);
                get_kota("kabupaten-penderitadifteribyumurtidakrekomenads2018","prov-penderitadifteribyumurtidakrekomenads2018");    
            }
            $('#kecamatan-penderitadifteribyumurtidakrekomenads2018').prop("disabled",true);
            $('#desa-penderitadifteribyumurtidakrekomenads2018').prop("disabled",true);
            penderitadifteribyumur2018(2018,"undefined",0);
        }); 

        $('#kabupaten-penderitadifteribyumurtidakrekomenads2018').change(function(){
            if($(this).val() == '' || typeof(this)==='undefined'){
                $('#kabupaten-penderitadifteribyumurtidakrekomenads2018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyumurtidakrekomenads2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyumurtidakrekomenads2018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyumurtidakrekomenads2018').prop("disabled",false);
            }
            $('#desa-penderitadifteribyumurtidakrekomenads2018').prop("disabled",true);
            penderitadifteribyumur2018(2018,"undefined",0);
        });

        $('#prov-penderitadifteribyumurterimaadsstatusimun2018').change(function(e){
            if($(this).val() < 1){
                $('#kabupaten-penderitadifteribyumurterimaadsstatusimun2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyumurterimaadsstatusimun2018').prop("disabled",false);
                get_kota("kabupaten-penderitadifteribyumurterimaadsstatusimun2018","prov-penderitadifteribyumurterimaadsstatusimun2018");    
            }
            $('#kecamatan-penderitadifteribyumurterimaadsstatusimun2018').prop("disabled",true);
            $('#desa-penderitadifteribyumurterimaadsstatusimun2018').prop("disabled",true);
            penderitadifteribyumur2018(2018,2);
        }); 

        $('#kabupaten-penderitadifteribyumurterimaadsstatusimun2018').change(function(){
            if($(this).val() == '' || typeof(this)==='undefined'){
                $('#kabupaten-penderitadifteribyumurterimaadsstatusimun2018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyumurterimaadsstatusimun2018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyumurterimaadsstatusimun2018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyumurterimaadsstatusimun2018').prop("disabled",false);
            }
            $('#desa-penderitadifteribyumurterimaadsstatusimun2018').prop("disabled",true);
            penderitadifteribyumur2018(2018,2);
        });

        $('#prov-penderitadifteribyumurterimaadsstatusimun12018').change(function(e){
            if($(this).val() < 1){
                $('#kabupaten-penderitadifteribyumurterimaadsstatusimun12018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyumurterimaadsstatusimun12018').prop("disabled",false);
                get_kota("kabupaten-penderitadifteribyumurterimaadsstatusimun12018","prov-penderitadifteribyumurterimaadsstatusimun12018");    
            }
            $('#kecamatan-penderitadifteribyumurterimaadsstatusimun12018').prop("disabled",true);
            $('#desa-penderitadifteribyumurterimaadsstatusimun12018').prop("disabled",true);
            penderitadifteribyumur2018(2018,3);
        }); 

        $('#kabupaten-penderitadifteribyumurterimaadsstatusimun12018').change(function(){
            if($(this).val() == '' || typeof(this)==='undefined'){
                $('#kabupaten-penderitadifteribyumurterimaadsstatusimun12018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyumurterimaadsstatusimun12018').prop("disabled",true);
            } else {
                $('#kabupaten-penderitadifteribyumurterimaadsstatusimun12018').prop("disabled",false);
                $('#kecamatan-penderitadifteribyumurterimaadsstatusimun12018').prop("disabled",false);
            }
            $('#desa-penderitadifteribyumurterimaadsstatusimun12018').prop("disabled",true);
            penderitadifteribyumur2018(2018,3);
        });

        
    }

    function get_kota(id,prov){
        var baseurl = "<?php echo base_url();?>";
        $.getJSON(baseurl+'index.php/evaluasi/get_kota', {
            'prov' : $("#"+prov).val(),
        },function(data){
            var template = "<option value='' selected disabled>--Pilih Kota/Kab--</option><option value=''>Pilih Semua</option>";
            if(data.status){
                $.each(data.data, function (index, value) {
                    template += "<option value='" + value.id_kota + "'>" + value.nama_kota + "</option>";
                })
            }
            $("#"+id).html(template);
        });
    }

    function cakupanOri(ori,prov,kota){
        $.getJSON('<?php echo base_url();?>index.php/evaluasi/get_cakupan_ori/'+ori, {
            'prov' : prov? prov : $("#prov-cakupanori"+ori+" option:selected").val(),
            'kota' : kota? kota : $("#kabupaten-cakupanori"+ori+" option:selected").val(),
        },function(data){
            var template = "";
            var arrValue = [];
            var arrLabel = [];
            if(data.status){
                $.each(data.data, function (index, value) {
                    value["nomor"] = new Object;
                    arrValue.push(value.cakupan);
                    arrLabel.push(value.kota);
                    value["nomor"] = (index+1);
                })
                setCakupanOri(ori,data.data);
                cakupanOriGrafik(ori,arrLabel,arrValue);
                if (ori==1) {
                    cakupanOri1F = 1;
                } else if (ori==2) {
                    cakupanOri2F = 1;
                } else if (ori==3){
                    cakupanOri3F = 1;   
                } else if (ori==0){
                    cakupanOri0F = 1;   
                }
            }
        });
    }

    function setCakupanOri(ori,data){
        if(ori == 1){
            var tabel1 = null;
            if(cakupanOri1F == 1){
                $('#tabel-cakupanori1').dataTable().fnClearTable();
                $('#tabel-cakupanori1').dataTable().fnAddData(data);
            }else{
                table1 = $('#tabel-cakupanori1').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "data": data,
                    "columns": [{
                        "title": "NO",
                        "data": "nomor"
                    }, {
                        "title": "Kota",
                        "data": "kota"
                    }, {
                        "title": "Proyeksi",
                        "data": "proyeksi"
                    }, {
                        "title": "Riil",
                        "data": "riil"
                    }, {
                        "title": "Cakupan",
                        "data": "cakupan"
                    }],
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                    {extend: 'excel', title: 'Jumlah Cakupan ORI I 2018'},

                    {extend: 'print',title: 'Jumlah Cakupan ORI I 2018',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    }
                }
                ]
            })
            }
        } else if (ori == 2){
            var tabel2 = null;
            if(cakupanOri2F == 1){
                $('#tabel-cakupanori2').dataTable().fnClearTable();
                $('#tabel-cakupanori2').dataTable().fnAddData(data);
            }else{
                table2 = $('#tabel-cakupanori2').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "data": data,
                    "columns": [{
                        "title": "NO",
                        "data": "nomor"
                    }, {
                        "title": "Kota",
                        "data": "kota"
                    }, {
                        "title": "Proyeksi",
                        "data": "proyeksi"
                    }, {
                        "title": "Riil",
                        "data": "riil"
                    }, {
                        "title": "Cakupan",
                        "data": "cakupan"
                    }],
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                    {extend: 'excel', title: 'Jumlah Cakupan ORI II 2018'},

                    {extend: 'print',title: 'Jumlah Cakupan ORI II 2018',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    }
                }
                ]
            })
            }
        } else if (ori == 3){
            var tabel3 = null;
            if(cakupanOri3F == 1){
                $('#tabel-cakupanori3').dataTable().fnClearTable();
                $('#tabel-cakupanori3').dataTable().fnAddData(data);
            }else{
                table3 = $('#tabel-cakupanori3').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "data": data,
                    "columns": [{
                        "title": "NO",
                        "data": "nomor"
                    }, {
                        "title": "Kota",
                        "data": "kota",
                        "class": "text-left"
                    }, {
                        "title": "Proyeksi",
                        "data": "proyeksi"
                    }, {
                        "title": "Riil",
                        "data": "riil"
                    }, {
                        "title": "Cakupan",
                        "data": "cakupan"
                    }],
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                    {extend: 'excel', title: 'Jumlah Cakupan ORI III 2018'},

                    {extend: 'print',title: 'Jumlah Cakupan ORI III 2018',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    }
                }
                ]
            })
            }
        } else if (ori == 0){
            var tabel0 = null;
            if(cakupanOri0F == 1){
                $('#tabel-cakupanori0').dataTable().fnClearTable();
                $('#tabel-cakupanori0').dataTable().fnAddData(data);
            }else{
                table3 = $('#tabel-cakupanori0').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "data": data,
                    "columns": [{
                        "title": "NO",
                        "data": "nomor"
                    }, {
                        "title": "Kota",
                        "data": "kota",
                        "class": "text-left"
                    }, {
                        "title": "Proyeksi",
                        "data": "proyeksi"
                    }, {
                        "title": "Riil",
                        "data": "riil"
                    }, {
                        "title": "Cakupan",
                        "data": "cakupan"
                    }],
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                    {extend: 'excel', title: 'Jumlah Cakupan Rutin 2018'},

                    {extend: 'print',title: 'Jumlah Cakupan Rutin 2018',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    }
                }
                ]
            })
            }
        }
    }

    function cakupanOriGrafik(ori,arrLabel,arrValue){
        if(ori == 1){
            if(cakupanOri1F == 1){
                myChart1.data.datasets[0].data = arrValue;
                myChart1.data.labels = arrLabel;

                myChart1.update();
            } else {
                var ctx1 = document.getElementById("chart-cakupanOri1").getContext('2d');
                myChart1 = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: arrLabel,
                        datasets: [{
                            label: 'Jumlah Cakupan',
                            data: arrValue,
                            backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                            ],
                            borderColor: [
                            'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)',
                            ],
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    maxRotation: 80
                                }
                            }]
                        }
                    }
                });
            }
        } else if (ori==2){
            if(cakupanOri2F == 1){
                myChart2.data.datasets[0].data = arrValue;
                myChart2.data.labels = arrLabel;

                myChart2.update();
            } else {
                var ctx2 = document.getElementById("chart-cakupanOri2").getContext('2d');
                myChart2 = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: arrLabel,
                        datasets: [{
                            label: 'Jumlah Cakupan',
                            data: arrValue,
                            backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                            ],
                            borderColor: [
                            'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)',
                            ],
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    maxRotation: 80
                                }
                            }]
                        }
                    }
                });
            }
        } else if (ori == 3){
            if(cakupanOri3F == 1){
                myChart3.data.datasets[0].data = arrValue;
                myChart3.data.labels = arrLabel;

                myChart3.update();
            } else {
                var ctx3 = document.getElementById("chart-cakupanOri3").getContext('2d');
                myChart3 = new Chart(ctx3, {
                    type: 'bar',
                    data: {
                        labels: arrLabel,
                        datasets: [{
                            label: 'Jumlah Cakupan',
                            data: arrValue,
                            backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                            ],
                            borderColor: [
                            'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)',

                            ],
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    maxRotation: 80
                                }
                            }]
                        }
                    }
                });
            }
        } else if (ori == 0){
            if(cakupanOri0F == 1){
                myChart0.data.datasets[0].data = arrValue;
                myChart0.data.labels = arrLabel;

                myChart0.update();
            } else {
                var ctx0 = document.getElementById("chart-cakupanOri0").getContext('2d');
                myChart0 = new Chart(ctx0, {
                    type: 'bar',
                    data: {
                        labels: arrLabel,
                        datasets: [{
                            label: 'Jumlah Cakupan',
                            data: arrValue,
                            backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                            ],
                            borderColor: [
                            'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)',

                            ],
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true,
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    maxRotation: 80
                                }
                            }]
                        }
                    }
                });
            }
        }
    }


    function penderitaDifteri(tahun,prov,kota,kec,desa){
        var prov = prov? prov : $("#prov-penderitadifteri2018 option:selected").val();
        var kota = kota? kota : $("#kabupaten-penderitadifteri2018 option:selected").val();
        $.getJSON('<?php echo base_url();?>index.php/evaluasi/get_penderita_difteri/'+tahun, {
            'prov' : prov,
            'kota' : kota,
        },function(data){
            var template = "";
            var arrValue = [];
            var arrLabel = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus','September','Oktober','Nopember','Desember'];
            if(data.status){
                $.each(data.grafik, function (index, value) {
                    value["nomor"] = new Object;
                    value["bulan"] = new Object;
                    value["prov"] = new Object;
                    value["kota"] = new Object;
                    arrValue.push(value.jumlah_penderita);
                    value["nomor"] = (index+1);
                    value["bulan"] = arrLabel[index];
                    value["prov"] = prov? $("#prov-penderitadifteri2018 option:selected").text() : '-';
                    value["kota"] = kota? $("#kabupaten-penderitadifteri2018 option:selected").text() : '-';
                })
                setpenderitaDifteri(data.data);
                penderitaDifteriGrafik(arrLabel,arrValue);
                penderitaDifteriF = 1;
            }
        });
    }

    function setpenderitaDifteri(data){
        var tabel1 = null;
        if(penderitaDifteriF == 1){
            $('#tabel-penderitadifteri2018').dataTable().fnClearTable();
            $('#tabel-penderitadifteri2018').dataTable().fnAddData(data);
        }else{
            table1 = $('#tabel-penderitadifteri2018').DataTable({
                "paging": false,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                "data": data,
                "columns": [{
                    "title": "Kota",
                    "data": "kota",
                    "class": "text-left"
                }, {
                    "title": "Januari",
                    "data": "januari"
                }, {
                    "title": "Februari",
                    "data": "februari"
                }, {
                    "title": "Maret",
                    "data": "maret"
                }, {
                    "title": "April",
                    "data": "april"
                }, {
                    "title": "Mei",
                    "data": "mei"
                }, {
                    "title": "Juni",
                    "data": "juni"
                }, {
                    "title": "Juli",
                    "data": "juli"
                }, {
                    "title": "Agustus",
                    "data": "agustus"
                }, {
                    "title": "September",
                    "data": "september"
                }, {
                    "title": "Oktober",
                    "data": "oktober"
                }, {
                    "title": "Nopember",
                    "data": "nopember"
                }, {
                    "title": "Desember",
                    "data": "desember"
                }],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                {extend: 'excel', title: 'Jumlah Terkena Penyakit Difteri 2018'},

                {extend: 'print',title: 'Jumlah Terkena Penyakit Difteri 2018',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
                }
            }
            ]
        })
        }
    }
    function penderitaDifteriGrafik(arrLabel,arrValue){
        if(penderitaDifteriF == 1) {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Penderita',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue
                }],

            };
            myBar.data.datasets[0].data = arrValue;
            //myBar.data=barChartData;
            myBar.update();
        } else {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Penderita',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue
                }],

            };
            var ctx = document.getElementById('chart-penderitadifteri2018').getContext('2d');
            myBar = new Chart(ctx, {
                type: 'line',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                maxRotation: 80
                            }
                        }]
                    }
                }
            });
        }
    }


    function penderitadifteribyterimaads(tahun,prov,kota,kec,desa){
        var prov = prov? prov : $("#prov-penderitadifteribyterimaads2018 option:selected").val();
        var kota = kota? kota : $("#kabupaten-penderitadifteribyterimaads2018 option:selected").val();
        $.getJSON('<?php echo base_url();?>index.php/evaluasi/get_penderita_difteri_by_terima_ads/'+tahun, {
            'prov' : prov,
            'kota' : kota,
        },function(data){
            var template = "";
            var arrValue1 = [];
            var arrValue2 = [];
            var arrLabel = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus','September','Oktober','Nopember','Desember'];
            if(data.status){
                var i = 0;
                $.each(data.data, function (index, value) {
                    if(i == 0){
                        $.each(value, function (index, val) {
                            arrValue1.push(val);
                        });
                    } else if (i==1){
                        $.each(value, function (index, val) {
                            arrValue2.push(val);
                        });
                    }
                    i++;
                });
                setpenderitaDifteriByTerimaADS(data.data);
                penderitaDifteriByTerimaADSGrafik(arrLabel,arrValue1,arrValue2);
                penderitaDifteriByTerimaADSF = 1;
            }
        });
    }

    function setpenderitaDifteriByTerimaADS(data){
        var tabel1 = null;
        if(penderitaDifteriByTerimaADSF == 1){
            $('#tabel-penderitadifteribyterimaads2018').dataTable().fnClearTable();
            $('#tabel-penderitadifteribyterimaads2018').dataTable().fnAddData(data);
        }else{
            table1 = $('#tabel-penderitadifteribyterimaads2018').DataTable({
                "paging": false,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                "data": data,
                "columns": [{
                    "title": "Penderita",
                    "data": "status",
                    "class": "text-left"
                }, {
                    "title": "Januari",
                    "data": "1"
                }, {
                    "title": "Februari",
                    "data": "2"
                }, {
                    "title": "Maret",
                    "data": "3"
                }, {
                    "title": "April",
                    "data": "4"
                }, {
                    "title": "Mei",
                    "data": "5"
                }, {
                    "title": "Juni",
                    "data": "6"
                }, {
                    "title": "Juli",
                    "data": "7"
                }, {
                    "title": "Agustus",
                    "data": "8"
                }, {
                    "title": "September",
                    "data": "9"
                }, {
                    "title": "Oktober",
                    "data": "10"
                }, {
                    "title": "Nopember",
                    "data": "11"
                }, {
                    "title": "Desember",
                    "data": "12"
                }],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                {extend: 'excel', title: 'Jumlah Terkena Penyakit Difteri 2018 Yang Terima ADS dan Tidak Terima ADS'},

                {extend: 'print',title: 'Jumlah Terkena Penyakit Difteri 2018 Yang Terima ADS dan Tidak Terima ADS',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
                }
            }
            ]
        })
        }
    }

    function penderitaDifteriByTerimaADSGrafik(arrLabel,arrValue1,arrValue2){
        if(penderitaDifteriByTerimaADSF == 1) {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Penderita Terima ADS',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Penderita Tidak Terima ADS',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }],

            };
            myBar.data.datasets[0].data = arrValue1;
            myBar.data.datasets[1].data = arrValue2;
            //myBar.data=barChartData;
            myBar.update();
        } else {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Penderita Terima ADS',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Penderita Tidak Terima ADS',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }],

            };
            var ctx = document.getElementById('chart-penderitadifteribyterimaads2018').getContext('2d');
            myBar = new Chart(ctx, {
                type: 'line',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                maxRotation: 80
                            }
                        }]
                    }
                }
            });
        }
    }

    function penderitadifteribyterimaadsstatusimun2018(tahun,status,prov,kota,kec,desa){
        if(status == 1){
            var prov = prov? prov : $("#prov-penderitadifteribyterimaadsstatusimun2018 option:selected").val();
            var kota = kota? kota : $("#kabupaten-penderitadifteribyterimaadsstatusimun2018 option:selected").val();
        } else {
            var prov = prov? prov : $("#prov-penderitadifteribyterimaadsstatusimun12018 option:selected").val();
            var kota = kota? kota : $("#kabupaten-penderitadifteribyterimaadsstatusimun12018 option:selected").val();
        }
        $.getJSON('<?php echo base_url();?>index.php/evaluasi/get_penderita_difteri_by_terima_ads_status_imun/'+tahun+'/'+status+'/', {
            'prov' : prov,
            'kota' : kota,
        },function(data){
            var template = "";
            var arrValue1 = [];
            var arrValue2 = [];
            var arrLabel = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus','September','Oktober','Nopember','Desember'];
            if(data.status){
                var i = 0;
                $.each(data.data, function (index, value) {
                    if(i == 0){
                        $.each(value, function (index, val) {
                            arrValue1.push(val);
                        });
                    } else if (i==1){
                        $.each(value, function (index, val) {
                            arrValue2.push(val);
                        });
                    }
                    i++;
                });
                setpenderitaDifteriByTerimaADSStatusImun(data.data,status);
                penderitaDifteriByTerimaADSStatusImunGrafik(arrLabel,arrValue1,arrValue2,status);
                if(status == 1){
                    penderitaDifteriByTerimaADSStatusImunF = 1;
                } else {
                    penderitaDifteriByTerimaADSStatusImun1F = 1;
                }
            }
        });
    }

    function setpenderitaDifteriByTerimaADSStatusImun(data,status){
        if(status==1){
            var tabel1 = null;
        if(penderitaDifteriByTerimaADSStatusImunF == 1){
            $('#tabel-penderitadifteribyterimaadsstatusimun2018').dataTable().fnClearTable();
            $('#tabel-penderitadifteribyterimaadsstatusimun2018').dataTable().fnAddData(data);
        }else{
            table1 = $('#tabel-penderitadifteribyterimaadsstatusimun2018').DataTable({
                "paging": false,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                "data": data,
                "columns": [{
                    "title": "Penderita",
                    "data": "status",
                    "class": "text-left"
                }, {
                    "title": "Januari",
                    "data": "1"
                }, {
                    "title": "Februari",
                    "data": "2"
                }, {
                    "title": "Maret",
                    "data": "3"
                }, {
                    "title": "April",
                    "data": "4"
                }, {
                    "title": "Mei",
                    "data": "5"
                }, {
                    "title": "Juni",
                    "data": "6"
                }, {
                    "title": "Juli",
                    "data": "7"
                }, {
                    "title": "Agustus",
                    "data": "8"
                }, {
                    "title": "September",
                    "data": "9"
                }, {
                    "title": "Oktober",
                    "data": "10"
                }, {
                    "title": "Nopember",
                    "data": "11"
                }, {
                    "title": "Desember",
                    "data": "12"
                }],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                {extend: 'excel', title: 'Jumlah Terkena Penyakit Difteri 2018 Yang Terima ADS Berdasarkan Status Imun'},

                {extend: 'print',title: 'Jumlah Terkena Penyakit Difteri 2018 Yang Terima ADS Berdasarkan Status Imun',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
                }
            }
            ]
        })
        }
        } else {
            var tabel1 = null;
        if(penderitaDifteriByTerimaADSStatusImun1F == 1){
            $('#tabel-penderitadifteribyterimaadsstatusimun12018').dataTable().fnClearTable();
            $('#tabel-penderitadifteribyterimaadsstatusimun12018').dataTable().fnAddData(data);
        }else{
            table1 = $('#tabel-penderitadifteribyterimaadsstatusimun12018').DataTable({
                "paging": false,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                "data": data,
                "columns": [{
                    "title": "Penderita",
                    "data": "status",
                    "class": "text-left"
                }, {
                    "title": "Januari",
                    "data": "1"
                }, {
                    "title": "Februari",
                    "data": "2"
                }, {
                    "title": "Maret",
                    "data": "3"
                }, {
                    "title": "April",
                    "data": "4"
                }, {
                    "title": "Mei",
                    "data": "5"
                }, {
                    "title": "Juni",
                    "data": "6"
                }, {
                    "title": "Juli",
                    "data": "7"
                }, {
                    "title": "Agustus",
                    "data": "8"
                }, {
                    "title": "September",
                    "data": "9"
                }, {
                    "title": "Oktober",
                    "data": "10"
                }, {
                    "title": "Nopember",
                    "data": "11"
                }, {
                    "title": "Desember",
                    "data": "12"
                }],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                {extend: 'excel', title: 'Jumlah Terkena Penyakit Difteri 2018 Yang Tidak Terima ADS Berdasarkan Status Imun'},

                {extend: 'print',title: 'Jumlah Terkena Penyakit Difteri 2018 Yang Tidak Terima ADS Berdasarkan Status Imun',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
                }
            }
            ]
        })
        }
        }
    }

    function penderitaDifteriByTerimaADSStatusImunGrafik(arrLabel,arrValue1,arrValue2,status){
        if (status==1) {
            if(penderitaDifteriByTerimaADSStatusImunF == 1) {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Penderita Terima ADS Pernah Imunisasi',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Penderita Terima ADS Tidak Pernah Imunisasi',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }],

            };
            myBar.data.datasets[0].data = arrValue1;
            myBar.data.datasets[1].data = arrValue2;
            //myBar.data=barChartData;
            myBar.update();
        } else {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Penderita Terima ADS Pernah Imunisasi',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Penderita Terima ADS Tidak Pernah Imunisasi',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }],

            };
            var ctx = document.getElementById('chart-penderitadifteribyterimaadsstatusimun2018').getContext('2d');
            myBar = new Chart(ctx, {
                type: 'line',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                maxRotation: 80
                            }
                        }]
                    }
                }
            });
        }
        } else {
            if(penderitaDifteriByTerimaADSStatusImun1F == 1) {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Penderita Tidak Terima ADS Pernah Imunisasi',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Penderita Tidak Terima ADS Tidak Pernah Imunisasi',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }],

            };
            myBar1.data.datasets[0].data = arrValue1;
            myBar1.data.datasets[1].data = arrValue2;
            //myBar.data=barChartData;
            myBar1.update();
        } else {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Penderita Tidak Terima ADS Pernah Imunisasi',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Penderita Tidak Terima ADS Tidak Pernah Imunisasi',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }],

            };
            var ctx = document.getElementById('chart-penderitadifteribyterimaadsstatusimun12018').getContext('2d');
            myBar1 = new Chart(ctx, {
                type: 'line',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                maxRotation: 80
                            }
                        }]
                    }
                }
            });
        }
        }
    }

    function penderitadifteribyumur2018(tahun,ads,rekom){
        if(ads == 1){
            var prov = prov? prov : $("#prov-penderitadifteribyumurterimaads2018 option:selected").val();
            var kota = kota? kota : $("#kabupaten-penderitadifteribyumurterimaads2018 option:selected").val();
            $.getJSON('<?php echo base_url();?>index.php/evaluasi/get_penderita_difteri_by_umur_terima_ads/'+tahun, {
                'prov' : prov,
                'kota' : kota,
            },function(data){
                var template = "";
                var arrValue1 = [];
                var arrValue2 = [];
                var arrLabel = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus','September','Oktober','Nopember','Desember'];
                if(data.status){
                    var i = 0;
                    $.each(data.data, function (index, value) {
                        if(i == 0){
                            $.each(value, function (index, val) {
                                arrValue1.push(val);
                            });
                        } else if (i==1){
                            $.each(value, function (index, val) {
                                arrValue2.push(val);
                            });
                        }
                        i++;
                    });
                    setpenderitaDifteriByUmur(data.data,11);
                    penderitaDifteriGrafikByUmur(arrLabel,arrValue1,arrValue2,11);
                    penderitaDifteriByumurTerimaADSF = 1;
                }
            });
        } else if (ads == 2){
            var prov = prov? prov : $("#prov-penderitadifteribyumurterimaadsstatusimun2018 option:selected").val();
            var kota = kota? kota : $("#kabupaten-penderitadifteribyumurterimaadsstatusimun2018 option:selected").val();
            $.getJSON('<?php echo base_url();?>index.php/evaluasi/get_penderita_difteri_by_umur_terima_ads_and_imun/'+tahun+'/1/', {
                'prov' : prov,
                'kota' : kota,
            },function(data){
                var template = "";
                var arrValue1 = [];
                var arrValue2 = [];
                var arrValue3 = [];
                var arrValue4 = [];
                var arrLabel = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus','September','Oktober','Nopember','Desember'];
                if(data.status){
                    var i = 0;
                    $.each(data.data, function (index, value) {
                        if(i == 0){
                            $.each(value, function (index, val) {
                                arrValue1.push(val);
                            });
                        } else if (i==1){
                            $.each(value, function (index, val) {
                                arrValue2.push(val);
                            });
                        } else if (i==2){
                            $.each(value, function (index, val) {
                                arrValue3.push(val);
                            });
                        } else if (i==3){
                            $.each(value, function (index, val) {
                                arrValue4.push(val);
                            });
                        }
                        i++;
                    });
                    setpenderitaDifteriByUmur(data.data,13);
                    penderitaDifteriGrafikByUmurImun(arrLabel,arrValue1,arrValue2,arrValue3,arrValue4,13);
                    penderitaDifteriByumurTerimaADSImunF = 1;
                }
            });
        } else if (ads == 3){
            var prov = prov? prov : $("#prov-penderitadifteribyumurterimaadsstatusimun12018 option:selected").val();
            var kota = kota? kota : $("#kabupaten-penderitadifteribyumurterimaadsstatusimun12018 option:selected").val();
            $.getJSON('<?php echo base_url();?>index.php/evaluasi/get_penderita_difteri_by_umur_terima_ads_and_imun/'+tahun+'/0/', {
                'prov' : prov,
                'kota' : kota,
            },function(data){
                var template = "";
                var arrValue1 = [];
                var arrValue2 = [];
                var arrValue3 = [];
                var arrValue4 = [];
                var arrLabel = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus','September','Oktober','Nopember','Desember'];
                if(data.status){
                    var i = 0;
                    $.each(data.data, function (index, value) {
                        if(i == 0){
                            $.each(value, function (index, val) {
                                arrValue1.push(val);
                            });
                        } else if (i==1){
                            $.each(value, function (index, val) {
                                arrValue2.push(val);
                            });
                        } else if (i==2){
                            $.each(value, function (index, val) {
                                arrValue3.push(val);
                            });
                        } else if (i==3){
                            $.each(value, function (index, val) {
                                arrValue4.push(val);
                            });
                        }
                        i++;
                    });
                    setpenderitaDifteriByUmur(data.data,14);
                    penderitaDifteriGrafikByUmurImun(arrLabel,arrValue1,arrValue2,arrValue3,arrValue4,14);
                    penderitaDifteriByumurTerimaADSImun1F = 1;
                }
            });
        }

        if(rekom == 0) {
            var prov = prov? prov : $("#prov-penderitadifteribyumurtidakrekomenads2018 option:selected").val();
            var kota = kota? kota : $("#kabupaten-penderitadifteribyumurtidakrekomenads2018 option:selected").val();
            $.getJSON('<?php echo base_url();?>index.php/evaluasi/get_penderita_difteri_by_umur_tidak_rekomen_ads/'+tahun, {
                'prov' : prov,
                'kota' : kota,
            },function(data){
                var template = "";
                var arrValue1 = [];
                var arrValue2 = [];
                var arrLabel = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus','September','Oktober','Nopember','Desember'];
                if(data.status){
                    var i = 0;
                    $.each(data.data, function (index, value) {
                        if(i == 0){
                            $.each(value, function (index, val) {
                                arrValue1.push(val);
                            });
                        } else if (i==1){
                            $.each(value, function (index, val) {
                                arrValue2.push(val);
                            });
                        }
                        i++;
                    });
                    setpenderitaDifteriByUmur(data.data,12);
                    penderitaDifteriGrafikByUmur(arrLabel,arrValue1,arrValue2,12);
                    penderitaDifteriByUmurTidakRekomenADSF = 1;
                }
            });
        }

        if(typeof(ads) == "undefined" && typeof(rekom) === "undefined"){
            var prov = prov? prov : $("#prov-penderitadifteribyumur2018 option:selected").val();
            var kota = kota? kota : $("#kabupaten-penderitadifteribyumur2018 option:selected").val();
            $.getJSON('<?php echo base_url();?>index.php/evaluasi/get_penderita_difteri_by_umur/'+tahun, {
                'prov' : prov,
                'kota' : kota,
            },function(data){
                var template = "";
                var arrValue1 = [];
                var arrValue2 = [];
                var arrLabel = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus','September','Oktober','Nopember','Desember'];
                if(data.status){
                    var i = 0;
                    $.each(data.data, function (index, value) {
                        if(i == 0){
                            $.each(value, function (index, val) {
                                arrValue1.push(val);
                            });
                        } else if (i==1){
                            $.each(value, function (index, val) {
                                arrValue2.push(val);
                            });
                        }
                        i++;
                    });
                    setpenderitaDifteriByUmur(data.data,10);
                    penderitaDifteriGrafikByUmur(arrLabel,arrValue1,arrValue2,10);
                    penderitaDifteriByumurF = 1;
                }
            });
        }
    }

    function setpenderitaDifteriByUmur(data,nomor){
        if(nomor==10){
            var table10 = null;
            if(penderitaDifteriByumurF == 1){
                $('#tabel-penderitadifteribyumur2018').dataTable().fnClearTable();
                $('#tabel-penderitadifteribyumur2018').dataTable().fnAddData(data);
            }else{
                table10 = $('#tabel-penderitadifteribyumur2018').DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true,
                    "data": data,
                    "columns": [{
                        "title": "Penderita",
                        "data": "status",
                        "class": "text-left"
                    }, {
                        "title": "Januari",
                        "data": "1"
                    }, {
                        "title": "Februari",
                        "data": "2"
                    }, {
                        "title": "Maret",
                        "data": "3"
                    }, {
                        "title": "April",
                        "data": "4"
                    }, {
                        "title": "Mei",
                        "data": "5"
                    }, {
                        "title": "Juni",
                        "data": "6"
                    }, {
                        "title": "Juli",
                        "data": "7"
                    }, {
                        "title": "Agustus",
                        "data": "8"
                    }, {
                        "title": "September",
                        "data": "9"
                    }, {
                        "title": "Oktober",
                        "data": "10"
                    }, {
                        "title": "Nopember",
                        "data": "11"
                    }, {
                        "title": "Desember",
                        "data": "12"
                    }],
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                    {extend: 'excel', title: 'Jumlah Terkena Penyakit Difteri 2018 Berdasarkan Kelompok Umur'},

                    {extend: 'print',title: 'Jumlah Terkena Penyakit Difteri 2018 Berdasarkan Kelompok Umur',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    }
                }
                ]
            })
            }

        } else if (nomor==11) {
            var table11 = null;
            if(penderitaDifteriByumurTerimaADSF == 1){
                $('#tabel-penderitadifteribyumurterimaads2018').dataTable().fnClearTable();
                $('#tabel-penderitadifteribyumurterimaads2018').dataTable().fnAddData(data);
            }else{
                table11 = $('#tabel-penderitadifteribyumurterimaads2018').DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true,
                    "data": data,
                    "columns": [{
                        "title": "Penderita",
                        "data": "status",
                        "class": "text-left"
                    }, {
                        "title": "Januari",
                        "data": "1"
                    }, {
                        "title": "Februari",
                        "data": "2"
                    }, {
                        "title": "Maret",
                        "data": "3"
                    }, {
                        "title": "April",
                        "data": "4"
                    }, {
                        "title": "Mei",
                        "data": "5"
                    }, {
                        "title": "Juni",
                        "data": "6"
                    }, {
                        "title": "Juli",
                        "data": "7"
                    }, {
                        "title": "Agustus",
                        "data": "8"
                    }, {
                        "title": "September",
                        "data": "9"
                    }, {
                        "title": "Oktober",
                        "data": "10"
                    }, {
                        "title": "Nopember",
                        "data": "11"
                    }, {
                        "title": "Desember",
                        "data": "12"
                    }],
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                    {extend: 'excel', title: 'Jumlah Terkena Penyakit Difteri 2018 Berdasarkan Kelompok Umur Yang Terima ADS'},

                    {extend: 'print',title: 'Jumlah Terkena Penyakit Difteri 2018 Berdasarkan Kelompok Umur Yang Terima ADS',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    }
                }
                ]
            })
            }
        } else if (nomor==12) {
            var table12 = null;
            if(penderitaDifteriByUmurTidakRekomenADSF == 1){
                $('#tabel-penderitadifteribyumurtidakrekomenads2018').dataTable().fnClearTable();
                $('#tabel-penderitadifteribyumurtidakrekomenads2018').dataTable().fnAddData(data);
            }else{
                table12 = $('#tabel-penderitadifteribyumurtidakrekomenads2018').DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true,
                    "data": data,
                    "columns": [{
                        "title": "Penderita",
                        "data": "status",
                        "class": "text-left"
                    }, {
                        "title": "Jumlah",
                        "data": "jumlah"
                    }],
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                    {extend: 'excel', title: 'Jumlah Terkena Penyakit Difteri 2018 Berdasarkan Kelompok Umur Yang Tidak Direkomendasikan Terima ADS'},

                    {extend: 'print',title: 'Jumlah Terkena Penyakit Difteri 2018 Berdasarkan Kelompok Umur Yang Tidak Direkomendasikan Terima ADS',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    }
                }
                ]
            })
            }
        } else if (nomor==13) {
            var table13 = null;
            if(penderitaDifteriByumurTerimaADSImunF == 1){
                $('#tabel-penderitadifteribyumurterimaadsstatusimun2018').dataTable().fnClearTable();
                $('#tabel-penderitadifteribyumurterimaadsstatusimun2018').dataTable().fnAddData(data);
            }else{
                table13 = $('#tabel-penderitadifteribyumurterimaadsstatusimun2018').DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true,
                    "data": data,
                    "columns": [{
                        "title": "Penderita",
                        "data": "status",
                        "class": "text-left"
                    }, {
                        "title": "Januari",
                        "data": "1"
                    }, {
                        "title": "Februari",
                        "data": "2"
                    }, {
                        "title": "Maret",
                        "data": "3"
                    }, {
                        "title": "April",
                        "data": "4"
                    }, {
                        "title": "Mei",
                        "data": "5"
                    }, {
                        "title": "Juni",
                        "data": "6"
                    }, {
                        "title": "Juli",
                        "data": "7"
                    }, {
                        "title": "Agustus",
                        "data": "8"
                    }, {
                        "title": "September",
                        "data": "9"
                    }, {
                        "title": "Oktober",
                        "data": "10"
                    }, {
                        "title": "Nopember",
                        "data": "11"
                    }, {
                        "title": "Desember",
                        "data": "12"
                    }],
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                    {extend: 'excel', title: 'Jumlah Terkena Penyakit Difteri 2018 Berdasarkan Kelompok Umur Yang Terima ADS Berdasarkan Status Imun'},

                    {extend: 'print',title: 'Jumlah Terkena Penyakit Difteri 2018 Berdasarkan Kelompok Umur Yang Terima ADS Berdasarkan Status Imun',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    }
                }
                ]
            })
            }
        } else if (nomor==14) {
            var table14 = null;
            if(penderitaDifteriByumurTerimaADSImun1F == 1){
                $('#tabel-penderitadifteribyumurterimaadsstatusimun12018').dataTable().fnClearTable();
                $('#tabel-penderitadifteribyumurterimaadsstatusimun12018').dataTable().fnAddData(data);
            }else{
                table14 = $('#tabel-penderitadifteribyumurterimaadsstatusimun12018').DataTable({
                    "paging": false,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true,
                    "data": data,
                    "columns": [{
                        "title": "Penderita",
                        "data": "status",
                        "class": "text-left"
                    }, {
                        "title": "Januari",
                        "data": "1"
                    }, {
                        "title": "Februari",
                        "data": "2"
                    }, {
                        "title": "Maret",
                        "data": "3"
                    }, {
                        "title": "April",
                        "data": "4"
                    }, {
                        "title": "Mei",
                        "data": "5"
                    }, {
                        "title": "Juni",
                        "data": "6"
                    }, {
                        "title": "Juli",
                        "data": "7"
                    }, {
                        "title": "Agustus",
                        "data": "8"
                    }, {
                        "title": "September",
                        "data": "9"
                    }, {
                        "title": "Oktober",
                        "data": "10"
                    }, {
                        "title": "Nopember",
                        "data": "11"
                    }, {
                        "title": "Desember",
                        "data": "12"
                    }],
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                    {extend: 'excel', title: 'Jumlah Terkena Penyakit Difteri 2018 Berdasarkan Kelompok Umur Yang Tidak Terima ADS Berdasarkan Status Imun'},

                    {extend: 'print',title: 'Jumlah Terkena Penyakit Difteri 2018 Berdasarkan Kelompok Umur Yang Tidak Terima ADS Berdasarkan Status Imun',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    }
                }
                ]
            })
            }
        }
        
    }

    function penderitaDifteriGrafikByUmur(arrLabel,arrValue1,arrValue2,nomor){
        if (nomor==10) {
            if(penderitaDifteriByumurF == 1) {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Penderita Dibawah 19 Tahun',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Penderita Diatas 19 Tahun',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }],

            };
            myBar10.data.datasets[0].data = arrValue1;
            myBar10.data.datasets[1].data = arrValue2;
            //myBar.data=barChartData;
            myBar10.update();
        } else {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Penderita Dibawah 19 Tahun',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Penderita Diatas 19 Tahun',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }],

            };
            var ctx = document.getElementById('chart-penderitadifteribyumur2018').getContext('2d');
            myBar10 = new Chart(ctx, {
                type: 'line',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                maxRotation: 80
                            }
                        }]
                    }
                }
            });
        }
        } else if(nomor==11){
            if(penderitaDifteriByumurTerimaADSF == 1) {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Penderita Dibawah 19 Tahun',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Penderita Diatas 19 Tahun',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }],

            };
            myBar11.data.datasets[0].data = arrValue1;
            myBar11.data.datasets[1].data = arrValue2;
            //myBar.data=barChartData;
            myBar11.update();
        } else {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Penderita Dibawah 19 Tahun',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Penderita Diatas 19 Tahun',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }],

            };
            var ctx = document.getElementById('chart-penderitadifteribyumurterimaads2018').getContext('2d');
            myBar11 = new Chart(ctx, {
                type: 'line',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                maxRotation: 80
                            }
                        }]
                    }
                }
            });
        }
        } else if(nomor==12){
            if(penderitaDifteriByUmurTidakRekomenADSF == 1) {
            var barChartData = {
                labels: [arrValue1[1],arrValue2[1]],
                datasets: [{
                    label: 'Penderita Tidak Direkomendasikan ADS',
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    borderColor: ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)'],
                    borderWidth: 1,
                    data: ["Penderita Dibawah 19 Tahun","Penderita Diatas 19 Tahun"]
                }],

            };
            myBar12.data.datasets[0].data = [arrValue1[0],arrValue2[0]];
            //myBar.data=barChartData;
            myBar12.update();
        } else {
            var barChartData = {
                labels: [arrValue1[1],arrValue2[1]],
                datasets: [{
                    label: 'Penderita Tidak Direkomendasikan ADS',
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    borderColor: ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)'],
                    borderWidth: 1,
                    data: [arrValue1[0],arrValue2[0]]
                }],

            };
            var ctx = document.getElementById('chart-penderitadifteribyumurtidakrekomenads2018').getContext('2d');
            myBar12 = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                maxRotation: 80
                            }
                        }]
                    }
                }
            });
        }
        }
    }

    function penderitaDifteriGrafikByUmurImun(arrLabel,arrValue1,arrValue2,arrValue3,arrValue4,nomor){
        if(nomor==13){
            if(penderitaDifteriByumurTerimaADSImunF == 1) {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Dibawah 19 Tahun Pernah Imunisasi',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Dibawah 19 Tahun Tidak Pernah Imunisasi',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }, {
                    label: 'Diatas 19 Tahun Pernah Imunisasi',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1,
                    data: arrValue3
                }, {
                    label: 'Diatas 19 Tahun Tidak Pernah Imunisasi',
                    backgroundColor: 'rgba(90, 172, 172, 0.2)',
                    borderColor: 'rgba(90, 172, 172, 1)',
                    borderWidth: 1,
                    data: arrValue4
                }],
            };
            myBar13.data.datasets[0].data = arrValue1;
            myBar13.data.datasets[1].data = arrValue2;
            myBar13.data.datasets[2].data = arrValue3;
            myBar13.data.datasets[3].data = arrValue3;
            myBar13.update();
        } else {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Dibawah 19 Tahun Pernah Imunisasi',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Diatas 19 Tahun Tidak Pernah Imunisasi',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }, {
                    label: 'Diatas 19 Tahun Pernah Imunisasi',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1,
                    data: arrValue3
                }, {
                    label: 'Diatas 19 Tahun Tidak Pernah Imunisasi',
                    backgroundColor: 'rgba(90, 172, 172, 0.2)',
                    borderColor: 'rgba(90, 172, 172, 1)',
                    borderWidth: 1,
                    data: arrValue4
                }],

            };
            var ctx = document.getElementById('chart-penderitadifteribyumurterimaadsstatusimun2018').getContext('2d');
            myBar13 = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                maxRotation: 80
                            }
                        }]
                    }
                }
            });
        }
        } else if(nomor==14){
            if(penderitaDifteriByumurTerimaADSImun1F == 1) {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Dibawah 19 Tahun Pernah Imunisasi',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Dibawah 19 Tahun Tidak Pernah Imunisasi',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }, {
                    label: 'Diatas 19 Tahun Pernah Imunisasi',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1,
                    data: arrValue3
                }, {
                    label: 'Diatas 19 Tahun Tidak Pernah Imunisasi',
                    backgroundColor: 'rgba(90, 172, 172, 0.2)',
                    borderColor: 'rgba(90, 172, 172, 1)',
                    borderWidth: 1,
                    data: arrValue4
                }],
            };
            myBar14.data.datasets[0].data = arrValue1;
            myBar14.data.datasets[1].data = arrValue2;
            myBar14.data.datasets[2].data = arrValue3;
            myBar14.data.datasets[3].data = arrValue3;
            myBar14.update();
        } else {
            var barChartData = {
                labels: arrLabel,
                datasets: [{
                    label: 'Dibawah 19 Tahun Pernah Imunisasi',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor:'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    data: arrValue1
                }, {
                    label: 'Diatas 19 Tahun Tidak Pernah Imunisasi',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: arrValue2
                }, {
                    label: 'Diatas 19 Tahun Pernah Imunisasi',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1,
                    data: arrValue3
                }, {
                    label: 'Diatas 19 Tahun Tidak Pernah Imunisasi',
                    backgroundColor: 'rgba(90, 172, 172, 0.2)',
                    borderColor: 'rgba(90, 172, 172, 1)',
                    borderWidth: 1,
                    data: arrValue4
                }],

            };
            var ctx = document.getElementById('chart-penderitadifteribyumurterimaadsstatusimun12018').getContext('2d');
            myBar14 = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                maxRotation: 80
                            }
                        }]
                    }
                }
            });
        }
        }
    }
</script>

</body>

</html>
