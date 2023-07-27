<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('depan/v_header'); ?>

<body>
  <!--============================= HEADER =============================-->
  <section>

<div class="header-topbar">
    <div class="container">
        <div class="row">
            <marquee>
            <div class="col-xs-6 col-sm-8 col-md-9">
                <div class="header-top_address">
                    <div class="header-top_list">
                    <span></span>Selamat Datang di PPID, Pejabat Pengelola Informasi dan Dokumentasi
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
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block" src="<?php echo base_url().'theme/images/slider.jpg'?>" width=100% alt="First slide">
                    <div class="carousel-caption d-md-block"> 
                        <div class="slider_title">
                            <marquee behavior="slide" direction="up" height="50"><h1>P P I D</h1></marquee><br>
                            <br>
                            <marquee behavior="slide" direction="up" height="75"><h4><b>PEJABAT PENGELOLA INFORMASI DAN DOKUMENTASI</b></h4></marquee>          
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
           <h2>Informasi Publik</h2>
           <p>Salah satu kewajiban badan publik yang dinyatakan dalam Undang-Undang No 14 Tahun 2008 adalah menyediakan Daftar Informasi Publik (DIP). DIP adalah catatan yang berisi keterangan sistematis tentang informasi publik yang berada dibawah penguasaan badan publik. Melalui aplikasi PPID Pemerintah Kota Tanjungbalai yang digunakan ini, badan publik dapat mempublikasi informasi yang dikuasai yang selanjutnya tersusun sebagai DIP secara otomatis.</p>

        </div>
        
    </div>
</div>
</section>
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <h2>Permohonan Informasi</h2>
                </div>
                <div><?php echo $this->session->flashdata('msg');?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contact-form"> 
                        <div class="col-xs-12 col-sm-12 col-md-12 contact-option">
                            <div class="contact-option_rsp"> 
                                <form action="<?php echo site_url('contact/kirim_permohonan');?>" method="post" enctype="multipart/form-data">

                                  <div class="contact-details">
                                    <i class="" aria-hidden="true">Nama Pemohon / Badan Hukum</i>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nama / Badan Hukum.." name="nama" required="" oninvalid="this.setCustomValidity('Mohon Mengisi Nama atau Badan Hukum Anda !')">
                                    </div>  

                                    <div class="contact-details">
                                    <i class="" aria-hidden="true">Nomor Induk Kependudukan / Nomor Surat Badan Hukum dari Kemenkum HAM </i>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="NIK/NO SURAT KEMENKUMHAM.." name="niknokemenkumham" required="" oninvalid="this.setCustomValidity('NIK / No Surat Harus di isi!')">
                                    </div>
                                    
                                    <div class="contact-details">
                                    <i class="" aria-hidden="true">Email Anda </br>( Tindak Lanjut permohonan anda akan dikirim ke Email )</i>
                                    </div>
                                    <div class="form-group">
                                        <input type="email.." class="form-control" placeholder="Email" name="email" required="" oninvalid="this.setCustomValidity('Email Anda Harus di isi atau format salah, ( contoh : diskominfo@gmail.com)!')">
                                    </div>
                                    <!-- // end .form-group -->
                                   <div class="contact-details">
                                    <i class="" aria-hidden="true">No Telpon </i>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="No Telpon" name="nohp" required="" oninvalid="this.setCustomValidity('Mohon Mengisi Nomor Telpon Anda !')">
                                    </div>
                                    
                                    <div class="contact-details">
                                    <i class="" aria-hidden="true">Alamat Lengkap</i>
                                    </div>
                                   <textarea placeholder="Alamat Lengkap" class="form-control" name="alamat" required="" oninvalid="this.setCustomValidity('Alamat harus di isi')" rows="3"></textarea>
                                   <br>
                                    
                                    <div class="contact-details">
                                    <i class="" aria-hidden="true">File Surat Kuasa (Abaikan jika anda bukan mewakili pemohon informasi) <br>* Format File dalam bentuk ( pdf,jpg, jpeg, png, rar, atau Zip dengan max size file 10 MB )</i>
                                    </div>
                                    <div class="form-group">
                                    <input type="file" class="form-control" placeholder="Dokumen Surat Kuasa" name="file">
                                    </div> 

                                    <div class="contact-details">
                                    <i class="" aria-hidden="true">Keterangan Informasi yang dibutuhkan</i>
                                    </div>
                                   <textarea placeholder="Permohonan Informasi" class="form-control" name="mohoninformasi" required="" oninvalid="this.setCustomValidity('Permohonan Informasi harus di isi')" rows="5"></textarea>
                                   <br>

                                   <div class="contact-details">
                                    <i class="" aria-hidden="true">Tujuan penggunaan informasi</i>
                                    </div>
                                   <textarea placeholder="Maksud dan Tujuan Informasi yang dimohonkan" class="form-control" name="tujuaninformasi" required="" oninvalid="this.setCustomValidity('Tujuan Informasi harus di isi')" rows="5"></textarea>
                                   <br>

                                    <div class="contact-details"> 
                                    <?php
                                    $tgl  = date('Ymd');
                                    $wb=rand(000,999);
                                    
                                    $getidwb=$tgl.$wb;
                                    ?>
                                    <i class="" aria-hidden="true">#No Tiket/ID Permohonan Anda ( Simpan Kode dibawah ini, sebagai ID / Tiket Anda ) </i>
                                    </div>
                                    <div class="form-group">
                                    <input type="text" class="form-control" placeholder="IDPI.." name="idpi" value=" IDPI-<?php echo $getidwb;?>" readonly>
                                    </div> 
                                    <br>
                                    <button onclick="hideButton(this)"  type="submit" class="btn btn-default btn-submit">KIRIM LAPORAN</button>  
                                </form>
                            </div>
                        </div>  
                </div>
            </div> 
        </div> 
    </div>  
    <section class="contact" style="margin-bottom:50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <h2>Laporan Pelayanan Informasi</h2>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
            <table class="table table-striped" id="display">
                <thead>
                <tr>
                    <th style="text-align:left; width:100px;">Tanggal Proses</th> 
                    <th style="text-align:left; width:100px;">IDPI</th> 
                    <th>Tindak Lanjut</th> 
                </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    foreach ($data->result() as $row):
                ?>
                <tr>
                    <td><?php echo $row->tgl_terdaftar?></td>
                    <td><?php echo $row->idpi?></td>
                    
                    <?php if($row->status=='1'):?>
                    <td>Permohonan Informasi telah selesai, Informasi terkait akan segera dikirim ke email Anda.</td>
                    <?php elseif($row->status=='2'):?>
                    <td>Permohonan Informasi Anda di Tolak, karena permohonan anda tidak sesuai dengan unsur permohonan informasi. Silahkan melakukan permohonan baru kembali. Terimakasih</td>
                    <?php else :?> 
                    <td>Permohonan diterima dan sedang di proses.</td>

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
    <br>
    <!--//END  ABOUT IMAGE -->
    <!--============================= FOOTER =============================-->
    <footer>
        <div class="container">
            <div class="row"> 
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
            <!-- SlimScroll -->
            <script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
            <script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
            <script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'?>"></script>
            <script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
            <script>
            function hideButton(x)
            {
            x.style.display = 'none';
            }
            </script>

            <script>


              $(document).ready(function() {
                $('#display').DataTable();
                // "sSearch": " Cari Dengan IDWB Anda"
              });

              $('#datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
              });
              $('#datepicker2').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
              });
              $('.datepicker3').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
              });
              $('.datepicker4').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
              });
              $(".timepicker").timepicker({
                showInputs: true
              });
            </script>
        </body>

        </html>
