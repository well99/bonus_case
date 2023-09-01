<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$saldoawal = 100000;
		$mutasi = array(
			(object)["tanggal" => "2021-10-01", "masuk" => 200000, "keluar" => 0, "saldo" => 0],
			(object)["tanggal" => "2021-10-03", "masuk" => 300000, "keluar" => 0, "saldo" => 0],
			(object)["tanggal" => "2021-10-05", "masuk" => 150000, "keluar" => 0, "saldo" => 0],
			(object)["tanggal" => "2021-10-02", "masuk" => 0, "keluar" => 100000, "saldo" => 0],
			(object)["tanggal" => "2021-10-04", "masuk" => 0, "keluar" => 150000, "saldo" => 0],
			(object)["tanggal" => "2021-10-06", "masuk" => 0, "keluar" => 50000, "saldo" => 0]
		);
		$cek = cekMutasi($saldoawal, $mutasi);
		return $cek;
	}

	function cekMutasi($saldoawal, $mutasi)
	{
		usort($mutasi, function ($a, $b) {
			return strtotime($a->tanggal) - strtotime($b->tanggal);
		});

		$saldo = $saldoawal;
		foreach ($mutasi as $mts => $data) {
			$mutasi[$mts]->saldo = $saldo + $data->masuk - $data->keluar;
			$saldo = $mutasi[$mts]->saldo;
		}

		return $mutasi;
	}
}
