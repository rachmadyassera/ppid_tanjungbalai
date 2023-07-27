<?php
class M_Dokumen extends CI_Model{

	function tampilkan_semua_dokumen(){
		$hsl=$this->db->query("select * from dokumen_informasi");
		return $hsl;
	}
	function simpan_dokumen($keterangan,$nama_dokumen,$petugas){
		$hsl=$this->db->query("insert into dokumen_informasi(keterangan,dokumen,petugas) values('$keterangan','$nama_dokumen','$petugas')");
		return $hsl;
	}
	function update_dokumen($id,$keterangan,$nama_dokumen,$petugas){
		$hsl=$this->db->query("update dokumen_informasi set keterangan='$keterangan',dokumen='$nama_dokumen',petugas='$petugas' where id='$id'");
		return $hsl;
	}
	function hapus_dokumen($id){
		$hsl=$this->db->query("delete from dokumen_informasi where id='$id'");
		return $hsl;
	}
	
	function get_dokumen_byid($id){
		$hsl=$this->db->query("select * from dokumen_informasi where id='$id'");
		return $hsl;
	}

}