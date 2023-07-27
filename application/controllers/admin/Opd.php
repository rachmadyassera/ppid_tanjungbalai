<?php
class Opd extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_opd');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_opd->get_all_opd();
		$this->load->view('admin/v_opd',$x);
	}

	function simpan_opd(){
		$kategori=strip_tags($this->input->post('xnamaopd'));
		$email=strip_tags($this->input->post('xemailopd'));
		$this->m_opd->simpan_opd($kategori,$email);
		echo $this->session->set_flashdata('msg','success');
		redirect('admin/opd');
	}

	function update_opd(){
		$kode=strip_tags($this->input->post('kode'));
		$kategori=strip_tags($this->input->post('xnamaopd'));
		$email=strip_tags($this->input->post('xemailopd'));
		$this->m_opd->update_opd($kode,$kategori,$email);
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/opd');
	}
	function hapus_opd(){
		$kode=strip_tags($this->input->post('kode'));
		$this->m_opd->hapus_opd($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/opd');
	}

}
