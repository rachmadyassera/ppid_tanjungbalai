<?php
class Inbox extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_PermohonanInformasi','mpi'); 
		$this->load->model('M_Dokumen','md');
		$this->load->model('m_pengguna');
		$this->load->model('m_opd','mo');
		$this->load->library('upload');
	}

	function index(){ 
		$x['data']=$this->mpi->tampilkan_data_permohonan_belum_diproses();
		$x['opd']=$this->mo->get_all_opd();
		$x['dokumen']=$this->md->tampilkan_semua_dokumen();
		$this->load->view('admin/v_inbox',$x);
	}

	function permohonan_informasi_disetujui(){ 
		$x['data']=$this->mpi->tampilkan_data_tindak_lanjut_disetujui();
		$this->load->view('admin/v_hasil_lidik',$x);
	}

	function permohonan_informasi_ditolak(){ 
		$x['data']=$this->mpi->tampilkan_data_tindak_lanjut_ditolak();
		$this->load->view('admin/v_verif_tolak',$x);
	}

	function hapus_inbox(){
		$kode=$this->input->post('kode');
		$this->m_kontak->hapus_kontak($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/inbox');
	}

	function simpan_progress(){

		$idpi       = $this->input->post('idpi');
		$status     = $this->input->post('status');
		$keterangan = $this->input->post('keterangan');
		$petugas    = $this->session->userdata('nama');
		$dokumen    = $this->input->post('dokumen'); 
					
		$this->mpi->simpan_progres($idpi,$status,$keterangan,$petugas,$dokumen);
		echo $this->session->set_flashdata('msg','info'); 

		$from_email = "tanjungbalaippid@gmail.com"; 
		$to_email = $this->input->post('email'); 
		
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => $from_email,
		'smtp_pass' => 'gwjnbyuikkuzwjny',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1'
		);
		 
		$xidsendmail = 'PPID Progres | '.$idpi; 
		$x['data']=$this->mpi->tampilkan_tindaklanjut_informasi_pada_idpi($idpi,$status);
		$message=$this->load->view('template-email/send_mail',$x,TRUE);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");   
		$this->email->from($from_email, 'PPID Progress | No Replay'); 
		$this->email->to($to_email);
		$this->email->subject($xidsendmail); 
		$this->email->message($message); 
		$this->email->send();
		redirect('admin/inbox'); 

	}

	function teruskan_permohonan_ke_opd(){

		$from_email = "tanjungbalaippid@gmail.com";//sikomplit@tanjungbalaikota.go.id 
		$to_email = $this->input->post('email'); 
		
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.gmail.com',//mail.tanjungbalaikota.go.id
		'smtp_port' => 465,
		'smtp_user' => $from_email,
		'smtp_pass' => 'gwjnbyuikkuzwjny',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1'
		);
		
		   $idpi        = $this->input->post('idpi');
		   $xidsendmail = 'PPID - Permohonan Informasi oleh Masyarakat | '.$idpi;
		$x['opd']       = $this->mo->get_nama_opd_byemail($to_email)->row_array();
		// var_dump($this->mo->get_nama_opd_byemail($to_email)->row_array().' - '.$to_email);
		// die;
		$x['data']      = $this->mpi->tampilkan_permohonan_informasi_pada_idpi($idpi);
		   $message     = $this->load->view('template-email/opd_mail',$x,TRUE);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");   
		$this->email->from($from_email, 'PPID | ppid.tanjungbalaikota.go.id'); 
		$this->email->to($to_email);
		$this->email->subject($xidsendmail); 
		$this->email->message($message); 
		// var_dump($x);

		$this->email->send();
		echo $this->session->set_flashdata('msg','sendmail');
		redirect('admin/inbox');

	}

	function batalkan_penyelidikan(){
		$id=$this->input->post('kode');
		$data=$this->input->post('filetl');
		$path='./assets/resolve/'.$data;
		unlink($path);
        $tindaklanjut=(0);
		$keterangan=$this->input->post('');
		$file=$this->input->post('');
		$kode=$this->session->userdata('idadmin');
		$user=$this->m_pengguna->get_pengguna_login($kode);
		$p=$user->row_array();
		$user_id=$p['pengguna_id'];
		$user_nama=$p['pengguna_nama'];
		$tanggal_verif=$this->input->post('xtanggalverif');
		// $data=$this->input->post('filetl');
		// $path='./assets/resolve/'.$data;
		// unlink($path);
		$this->m_kontak->batal_penyelidikan($id,$tindaklanjut,$keterangan,$file,$user_nama,$tanggal_verif);
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/inbox/');

		}
}
