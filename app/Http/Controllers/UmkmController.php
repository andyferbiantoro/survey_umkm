<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umkm;

class UmkmController extends Controller
{

	public function index()
	{
		return view('umkm.index');
	}


	public function add_umkm(Request $request)
	{

		$data_add = new Umkm();

		$data_add->nama_pelaku_usaha = $request->input('nama_pelaku_usaha');
		$data_add->nama_produk = $request->input('nama_produk');
		$data_add->jenis_usaha = $request->input('jenis_usaha');
		$data_add->no_izin = $request->input('no_izin');
		$data_add->harga = $request->input('harga');
		$data_add->alamat_usaha = $request->input('alamat_usaha');
		$data_add->no_hp = $request->input('no_hp');
		$data_add->sosial_media = $request->input('sosial_media');
		$data_add->nama_badan_hukum = $request->input('nama_badan_hukum');
		$data_add->lama_usaha_berjalan = $request->input('lama_usaha_berjalan');
		$data_add->kapasitas_produksi = $request->input('kapasitas_produksi');
		$data_add->metode_penjualan = $request->input('metode_penjualan');
		$data_add->kendala_yang_dialami = $request->input('kendala_yang_dialami');
		$data_add->longitude = $request->input('longitude');
		$data_add->latitude = $request->input('latitude');
		
		

		if($request->hasFile('foto_ktp')){
			$file = $request->file('foto_ktp');
			$filename = $file->getClientOriginalName();
			$file->move('uploads/foto_ktp/', $filename);
			$data_add->foto_ktp = $filename;


		}else{
			echo "Gagal upload gambar";
		}

		if($request->hasFile('foto_produk')){
			$file = $request->file('foto_produk');
			$filename = $file->getClientOriginalName();
			$file->move('uploads/foto_produk/', $filename);
			$data_add->foto_produk = $filename;


		}else{
			echo "Gagal upload gambar";
		}


		if($request->hasFile('foto_lokasi_usaha')){
			$file = $request->file('foto_lokasi_usaha');
			$filename = $file->getClientOriginalName();
			$file->move('uploads/foto_lokasi_usaha/', $filename);
			$data_add->foto_lokasi_usaha = $filename;


		}else{
			echo "Gagal upload gambar";
		}


		//return $data_add;
		$data_add->save();

		return redirect()->back()
		->with('success','Data Berhasil Ditambahkan');
	}
}
