<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (! function_exists('hitung_sejak_belum_diproses')) {
    function hitung_sejak_belum_diproses($tgl)
    {
        $tanggal = new DateTime($tgl);
        $today = new DateTime('today');
        $y = $today->diff($tanggal)->y;
        $m = $today->diff($tanggal)->m;
        $d = $today->diff($tanggal)->d;
        return $y . " Tahun " . $m . " Bulan " . $d . " Hari";
	}
	
if (! function_exists('hitung_selisih')) {
    function hitung_selisih($tgl)
    {
        $tanggal = new DateTime($tgl);
        $today = new DateTime('today');
        $y = $tanggal->diff($today)->y;
        $m = $tanggal->diff($today)->m;
        $d = $tanggal->diff($today)->d;
        return $y . " Tahun " . $m . " Bulan " . $d . " Hari";
	}
	
}
}