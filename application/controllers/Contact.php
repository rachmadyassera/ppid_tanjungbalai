<?php
class Contact extends CI_Controller{
  function __construct(){
		parent::__construct(); 
      $this->load->model('M_PermohonanInformasi','mpi'); 
      $this->load->library('upload'); 
	}

	function index(){
      $x['data']=$this->mpi->status_permohonan_informasi();
		  $this->load->view('depan/v_contact',$x);
	}
 

// ====================VALIDASI NIK API=======================
  
  function valid_nik(){
      $nik  = strip_tags(str_replace("'", "", $this->input->post('nik')));
      $cnik = $this->m_kontak->cnik($nik);
      if(count($cnik)>0){
      $x['NIK']=$this->m_kontak->cnik($nik);
      $x['data']=$this->m_kontak->get_all_wb();
      $this->load->view('depan/v_contact',$x);
      }else{
      echo $this->session->set_flashdata('msg',"<div class='alert alert-warning'>'Tidak dapat Melanjutkan Proses Pengaduan, NIK Anda tidak terdaftar atau salah, mohon periksa kembali.</div>");
      redirect('');
      } 
    } 

  function get_wb(){
      $id=$this->uri->segment(3);
      $get_db=$this->m_kontak->get_all_wb($id);
      $q=$get_db->row_array();
      $file=$q['file_data'];
      $path='./assets/files/'.$file;
      $data = file_get_contents($path);
      $name = $file;
      force_download($name, $data);
  }

  function kirim_permohonan(){

        $nama             = htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
        $niknokemenkumham = htmlspecialchars($this->input->post('niknokemenkumham',TRUE),ENT_QUOTES);
        $email            = htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
        $nohp             = htmlspecialchars($this->input->post('nohp',TRUE),ENT_QUOTES);
        $alamat           = htmlspecialchars($this->input->post('alamat',TRUE),ENT_QUOTES);
        $mohoninformasi   = htmlspecialchars($this->input->post('mohoninformasi',TRUE),ENT_QUOTES);
        $tujuaninformasi  = htmlspecialchars($this->input->post('tujuaninformasi',TRUE),ENT_QUOTES);
        $idpi             = htmlspecialchars($this->input->post('idpi',TRUE),ENT_QUOTES);
        $acak             = rand(1, 1000);
        
        $config['upload_path']    = './assets/files/';   //path folder
        $config['allowed_types']  = 'jpg|jpeg|png|pdf|zip|rar';   //type yang dapat diakses bisa anda sesuaikan
        $config['file_name']      = $acak.$idpi;
        $config['max_size']       = 10240000;

        $this->upload->initialize($config); 
          if(!empty($_FILES['file']['name']))
          {
            if ($this->upload->do_upload('file')){
                  $gbr   = $this->upload->data();
                  $gfile = $gbr['file_name'];
                
                  $this->mpi->kirim_permohonan($nama,$niknokemenkumham,$email,$nohp,$alamat,$mohoninformasi,$tujuaninformasi,$idpi,$gfile);

                  echo $this->session->set_flashdata('msg',"<div class='alert alert-info'><p><strong> NB: </strong><b>Permohonan berhasil di kirim, tindak lanjut status permohonan dapat dilihat pada Laporan Pelayanan Informasi .</b></p></div>");

                  $from_email = "tanjungbalaippid@gmail.com"; 
                  $to_email = $this->input->post('email');; 
                  
                  $config = Array(
                  'protocol' => 'smtp',
                  'smtp_host' => 'ssl://smtp.googlemail.com',
                  'smtp_port' => 465,
                  'smtp_user' => $from_email,
                  'smtp_pass' => 'gwjnbyuikkuzwjny',
                  'mailtype'  => 'html', 
                  'charset'   => 'iso-8859-1'
                  );
                  
                  $idpi=$this->input->post('idpi');
                  $xidsendmail = 'PPID Notify | '.$idpi;
                  $x['data']=$this->mpi->tampilkan_permohonan_informasi_pada_idpi($idpi);
                  $message=$this->load->view('template-email/notif_mail',$x,TRUE);
                  $this->load->library('email', $config);
                  $this->email->set_newline("\r\n");   
                  $this->email->from($from_email, 'PPID | Notify - Please No Reply'); 
                  $this->email->to($to_email);
                  $this->email->subject($xidsendmail); 
                  $this->email->message($message); 
                  $this->email->send();
                //session_destroy();
                redirect('');
              }else{
              echo $this->session->set_flashdata('msg',"<div class='alert alert-warning'>'Permohonan Tidak Dapat diProses, Data yang anda kirim Belum Benar'</div>");
              redirect('');
              }

              }else{ 
                  $this->mpi->kirim_permohonan_non_file($nama,$niknokemenkumham,$email,$nohp,$alamat,$mohoninformasi,$tujuaninformasi,$idpi);

                  echo $this->session->set_flashdata('msg',"<div class='alert alert-info'><p><strong> NB: </strong><b>Permohonan berhasil di kirim, tindak lanjut status permohonan dapat dilihat pada Laporan Pelayanan Informasi .</b></p></div>");

                  $from_email = "tanjungbalaippid@gmail.com"; 
                  $to_email = $this->input->post('email');; 
                  
                  $config = Array(
                  'protocol' => 'smtp',
                  'smtp_host' => 'ssl://smtp.googlemail.com',
                  'smtp_port' => 465,
                  'smtp_user' => $from_email,
                  'smtp_pass' => 'gwjnbyuikkuzwjny',
                  'mailtype'  => 'html', 
                  'charset'   => 'iso-8859-1'
                  );
                  
                  $idpi=$this->input->post('idpi');
                  $xidsendmail = 'PPID Notify | '.$idpi;
                  $x['data']=$this->mpi->tampilkan_permohonan_informasi_pada_idpi($idpi);
                  $message=$this->load->view('template-email/notif_mail',$x,TRUE);
                  $this->load->library('email', $config);
                  $this->email->set_newline("\r\n");   
                  $this->email->from($from_email, 'PPID | Notify - Please No Reply'); 
                  $this->email->to($to_email);
                  $this->email->subject($xidsendmail); 
                  $this->email->message($message); 
                  $this->email->send();
                //session_destroy();
                redirect('');
              } 
  }
}
