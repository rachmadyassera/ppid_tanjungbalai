<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_PermohonanInformasi','mpi'); 

		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        }; 
	}
	function index(){
		$x['statistik']                       = $this->mpi->statistik_permohonan_tahun_berjalan();
		$x['total_permohonan']                = $this->mpi->total_permohonan();
		$x['total_permohonan_belum_proses']   = $this->mpi->total_permohonan_belum_diproses();
		$x['total_permohonan_selesai_proses'] = $this->mpi->total_permohonan_selesai_diproses();
		$x['total_permohonan_ditolak']        = $this->mpi->total_permohonan_ditolak();
		$x['permohonan_informasi_terakhir']   = $this->mpi->permohonan_informasi_terakhir();
		$x['permohonan_bulan_ini']            = $this->mpi->permohonan_bulan_ini();
		$x['permohonan_bulan_lalu']           = $this->mpi->permohonan_bulan_lalu();
		$x['permohonan_tahun_ini']            = $this->mpi->permohonan_tahun_ini();
		$x['permohonan_tahun_lalu']            = $this->mpi->permohonan_tahun_lalu();
 
		$this->load->view('admin/v_dashboard',$x); 
	
	}
	
}