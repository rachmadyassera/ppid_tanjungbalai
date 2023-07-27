<?php
class M_opd extends CI_Model{

	function get_all_opd(){
		$hsl=$this->db->query("select * from tbl_opd");
		return $hsl;
	}
	function simpan_opd($kategori,$email){
		$hsl=$this->db->query("insert into tbl_opd(opd_nama,opd_email) values('$kategori','$email')");
		return $hsl;
	}
	function update_opd($kode,$kategori,$email){
		$hsl=$this->db->query("update tbl_opd set opd_nama='$kategori',opd_email='$email' where opd_id='$kode'");
		return $hsl;
	}
	function hapus_opd($kode){
		$hsl=$this->db->query("delete from tbl_opd where opd_id='$kode'");
		return $hsl;
	}
	
	function get_opd_byid($id){
		$hsl=$this->db->query("select * from tbl_opd where opd_id='$id'");
		return $hsl;
	}
		
	function get_nama_opd_byemail($email){
		$hsl=$this->db->query("select opd_nama from tbl_opd where opd_email='$email'");
		return $hsl;
	}


}