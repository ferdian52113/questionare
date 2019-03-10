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
    <link href="<?php echo base_url();?>css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">  

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
                        <form action="http://localhost:8080/questionare/admin/add_form" method="post" accept-charset="utf-8" enctype="multipart/form-data"> 
                            <form id="section1Form">
                                <div id="sectionContainer-1">
                                    <div class="ibox-content orange-bg sectionTitle" id="sectionTitle-1" >
                                        <h2>Bagian 1: Informasi Umum</h2>
                                    </div>
                                    <div class="ibox-content" id="questionContainer-1" >
                                        <div id="section1-question1 form-control">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>1. Nama Perusahaan Anda.<span style="color:red">*</span></label>
                                                    <input type="text" class="form-control" name="1" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <br></br>
                                        <div id="section1-question2 form-control">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>2. Jenis Kelamin<span style="color:red">*</span></label><br>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Laki-laki" name="2" required> Laki-Laki</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Perempuan" name="2" required> Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br></br>
                                        <div id="section1-question3 form-control">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>3. Jabatan/Posisi Anda dalam Perusahaan adalah<span style="color:red">*</span></label><br>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Staff" name="3" required> Staff</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Supervisor" name="3" required> Supervisor</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Manager" name="3" required> Manager</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Asisten Senior Manager" name="3" required> Asisten Senior Manager</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Senior Manage" name="3" required> Senior Manage</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="General Manager" name="3" required> General Manager</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Direktur" name="3" required> Direktur</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Vice President" name="3" required> Vice President</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="others" name="3" required> Yang lain: <input class="form" type="text" name="3"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br></br>
                                        <div id="section1-question4 form-control">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>4. Industri/Bidang Perusahaan Anda adalah<span style="color:red">*</span></label><br>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Asuransi" name="4" required> Asuransi</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Engineering & Consultant" name="4" required> Engineering & Consultant</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="FinTech" name="4" required> FinTech</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Food & Beverage" name="4" required> Food & Beverage</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Jasa" name="4" required> Jasa</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Lembaga Keuangan Non Bank" name="4" required> Lembaga Keuangan Non Bank</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Logistics" name="4" required> Logistics</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Maintenance & Overhaul" name="4" required> Maintenance & Overhaul</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Manufaktur" name="4" required> Manufaktur</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Pelayanan Jasa" name="4" required> Pelayanan Jasa</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Lembaga Keuangan Non Bank" name="4" required> Pembangkit Tenaga Listrik</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Pembiayaan" name="4" required> Pembiayaan</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Lembaga Pendidikan" name="4" required> Lembaga Pendidikan</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Perbankan" name="4" required> Perbankan</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Properti" name="4" required> Properti</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Sales & Distribution" name="4" required> Sales & Distribution</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Sekuritas" name="4" required> Sekuritas</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Telekomunikasi" name="4" required> Telekomunikasi</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Transportasi" name="4" required> Transportasi</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Yayasan NGO" name="4" required> Yayasan NGO</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="others" name="4" required> Yang lain: <input class="form" type="text" name="4"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br></br>
                                        <div id="section1-question5 form-control">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>5. No Induk Karyawan (Data ini hanya digunakan untuk mencocokkan antara kuesioner kualitatif dengan kuantitatif semata).<span style="color:red">*</span></label>
                                                    <input type="text" class="form-control" name="5" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <br></br>
                                        <div id="section1-question6 form-control">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>6. Apakah Anda memiliki pengalaman dalam mengembangkan aplikasi digital? <span style="color:red">*</span></label><br>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Ya" name="6" required> Ya</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Tidak" name="6" required> Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br></br>
                                        <div id="section1-question7 form-control">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>7. Jika Ya, hal apa yang sudah Anda lakukan dalam mengembangkan aplikasi digital? (Jika Tidak, silahkan tuliskan N/A)<span style="color:red">*</span></label>
                                                    <input type="text" class="form-control" name="7" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <br></br>
                                        <div id="section1-question8 form-control">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>8. Berapa lama Anda sudah mengembangkan aplikasi digital? <span style="color:red">*</span></label><br>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="Tidak Pernah" name="8" required/> Tidak Pernah</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="<1 tahun" name="8" required /> &lt; 1 tahun</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="1 - <3 tahun" name="8" required/> 1 - &lt; 3 tahun</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="3 - <5 tahun" name="8" required/> 3 - &lt; 5 tahun Senior Manager</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value="5 - <7 tahun" name="8" required/> 5 - &lt; 7 tahun</label>
                                                    </div>
                                                    <div class="i-checks">
                                                        <label><input type="radio" value=">7 tahun" name="8" required/> &gt;7 tahun</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <input type="button" class="btn btn-primary" id="btnSection1Next" name="Selanjutnya" value="Selanjutnya">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div id="sectionContainer-2" style="margin-bottom: 25px">
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
                            <div class="ibox-content" id="questionContainer-2" >
                                <div id="section2-question9 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>1. Pimpinan di perusahaan kami memiliki visi yang jelas mengenai rencana penggunaan teknologi digital di perusahaan kami di masa depan <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="9" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="9" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="9" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="9" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="9" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question10 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>2. Pimpinan di seluruh jenjang di perusahaan kami memiliki visi yang sama mengenai transformasi digital di perusahaan kami <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="10" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="10" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="10" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="10" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="10" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question11 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>3. Pimpinan di perusahaan kami memiliki visi untuk mencapai perubahan yang radikal/transformatif di perusahaan dengan menggunakan teknologi digital <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="11" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="11" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="11" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="11" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="11" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question12 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>4. Pimpinan di perusahaan kami memiliki visi untuk mengubah bisnis model perusahaan menjadi lebih agile/tangkas dengan menggunakan teknologi digital <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="12" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="12" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="12" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="12" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="12" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question13 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>5. Pimpinan di perusahaan kami memiliki visi mengubah proses operasional perusahaan dengan menggunakan teknologi digital untuk meningkatkan efisiensi dan performansi perusahaan <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="13" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="13" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="13" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="13" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="13" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question14 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>6. Pimpinan di perusahaan kami memiliki visi untuk mengubah bisnis model perusahaan menjadi lebih agile/tangkas dengan menggunakan teknologi digital <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="14" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="14" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="14" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="14" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="14" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question15 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>7. Pimpinan di perusahaan kami telah mengidentifikasi dengan jelas aset-aset strategis perusahaan yang dapat membantu terwujudnya transformasi digital di perusahaan kami (contoh: aset fisik seperti mesin produksi dan toko ritel, aset berbasis kompetensi seperti para ahli desain produk dan operasi bisnis yang efisien dan fleksibel, aset tidak berwujud/intangible seperti brand, reputasi dan kultur perusahaan, aset data seperti data penjualan, data produksi, data konsumen) <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="15" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="15" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="15" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="15" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="15" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question16 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>8. Pimpinan di perusahaan kami menyatakan dengan jelas maksud (gambaran umum apa yang harus diubah) dan goal (manfaat/outcome yang dapat diukur bagi perusahaan, pelanggan, atau karyawan) yang ingin dicapai mengenai rencana penggunaan teknologi digital di perusahaan kami  <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="16" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="16" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="16" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="16" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="16" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question17 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>9. Pimpinan di perusahaan kami senantiasa memperbaharui visi transformasi digital perusahaan kami untuk mengikuti perkembangan teknologi  <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="17" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="17" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="17" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="17" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="17" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question18 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>10. Pimpinan di perusahaan kami mampu mendeteksi bottlenecks atau halangan-halangan yang mengganggu terwujudnya transformasi digital di perusahaan kami  <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="18" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="18" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="18" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="18" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="18" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                      </div>
                      <div id="sectionContainer-3" style="margin-bottom: 25px">
                            <?php $i=10;?>
                            <div class="ibox-content orange-bg sectionTitle" id="sectionTitle-2" >
                                <h2>Bagian Tiga: Digital Engagement</h2>
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
                            <div class="ibox-content" id="questionContainer-2" >
                                <div id="section3-question19 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>1. Pimpinan di perusahaan kami memberikan kesempatan yang luas bagi para karyawan untuk memberikan opini mengenai transformasi digital di perusahaan <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="19" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="19" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="19" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="19" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="19" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question10 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>2. Pimpinan di perusahaan kami senantiasa menyampaikan inisiatif atau aktivitas digital yang sedang atau akan dijalankan perusahaan secara transparan kepada kami <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="20" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="20" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="20" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="20" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="20" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question11 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>3. Pimpinan di perusahaan kami secara aktif mendorong percakapan/diskusi terbuka untuk memfasilitasi dialog strategis dan menciptakan kesempatan bagi semua orang untuk mengambil peran dalam mencapai visi transformasi digital perusahaan <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="21" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="21" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="21" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="21" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="21" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question12 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>4. Pimpinan di perusahaan kami memiliki visi untuk mengubah bisnis model perusahaan menjadi lebih agile/tangkas dengan menggunakan teknologi digital <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="12" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="12" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="12" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="12" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="12" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question13 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>5. Pimpinan di perusahaan kami memiliki visi mengubah proses operasional perusahaan dengan menggunakan teknologi digital untuk meningkatkan efisiensi dan performansi perusahaan <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="13" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="13" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="13" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="13" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="13" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question14 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>6. Pimpinan di perusahaan kami memiliki visi untuk mengubah bisnis model perusahaan menjadi lebih agile/tangkas dengan menggunakan teknologi digital <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="14" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="14" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="14" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="14" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="14" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question15 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>7. Pimpinan di perusahaan kami telah mengidentifikasi dengan jelas aset-aset strategis perusahaan yang dapat membantu terwujudnya transformasi digital di perusahaan kami (contoh: aset fisik seperti mesin produksi dan toko ritel, aset berbasis kompetensi seperti para ahli desain produk dan operasi bisnis yang efisien dan fleksibel, aset tidak berwujud/intangible seperti brand, reputasi dan kultur perusahaan, aset data seperti data penjualan, data produksi, data konsumen) <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="15" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="15" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="15" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="15" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="15" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question16 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>8. Pimpinan di perusahaan kami menyatakan dengan jelas maksud (gambaran umum apa yang harus diubah) dan goal (manfaat/outcome yang dapat diukur bagi perusahaan, pelanggan, atau karyawan) yang ingin dicapai mengenai rencana penggunaan teknologi digital di perusahaan kami  <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="16" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="16" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="16" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="16" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="16" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question17 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>9. Pimpinan di perusahaan kami senantiasa memperbaharui visi transformasi digital perusahaan kami untuk mengikuti perkembangan teknologi  <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="17" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="17" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="17" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="17" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="17" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div id="section2-question18 form-control">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label>10. Pimpinan di perusahaan kami mampu mendeteksi bottlenecks atau halangan-halangan yang mengganggu terwujudnya transformasi digital di perusahaan kami  <span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <table width="100%">
                                                <thead class="">
                                                    <tr>
                                                        <th style="width:25%"></th>
                                                        <th style="width:10%;text-align: center;">1</th>
                                                        <th style="width:10%;text-align: center;">2</th>
                                                        <th style="width:10%;text-align: center;">3</th>
                                                        <th style="width:10%;text-align: center;">4</th>
                                                        <th style="width:10%;text-align: center;">5</th>
                                                        <th style="width:25%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <tr>
                                                  <td style="width:25%;text-align: right;">Sangat Tidak Setuju</td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="1" name="18" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="2" name="18" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="3" name="18" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="4" name="18" required/></td>
                                                  <td style="width:10%;text-align: center;"><input class="i-checks" type="radio" value="5" name="18" required/></td>
                                                  <td style="width:25%;text-align: left;">Setuju</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                      </div>
                    </form>
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

<script src="<?php echo base_url()?>js/plugins/dataTables/datatables.min.js"></script>

<!-- iCheck -->
<script src="<?php echo base_url()?>js/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        $(".skala").ionRangeSlider({
          type:'single',
          min: 1,
          max: 5,
      });
        $('.i-checks').show();

        $('#btnSection1Next').click(function() {
            $('#sectionContainer-2').show();
            $('#sectionContainer-1').hide();
        });

        $('#btnSection2Prev').click(function() {
            $('#sectionContainer-1').show();
            $('#sectionContainer-2').hide();
        });

        $("#section1Form").validate();
    });
</script>

</body>
</html>