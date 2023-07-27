<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PPID |  Pemerintah Kota Tanjungbalai</title>

     <meta name="description" content=" Selamat Datang di Sistem Komunikasi Pelaporan ter Integrasi Tanjungbalai, Kerahasiaan Identitas Pelapor akan dijamin Oleh Pemerintah Kota Tanjungbalai, Sikomplit System ini disediakan oleh Pemerintah Kota Tanjungbalai bagi anda yang memiliki informasi dan ingin melaporkan suatu pelayanan publik yang terjadi di lingkungan Pemerintah Kota Tanjungbalai" />
    <meta name="keywords" content="Sikomplit, Pelanggaran ASN, Diskominfo Kota Tanjungbalai, Pemerintah Kota Tanjungbalai, Rachmad Yasser Al Zuhri" />
    <meta name="author" content="Dinas Kominfo | Bidang TI - Rachmad Yasser Al Zuhri | rachmad.yasser@gmail.com | 081279329132 " />

    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/bootstrap.min.css'?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/font-awesome.min.css'?>">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/simple-line-icons.css'?>">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/owl.carousel.min.css'?>">
    <!-- Main CSS -->
    <link href="<?php echo base_url().'theme/css/style.css'?>" rel="stylesheet">

    <link href="<?php echo base_url().'theme/css/dataTables.bootstrap4.min.css'?>" rel="stylesheet">
</head>

<body>
  <!--============================= HEADER =============================-->
  
  <div data-toggle="affix" style="border-bottom:solid 1px #f2f2f2;">
      <div class="container nav-menu2">
          <div class="row">
              <div class="col-md-12">
                  <nav class="navbar navbar2 navbar-toggleable-md navbar-light bg-faded">
                      <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                          <span class="icon-menu"></span>
                      </button>
                      <a href="<?php echo site_url('');?>" class="navbar-brand nav-brand2"><img class="img img-responsive" width="200px;" src="<?php echo base_url().'theme/images/logo-dark.png'?>"></a>
                </nav>
              </div>
            </div>
          </div>
        </div>


<section>

<div class="header-topbar">
      <div class="container">
          <div class="row">
              <marquee>
              <div class="col-xs-6 col-sm-8 col-md-9">
                  <div class="header-top_address">
                      <div class="header-top_list">
                      <span></span>Selamat Datang di Sikomplit, Sistem Komunikasi Pelaporan Terintegrasi yang menjamin kerahasiaan identitas pelapor
                      </div>
                      <div class="header-top_list">
                          <span class="icon-envelope-open"></span>diskominfo@tanjungbalaikota.go.id
                      </div>
                      <div class="header-top_list">
                          <span class="icon-location-pin"></span>Tanjungbalai, Sumatera Utara. 21367
                      </div>
                  </div>
                  
              </div>
              </marquee>
          </div>
      </div>
  </div>
    <div class="slider_img layout_two">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <!-- <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol> -->
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block" src="<?php echo base_url().'theme/images/slider.jpg'?>" width=100% alt="First slide">
                    <div class="carousel-caption d-md-block">
                      
                        <div class="slider_title">
                            <marquee behavior="slide" direction="up" height="50"><h1>S I K O M P L I T</h1></marquee><br>
                            <br>
                            <marquee behavior="slide" direction="up" height="75"><h4><b>SISTEM KOMUNIKASI DAN PELAPORAN TERINTEGRASI</b></h4></marquee>          
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</section>

<!--============================= ABOUT =============================-->
<section class="clearfix about about-style2">

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo base_url().'theme/images/peluit-2.jpg'?>" class="img-fluid about-img" alt="#">
              </br>
            </div>
          </br>
            <div class="col-md-8">
               <h2>Sikomplit</h2>
               <p>Sikomplit adalah sistem komunikasi pelaporan terintegrasi yang bertujuan sebagai wadah masyarakat menyampaikan aspirasi dan keluhan terkait Administrasi Kependudukan, Sosial, Kesehatan Masyarakat, transportasi jalan, pendidikan, keamanan dan ketertiban, serta layanan komunikasi dan informasi</p>

            </div>
            
        </div>
    </div>
