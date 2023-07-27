
<!DOCTYPE html>
<html>
<?php $this->load->view('admin/v_tag_header');  ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <?php
    $this->load->view('admin/v_header');
    $this->load->view('admin/v_menu_sidebar');
  ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PPID System | Data Permohonan Disetujui
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Permohonan Disetujui</li>
      </ol>
        <!-- Main content -->
    </section>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="myTable" class="table-responsive table-striped" style="font-size:12px;">
                <thead>
                <tr>
                    <th >No</th>
                    <th >Permohonan Terdaftar</th>
                    <th >IDPI</th>
                    <th >Pemohon </th>
                    <th >Deskripsi Permohonan </th>
                    <th >Keterangan Disetujui </th>
                    <th >Dokumen Informasi</th>
                    <th >Petugas </th>
                    <th >Tanggal Diproses</th> 
                </tr>
                </thead>
                <tbody>
        <?php
          $no=0;
            foreach ($data->result_array() as $i) :
              $no++; 
                    ?>
                <tr>
                  <td style="vertical-align: middle;"> <?= $no; ?></td> 
                  <td style="vertical-align: middle;"><?php echo $i['tgl_pemohon']?></td> 
                  <td style="vertical-align: middle;"><?php echo $i['idpi']?></td> 
                  <td style="vertical-align: middle;"><?= $i['nama'];?> <br> <?= $i['alamat'];?> <br><?= $i['nik_nokemenkumham'];?> <br> <?= $i['nohp'];?> <br> <?= $i['email'];?></td> 
                  <td style="vertical-align: middle;">Permohonan Informasi : <br> <?= $i['mohon_informasi'];?> <br> <br> Tujuan Permohonan : <br> <?= $i['tujuan_informasi'];?>  </td> 
                  <td style="vertical-align: middle;"><?php echo $i['keterangan_tindaklanjut']?></td> 
                  <td style="vertical-align: middle;"><a href="<?php echo base_url().'assets/dokumen-informasi/'.$i['dokumen'];?>" target="_blank">Lampiran</a></td> 
                  <td style="vertical-align: middle;"><?php echo $i['petugas_tindaklanjut']?></td> 
                  <td style="vertical-align: middle;"><?php echo $i['tgl_tindaklanjut']?></td>   
                </tr>
        <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong><?php echo date('Y');?> © Copyright <a href="http://tanjungbalaikota.go.id">Pemerintah Kota Tanjungbalai</a>.</strong> All rights reserved.
  </footer>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



  <?php $this->load->view('admin/v_js');  ?>

</body>
</html>
