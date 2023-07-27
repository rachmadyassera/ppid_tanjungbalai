<?php
class Dokumen extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_Dokumen','m_dok');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_dok->tampilkan_semua_dokumen();
		$this->load->view('admin/v_dokumen',$x);
	}

	function simpan_dip(){
		$this->db->select_max('id');
		$getid = $this->db->get('dokumen_informasi');     

		if(empty($getid->row()->id)){
			$id ='1';
		}else{ 
			$id = ($getid->row()->id)+1;
		} 
		// var_dump($id);
		// die;
		$keterangan   = strip_tags($this->input->post('keterangan')); 
		$petugas      = $this->session->userdata('nama');
		$tgl          = date('Ymd'); 
		$nama_dokumen = $id.'-'.$tgl;
	

		$config['upload_path']   = './assets/dokumen-informasi/';  //path folder
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|zip|rar|ppt|xls|doc|docs';     //type yang dapat diakses bisa anda sesuaikan
		$config['file_name']     = $nama_dokumen;
		$this->upload->initialize($config); 
		if($this->upload->do_upload('dokumen'))
		{
			$dokumen      = $this->upload->data();
			$nama_dokumen = $dokumen['file_name'];
			
			$this->m_dok->simpan_dokumen($keterangan,$nama_dokumen,$petugas);
			echo $this->session->set_flashdata('msg','success');
			redirect('admin/dokumen');
		}else{
			echo $this->session->set_flashdata('msg','warning');
			redirect('admin/dokumen');
			
		}
	}

	function update_dip(){
		$id           = strip_tags($this->input->post('id'));
		$keterangan   = strip_tags($this->input->post('keterangan'));
		$petugas      = $this->session->userdata('nama');
		$tgl          = date('Ymd');
		$nama_dokumen = $id.'-'.$tgl;

		$config['upload_path']   = './assets/dokumen-informasi/';  //path folder
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|zip|rar|ppt|xls|doc|docs';     //type yang dapat diakses bisa anda sesuaikan
		$config['file_name']     = $nama_dokumen; 
		$path   = 'assets/dokumen-informasi/'.$nama_dokumen.'.pdf';
		$recyle = 'assets/dokumen-recycle/'.$nama_dokumen.'-recycle.pdf';
		copy($path,$recyle);
		unlink($path);

		$this->upload->initialize($config); 
		if($this->upload->do_upload('dokumen'))
		{
			$dokumen      = $this->upload->data();
			$nama_dokumen = $dokumen['file_name'];
			$this->m_dok->update_dokumen($id,$keterangan,$nama_dokumen,$petugas);
			echo $this->session->set_flashdata('msg','info');
			redirect('admin/dokumen');
		}else{
			echo $this->session->set_flashdata('msg','warning');
			redirect('admin/dokumen');
			
		}
	} 

}
