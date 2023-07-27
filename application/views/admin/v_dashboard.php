<!--Counter Inbox-->
<?php
    error_reporting(0);
    $query=$this->db->query("SELECT * FROM tbl_lapor WHERE inbox_status='1'");
    $jum_pesan=$query->num_rows();
?>
<!DOCTYPE html>
<html>
<?php $this->load->view('admin/v_tag_header'); ?>

<?php
        /* Mengambil query report*/
        foreach($statistik as $result){
            $bulan[] = $result->tgl; //ambil bulan
            $value[] = (float) $result->jumlah; //ambil nilai
        }
        /* end mengambil query*/

  ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!--Header-->
  <?php
    $this->load->view('admin/v_header');
    $this->load->view('admin/v_menu_sidebar');
  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        <marquee loop="3" behavior="alternate" onmouseover="this.stop()" onmouseout="this.start()"> <b>Selamat Datang Di Halaman Administrator  PPID Tanjungbalai !</b>
        <small></small></marquee>
      </h2>  
      </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes --> 
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-bullhorn"></i></span> 
            <div class="info-box-content">
              <span class="info-box-text"><b>Total Permohonan</b></span>
              <center><h2><span class="info-box-number" width="100"><?= $total_permohonan; ?></span></h2></center>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua-gradient"><i class="fa fa-hourglass-start"></i></span> 
            <div class="info-box-content">
              <span class="info-box-text"><b>Belum Diproses</b></span>
              <center><h2><span class="info-box-number" width="100"><?= $total_permohonan_belum_proses; ?></span></h2></center>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-legal"></i></span>
              <?php
                    $query=$this->db->query("SELECT * FROM tbl_lapor WHERE inbox_tindaklanjut='1'");
                    $jml=$query->num_rows();
              ?>
            <div class="info-box-content">
              <span class="info-box-text"><b>Selesai Diproses</b></span>
              <center><h2><span class="info-box-number" ><?= $total_permohonan_selesai_proses; ?></span></h2></center>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user-times"></i></span> 
            <div class="info-box-content">
              <span class="info-box-text"><b>Permohonan Ditolak</b></span>
              <center><h2><span class="info-box-number" ><?= $total_permohonan_ditolak; ?></span></h2></center>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

 <!-- Info boxes -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><i><b>Grafik Permohonan Informasi Bulan ini</b></i></h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">

                  <div class="col-md-12">
                          <canvas id="canvas" width="1000" height="280"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h2 class="box-title"><i><b>10 Permohonan Informasi Terakhir</b></i></h2>
              <table class="table">
                <th>IDPI</th>
                <th>Permohonan</th>
                <th>Status</th>
                <th>Tanggal Terdaftar</th>
              <?php 
                  foreach ($permohonan_informasi_terakhir->result_array() as $i) : 
              ?>
                  <tr>
                    <td style="vertical-align: middle;"><?= $i['idpi']; ?></td>
                    <td style="vertical-align: middle;"><?= $i['mohon_informasi']; ?></td> 
                      <?php if($i['status']=='1'):?>
                      <td style="vertical-align: middle;">Selesai</td>
                      <?php elseif($i['status']=='2'):?>
                      <td style="vertical-align: middle;">Ditolak</td>
                      <?php else:?> 
                      <td style="vertical-align: middle;">Belum Diproses <br> (Selama, <?= hitung_sejak_belum_diproses($i['tgl_terdaftar']); ?>)</td>
                      <?php endif;?>
                    <td style="vertical-align: middle;"><?= $i['tgl_terdaftar']; ?></td>
                  </tr>
              <?php endforeach;?>
              </table>
            </div> 
          </div> 
        </div> 

        <div class="col-md-4"> 
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-area-chart"></i></span> 
            <div class="info-box-content">
              <span class="info-box-text">Bulan Ini</span>
              <span class="info-box-number"><?= $permohonan_bulan_ini; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                  Permohonan Informasi 
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

           <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-area-chart"></i></span> 
            <div class="info-box-content">
              <span class="info-box-text">Bulan Lalu</span>
              <span class="info-box-number"><?= $permohonan_bulan_lalu; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                  Permohonan Informasi 
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
                    
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-line-chart"></i></span> 
            <div class="info-box-content">
              <span class="info-box-text">TAHUN INI</span>
              <span class="info-box-number"><?= $permohonan_tahun_ini; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    Permohonan Informasi
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-line-chart"></i></span> 
            <div class="info-box-content">
              <span class="info-box-text"> TAHUN LALU</span>
              <span class="info-box-number"><?= $permohonan_tahun_lalu; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    Permohonan Informasi
                  </span>
            </div>
            <!-- /.info-box-content -->
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


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url().'assets/dist/js/pages/dashboard2.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>

<script>

            var lineChartData = {
                labels : <?php echo json_encode($bulan);?>,
                datasets : [

                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($value);?>
                    }

                ]

            }

        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

        var canvas = new Chart(myLine).Line(lineChartData, {
            scaleShowGridLines : true,
            scaleGridLineColor : "rgba(0,0,0,.005)",
            scaleGridLineWidth : 0,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve : true,
            bezierCurveTension : 0.4,
            pointDot : true,
            pointDotRadius : 4,
            pointDotStrokeWidth : 1,
            pointHitDetectionRadius : 2,
            datasetStroke : true,
            tooltipCornerRadius: 2,
            datasetStrokeWidth : 2,
            datasetFill : true,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            responsive: true
        });

        </script>

</body>
</html>
