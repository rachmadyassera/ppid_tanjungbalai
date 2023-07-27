<!--Counter Inbox-->
<?php
    $query=$this->db->query("SELECT * FROM tbl_lapor WHERE inbox_status='1' AND inbox_tindaklanjut='0'"); 
    $query3=$this->db->query("SELECT * FROM tbl_lapor WHERE inbox_status='1' AND inbox_tindaklanjut='1'");
    $jum_pesan_lidik=$query3->num_rows(); 
    $jum_pesan=$query->num_rows();
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Utama</li>
        <li class="active">
          <a href="<?php echo base_url().'admin/dashboard'?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        
        <li>
          <a href="<?php echo base_url().'admin/pengguna'?>">
            <i class="fa fa-users"></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        

        <li>
          <a href="<?php echo base_url().'admin/opd'?>">
            <i class="fa fa-building"></i> <span>Data OPD</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/dokumen'?>">
            <i class="fa fa-file"></i> <span>Dokumen Informasi Publik</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/inbox'?>">
          <i class="fa fa-inbox" aria-hidden="true"></i> <span>Permohonan Baru</span>
            <span class="pull-right-container"> 
            </span>
            </a>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/inbox/permohonan_informasi_disetujui'?>">
          <i class="fa fa-check-square-o" aria-hidden="true"></i><span>Permohonan Disetujui</span>
            <span class="pull-right-container"> 
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/inbox/permohonan_informasi_ditolak'?>">
            <i class="fa fa-minus-circle"></i> <span>Permohonan Ditolak</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green"><?php echo $jum_pesan;?></small> -->
            </span>
          </a>
        </li>

       
         <li>
          <a href="<?php echo base_url().'admin/login/logout'?>">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>