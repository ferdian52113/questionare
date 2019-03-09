<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Creator</title>

    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/iCheck/custom.css" rel="stylesheet">

</head>

<body class="gray-bg top-navigation" style="display: table;
position: relative;
width: 100%;
height: 100%;
background: url(assets/home-b.jpg) no-repeat center center scroll;
-webkit-background-size: cover;
-moz-background-size: cover;
background-size: cover;
-o-background-size: cover;">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="wrapper wrapper-content">
            <div class="container">
                <?php echo $this->session->flashdata('msg'); ?>
                <div class="row">
                    <!-- Questionare-->
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="ibox float-e-margins">
                            <div id="formContainer">
                               <div class="ibox-title" id="formTitle" >
                                <h1>Kuesioner Kuantitatif Penelitian Digital Mastery</h1>
                            </div>
                            <div class="ibox-content" id="formDescription" style="text-align: justify;">
                                <h4>Penelitian ini bertujuan untuk mengetahui tingkat digital mastery pada level individu dan organisasi dan untuk mengetahui seberapa besar pengaruh Digital Propensity, Digital Attitude, Digital Innovativeness, Digital Literacy, Digital Efficacy dan Action Readiness individu pada kemampuan digital Perusahaan.<br><p></p>

                                    Bersama kuesioner ini, kami mohon kesediaan Bapak/Ibu untuk dapat berkontribusi melalui pengisian kuesioner secara lengkap. Adapun jika Bapak/Ibu memiliki pertanyaan lebih lanjut, silahkan hubungi kami di alamat email berikut:  <a href="mailto:reza@sbm-itb.ac.id">reza@sbm-itb.ac.id</a><br><br>
                                    Demikian kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih. <br><br>

                                    Salam,<br>
                                Tim Peneliti</h4>
                                <br><br>
                                <p style="color: red">* Wajib diisi.</p>
                            </div>  
                        </div>
                        <div id="sectionContainer-1">
                            <div class="ibox-content orange-bg sectionTitle" id="sectionTitle-1" >
                                <h2>Bagian 1: Informasi Umum</h2>
                            </div>
                            <div class="ibox-content" id="questionContainer-1" >
                                <div id="section1-question1 form-control">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label>1. Nama Perusahaan Anda.<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" name="1" required="">
                                        </div>
                                    </div>
                                </div>
                                <br></br>
                                <div id="section1-question2 form-control">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label>2. Jenis Kelamin<span style="color:red">*</span></label><br>
                                            <div class="i-checks">
                                                <label><input type="radio" value="Laki-laki" name="jenisKelamin"> Laki-Laki</label>
                                            </div>
                                            <div class="i-checks">
                                                <label><input type="radio" value="Perempuan" name="jenisKelamin"> Perempuan</label>
                                            </div>
                                            <div class="i-checks">
                                                <label><input type="radio" value="" name="jenisKelamin"> Yang lain: <input class="form" type="text" name="jenisKelamin"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br></br>
                                <div id="section1-question3 form-control">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label>3. Jabatan/Posisi Anda dalam Perusahaan adalah<span style="color:red">*</span></label><br>
                                            <div class="i-checks">
                                                <label><input type="radio" value="Laki-laki" name="jenisKelamin"> Laki-Laki</label>
                                            </div>
                                            <div class="i-checks">
                                                <label><input type="radio" value="Perempuan" name="jenisKelamin"> Perempuan</label>
                                            </div>
                                            <!-- <div class="i-checks">
                                                <label><input type="radio" value="" name="jenisKelamin"> Yang lain: <input class="form" type="text" name="jenisKelamin"></label>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="sectionContainer-2" style="display: none">
                        <div class="ibox-content orange-bg sectionTitle" id="sectionTitle-2" >
                            <h2>Bagian Dua: Digital Vision</h2>
                        </div>
                        <div class="ibox-content sectionDescription" id="sectionDescription-2" style="text-align: justify;">
                            <h5>Keterangan:<br>
                                1 = Sangat Tidak Setuju<br>
                                2 = Tidak Setuju<br>
                                3 = Tidak Tahu/Ragu-ragu<br>
                                4 = Setuju<br>
                                5 = Sangat Setuju<br>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('admin/admin_footer.php') ?>
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
        $('.i-checks').show();
    });
</script>

</body>
</html>