</section>
<!--//END ABOUT -->
<!--//END HEADER -->
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <h2>Silahkan lengkapi data sebelum membuat laporan !</h2>
                </div>
                <div><?php echo $this->session->flashdata('msg');?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contact-form">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 contact-option">
                            <div class="contact-option_rsp">
                                <h3><i class="fa fa-comments" aria-hidden="true"></i> Isi Data Anda! (Sesuai KTP)</h3>
                                <form action="<?php echo site_url('contact/valid_nik');?>" method="post" enctype="multipart/form-data">

                                  <div class="contact-details">
                                    <i class="" aria-hidden="true">Nomor Induk Kependudukan (NIK)</i>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nik Anda.." name="nik" required="" oninvalid="this.setCustomValidity('Mohon Mengisi NIK Anda !')">
                                    </div>

                                    
                                    <!-- // end .form-group -->

                                    <button type="submit" class="btn btn-default btn-submit">Check Nik</button>
                                     </br>
                                      <div class="contact-details">
                                      </br>
                                      
                                      </div>
                                    <!-- // end #js-contact-result -->
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="contact-address">
                                <h3> <i class="fa fa-check" aria-hidden="true"></i> Ketentuan Pengaduan </h3>
                                </br>
                                <div class="contact-details">
                                    <h4><i class="fa fa-question-circle" aria-hidden="true"></i>
                                    &nbsp;&nbsp;Nomor Induk Kependudukan (NIK)</h4>
                                    <p>Pelapor Wajib memiliki Nomor Induk Kependudukan, yang telah terdaftar pada Dinas Kependudukan dan Catatan Sipil Kota Tanjungbalai</p>
                                    </div>
                                    <br>
                                    
                                    <h3><i class="fa fa-lock" aria-hidden="true"> </i>&nbsp Kerahasiaan Dijamin </h3>
                                    <div class="contact-details" style="text-align:justify;">
                                    <p>Untuk anda yang ingin melaporkan tapi merasa sungkan atau takut identitasnya anda terungkap, anda bisa menggunakan fasilitas ini. Anda bisa melaporkan melalui Sikomplit, kerahasiaan identitas anda akan dijamin oleh Pemerintah Kota Tanjungbalai</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </br>
           

        </div>
        </br>
    </section>

    <section class="contact" style="margin-bottom:50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <h2>Pencarian Hasil Laporan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-striped" id="display">
                  <thead>
                    <tr>
                      <th style="text-align:left; width:100px;">IDSK</th>
                      
                      <th>Tindak Lanjut</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no=1;
                      foreach ($data->result() as $row):
                    ?>
                    <tr>
                      <td><?php echo $row->inbox_idwb?></td>
                      
                      <?php if($row->inbox_tindaklanjut=='0'):?>
                      <td>Laporan diterima dan sedang di proses.</td>
                      <?php elseif($row->inbox_tindaklanjut=='1'):?>
                      <td>Penyelidikan Selesai, Hasil Laporan Akan Segera dikirim ke email Anda.</td>
                      <?php elseif($row->inbox_tindaklanjut=='2'):?>
                      <td>Laporan Anda di Tolak, karena laporan anda tidak sesuai dengan unsur pengaduan. Silahkan melakukan pengaduan baru kembali. Terimakasih</td>
                      <?php endif;?>
                      
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div> 
        </div>
       
    </section>
  
    <!--//END  ABOUT IMAGE -->
    <!--============================= FOOTER =============================-->
    <footer>
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-3">
                    <div class="foot-logo">
                        <a href="<?php echo site_url();?>">
                            <img src="<?php echo base_url().'theme/images/logo-dark.png'?>" class="img-fluid" alt="footer_logo">
                        </a>
                        <p><?php echo date('Y');?> © copyright by <a href="http://diskominfo.tanjungbalaikota.go.id" target="_blank">Diskominfo Kota Tanjungbalai - Sumatera Utara</a>. <br>All rights reserved.</p>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-3">
                        <div class="address">
                            <h3>Support By</h3>
                            
                            <p><a href="http://diskominfo.tanjungbalaikota.go.id" target="_blank"> Dinas Komunikasi dan Informatika Kota Tanjungbalai</a>
                              </p>
                            </div>
                        </div> -->
                        <div class="col-md-3">
                        <div class="address">
                            <h3>Portal Resmi</h3>
                            <li><a href="http://diskominfo.tanjungbalaikota.go.id" target="_blank"> Diskominfo Kota Tanjungbalai</a></li>
                            <li><a href="http://tanjungbalaikota.go.id/web" target="_blank"> Pemerintah Kota Tanjungbalai</a></li>
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="address">
                            <h3>Hubungi Kami</h3>
                            <p><span>Alamat: </span> Jl. Jend. Sudirman, Km. 5.5 , Kel. Sijambi , Kec. Datuk Bandar, Kota Tanjungbalai</p>
                            <p>Email : diskominfo@tanjungbalaikota.go.id
                                <br> </p>
                           
                            </div>
                        </div>
                    </div>
                    <div class="container">
                    <hr>
                    <div class="address">
                        <center>                                
                            <p> Support By <a href="http://diskominfo.tanjungbalaikota.go.id" target="_blank"> Dinas Komunikasi dan Informatika Kota Tanjungbalai</a>
                              </p>
                            </div>
                        </center>
                    </div>
                </div>
            </footer>
            <!--//END FOOTER -->

            <!-- jQuery, Bootstrap JS. -->
            <script src="<?php echo base_url().'theme/js/jquery.min.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/tether.min.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/bootstrap.min.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/owl.carousel.min.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/validate.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/tweetie.min.js'?>"></script>
            <!-- Subscribe / Contact-->
            <script src="<?php echo base_url().'theme/js/subscribe.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/contact.js'?>"></script>
            <!-- Script JS -->
            <script src="<?php echo base_url().'theme/js/script.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/jquery.dataTables.min.js'?>"></script>
            <script src="<?php echo base_url().'theme/js/dataTables.bootstrap4.min.js'?>"></script>
            <script>
              $(document).ready(function() {
                $('#display').DataTable();
                // "sSearch": " Cari Dengan IDWB Anda"
              });
            </script>
        </body>

        </html>
