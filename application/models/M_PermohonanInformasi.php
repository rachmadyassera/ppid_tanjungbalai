<?php

use GuzzleHttp\Client; 
class M_PermohonanInformasi extends CI_Model{

	function statistik_permohonan_tahun_berjalan(){
        $query = $this->db->query("SELECT DATE_FORMAT(tgl_terdaftar,'%d') AS tgl,COUNT(id) AS jumlah FROM permohonan_informasi WHERE MONTH(tgl_terdaftar)=MONTH(CURDATE()) GROUP BY DATE(tgl_terdaftar)");

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

	function total_permohonan(){
		$hsl=$this->db->query("SELECT * FROM permohonan_informasi");
		return $hsl->num_rows();
	}

	function total_permohonan_belum_diproses(){
		$hsl = $this->db->query("SELECT *
		FROM permohonan_informasi
		WHERE idpi NOT IN (SELECT idpi
		FROM tindaklanjut_informasi)");
		return $hsl->num_rows();
	}

	function total_permohonan_selesai_diproses(){
		$hsl = 	$hsl=$this->db->query("SELECT * FROM tindaklanjut_informasi WHERE status = 1 ");
		return $hsl->num_rows();
	}
	
	function total_permohonan_ditolak(){
		$hsl = 	$hsl=$this->db->query("SELECT * FROM tindaklanjut_informasi WHERE status = 2 ");
		return $hsl->num_rows();
	}

	function permohonan_informasi_terakhir(){ 
		$this->db->select('permohonan_informasi.idpi,mohon_informasi,status,permohonan_informasi.tgl_terdaftar');
		$this->db->from('permohonan_informasi');
		$this->db->join('tindaklanjut_informasi', 'permohonan_informasi.idpi = tindaklanjut_informasi.idpi','left');   
		$this->db->limit(10);
		$this->db->order_by('permohonan_informasi.id', 'DESC');
		$hsl = $this->db->get();
    	return $hsl;
	}

	function permohonan_bulan_ini(){ 
		$query = $this->db->query("SELECT * FROM permohonan_informasi WHERE DATE_FORMAT(tgl_terdaftar,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
		$hsl   = $query->num_rows();
    	return $hsl;
	}
	
	function permohonan_bulan_lalu(){ 
		$query = $this->db->query("SELECT * FROM permohonan_informasi WHERE DATE_FORMAT(tgl_terdaftar,'%m%y')=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%m%y')");
		$hsl   = $query->num_rows();
    	return $hsl;
	}

	function permohonan_tahun_ini(){ 
		$query = $this->db->query("SELECT * FROM permohonan_informasi WHERE DATE_FORMAT(tgl_terdaftar,'%y')=DATE_FORMAT(CURDATE(),'%y')");
		$hsl   = $query->num_rows();
    	return $hsl;
	}

	function permohonan_tahun_lalu(){ 
		$query = $this->db->query("SELECT * FROM permohonan_informasi WHERE DATE_FORMAT(tgl_terdaftar,'%y')=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 YEAR),'%y')");
		$hsl   = $query->num_rows();
    	return $hsl;
	}

	function status_permohonan_informasi(){ 
		$this->db->select('permohonan_informasi.idpi,mohon_informasi,status,permohonan_informasi.tgl_terdaftar');
		$this->db->from('permohonan_informasi');
		$this->db->join('tindaklanjut_informasi', 'permohonan_informasi.idpi = tindaklanjut_informasi.idpi','left');   
		$this->db->order_by('permohonan_informasi.id', 'DESC');
		$hsl = $this->db->get();
    	return $hsl;
	}
	
	function kirim_permohonan($nama,$niknokemenkumham,$email,$nohp,$alamat,$mohoninformasi,$tujuaninformasi,$idpi,$gfile){
		$hsl=$this->db->query("INSERT INTO permohonan_informasi(nama,nik_nokemenkumham,email,nohp,alamat,mohon_informasi,tujuan_informasi,idpi,gfile) VALUES ('$nama','$niknokemenkumham','$email','$nohp','$alamat','$mohoninformasi','$tujuaninformasi','$idpi','$gfile')");
		return $hsl;
	}
	
	function kirim_permohonan_non_file($nama,$niknokemenkumham,$email,$nohp,$alamat,$mohoninformasi,$tujuaninformasi,$idpi){
		$hsl=$this->db->query("INSERT INTO permohonan_informasi(nama,nik_nokemenkumham,email,nohp,alamat,mohon_informasi,tujuan_informasi,idpi) VALUES ('$nama','$niknokemenkumham','$email','$nohp','$alamat','$mohoninformasi','$tujuaninformasi','$idpi')");
		return $hsl;
	}

	function get_all_inbox(){
		$hsl=$this->db->query("SELECT tbl_lapor.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM tbl_lapor ORDER BY inbox_id DESC");
		return $hsl;
	}

	function tampilkan_permohonan_informasi_pada_idpi($idpi){
		$hsl=$this->db->query("SELECT permohonan_informasi.*,DATE_FORMAT(tgl_terdaftar,'%d %M %Y') AS tanggal FROM permohonan_informasi WHERE idpi='$idpi'");
		return $hsl;
	}

	function get_lapor_byid($id){
		$hsl=$this->db->query("SELECT tbl_lapor.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM tbl_lapor WHERE inbox_id='$id'");
		return $hsl;
	}

	function tampilkan_tindaklanjut_informasi_pada_idpi($idpi,$status){
		if($status  == 1) { 
			$hsl=$this->db->query("SELECT tindaklanjut_informasi.*,DATE_FORMAT(tindaklanjut_informasi.tgl_terdaftar,'%d %M %Y') AS tanggal, dokumen, tindaklanjut_informasi.keterangan as keterangan_tindaklanjut FROM tindaklanjut_informasi INNER JOIN dokumen_informasi ON tindaklanjut_informasi.id_dokumen_informasi=dokumen_informasi.id WHERE idpi='$idpi'");
		}else{
			$hsl=$this->db->query("SELECT tindaklanjut_informasi.*,DATE_FORMAT(tindaklanjut_informasi.tgl_terdaftar,'%d %M %Y') AS tanggal,  tindaklanjut_informasi.keterangan as keterangan_tindaklanjut FROM tindaklanjut_informasi  WHERE idpi='$idpi'");
		}
		return $hsl;
	}

	function tampilkan_data_permohonan_belum_diproses(){
		$hsl = $this->db->query("SELECT *,DATE_FORMAT(tgl_terdaftar,'%d %M %Y') AS tanggal
		FROM permohonan_informasi
		WHERE idpi NOT IN (SELECT idpi
		FROM tindaklanjut_informasi)");
		return $hsl;
	}
	
	function tampilkan_data_tindak_lanjut_disetujui(){
		$this->db->select('permohonan_informasi.idpi,mohon_informasi,status,permohonan_informasi.tgl_terdaftar as tgl_pemohon, tindaklanjut_informasi.tgl_terdaftar as tgl_tindaklanjut, tindaklanjut_informasi.keterangan as keterangan_tindaklanjut, tindaklanjut_informasi.petugas as petugas_tindaklanjut, nama, tujuan_informasi, dokumen, alamat, nik_nokemenkumham, nohp, email ');
		$this->db->from('permohonan_informasi');
		$this->db->join('tindaklanjut_informasi', 'permohonan_informasi.idpi = tindaklanjut_informasi.idpi');    
		$this->db->join('dokumen_informasi', 'tindaklanjut_informasi.id_dokumen_informasi = dokumen_informasi.id');
		$this->db->where('status', 1);
		$this->db->order_by('tindaklanjut_informasi.tgl_terdaftar', 'DESC');
		$hsl = $this->db->get();
    	return $hsl;
	}
	
	function tampilkan_data_tindak_lanjut_ditolak(){
		$this->db->select('permohonan_informasi.idpi,mohon_informasi,status,permohonan_informasi.tgl_terdaftar as tgl_pemohon, tindaklanjut_informasi.tgl_terdaftar as tgl_tindaklanjut, tindaklanjut_informasi.keterangan as keterangan_tindaklanjut, tindaklanjut_informasi.petugas as petugas_tindaklanjut, nama, tujuan_informasi, gfile, alamat, nik_nokemenkumham, nohp, email ');
		$this->db->from('permohonan_informasi');
		$this->db->join('tindaklanjut_informasi', 'permohonan_informasi.idpi = tindaklanjut_informasi.idpi');     
		$this->db->where('status', 2);
		$this->db->order_by('tindaklanjut_informasi.tgl_terdaftar', 'DESC');
		$hsl = $this->db->get();
    	return $hsl;
	}
	
	function get_all_inbox_0(){
		$hsl=$this->db->query("SELECT tbl_lapor.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM tbl_lapor WHERE inbox_tindaklanjut='0' ORDER BY inbox_id DESC");
		return $hsl;
	}

	function get_all_inbox_1(){
		$hsl=$this->db->query("SELECT tbl_lapor.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM tbl_lapor WHERE inbox_tindaklanjut='1' ORDER BY inbox_id DESC");
		return $hsl;
	}

	function get_all_inbox_2(){
		$hsl=$this->db->query("SELECT tbl_lapor.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM tbl_lapor WHERE inbox_tindaklanjut='2' ORDER BY inbox_id DESC");
		return $hsl;
	}

	function get_all_ti(){
		$hsl=$this->db->query("SELECT tindaklanjut_informasi.*, DATE_FORMAT(tgl_terdaftar,'%d %M %Y') AS tanggal FROM tindaklanjut_informasi ORDER BY tanggal DESC");
		return $hsl;
	}
	
	function tampilkan_data_tindaklanjut_per_idpi($idpi){
		$hsl=$this->db->query("SELECT tindaklanjut_informasi.*, DATE_FORMAT(tgl_terdaftar,'%d %M %Y') AS tanggal FROM tindaklanjut_informasi  WHERE idpi='$idpi' ORDER BY tanggal DESC");
		return $hsl;
	}


	function hapus_kontak($kode){
		$hsl=$this->db->query("DELETE FROM tbl_lapor WHERE inbox_id='$kode'");
		return $hsl;
	}

	function update_status_kontak(){
		$hsl=$this->db->query("UPDATE tbl_lapor SET inbox_status='0'");
		return $hsl;
	}

	function update_status_kontak_0(){
		$hsl=$this->db->query("UPDATE tbl_lapor SET inbox_status='0' WHERE inbox_tindaklanjut='0'");
		return $hsl;
	}

	function update_status_kontak_1(){
		$hsl=$this->db->query("UPDATE tbl_lapor SET inbox_status='0' WHERE inbox_tindaklanjut='1'");
		return $hsl;
	}

	function simpan_penyelidikan($id,$tindaklanjut,$keterangan,$img_1,$img_2,$img_3,$user_nama,$tanggal_verif){
		$hsl=$this->db->query("UPDATE tbl_lapor SET inbox_tindaklanjut='$tindaklanjut',inbox_keterangan='$keterangan',inbox_filetl='$img_1',inbox_filetl2='$img_2',inbox_filetl3='$img_3',inbox_author='$user_nama', inbox_status='1', inbox_tanggal_verif='$tanggal_verif' WHERE inbox_id='$id'");
		return $hsl;
	}

	function simpan_progres($idpi,$status,$keterangan,$petugas,$dokumen){
		$hsl=$this->db->query("INSERT INTO tindaklanjut_informasi(idpi,status,keterangan,petugas,id_dokumen_informasi) VALUES ('$idpi','$status','$keterangan','$petugas','$dokumen')");
		return $hsl;
	}

	function simpan_tolak_penyelidikan($id,$tindaklanjut,$keterangan,$user_nama,$tanggal_verif){
		$hsl=$this->db->query("UPDATE tbl_lapor SET inbox_tindaklanjut='$tindaklanjut',inbox_keterangan='$keterangan',inbox_author='$user_nama', inbox_status='1', inbox_tanggal_verif='$tanggal_verif' WHERE inbox_id='$id'");
		return $hsl;
	}
	function batal_penyelidikan($id,$tindaklanjut,$keterangan,$file,$user_nama,$tanggal_verif){
		$hsl=$this->db->query("UPDATE tbl_lapor SET inbox_tindaklanjut='$tindaklanjut',inbox_keterangan='$keterangan',inbox_filetl='$file',inbox_author='$user_nama', inbox_status='1', inbox_tanggal_verif='$tanggal_verif' WHERE inbox_id='$id'");
		return $hsl;
	}
	function ceknik($n){
        $hasil=$this->db->query("SELECT * FROM tbl_capil WHERE nik='$n'");
        return $hasil;
    }

    function cnik($nik)
    {
    	$client = new Client();

    	$response = $client->request('GET','http://dukcapil.tanjungbalaikota.go.id/api_oracle/api/Biodata',[
    		'query' =>['NIK' => $nik],
    		'http_errors'=>false
    	]);
    	$result = json_decode($response->getBody()->getContents(), true);
    	error_reporting(0);
    	return $result['data'];	
    			

    }

    function validnik($nik)
    {
    	$client = new Client();

    	$response = $client->request('GET','http://dukcapil.tanjungbalaikota.go.id/api_oracle/api/Biodata',[
    		'query' =>['NIK' => $nik]
    	]);
		//$result = var_export($response->getStatusCode(), true);
    	//return $result['status'];
    	$result = json_decode($response->getBody()->getContents(), true);
    	return $result['data'];		

    }

    // function cnik($id)
    // {
    // 	$client = new Client();

    // 	$response = $client->request('GET','http://localhost/KOMINFO/sipakar/rest-server/api/pegawai',[
    // 		'query' =>['id_pegawai' => $id]
    // 	]);
    // 	$result = json_decode($response->getBody()->getContents(), true);
    // 	return $result['data'];			

    // }


}