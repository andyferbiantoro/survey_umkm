<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umkm;
use App\Exports\UmkmExport;
use Maatwebsite\Excel\Facades\Excel;
use File;




class AdminController extends Controller
{
    public function admin()
	{

		$umkm = Umkm::orderBy('id', 'DESC')->get();

		return view('admin.index',compact('umkm'));
	}


	public function admin_detail_umkm($id)
	{

		$detail_umkm = Umkm::where('id',$id)->orderBy('id', 'DESC')->get();

		
		$lat = Umkm::where('id',$id)->orderBy('id', 'DESC')->pluck('latitude');
		$long = Umkm::where('id',$id)->orderBy('id', 'DESC')->pluck('longitude');
		// $long = $detail_umkm->longitude;
		// return $lat;


		return view('admin.detail_umkm',compact('detail_umkm','lat','long'));
	}


	//eksport
	public function admin_export(){

		return Excel::download(new UmkmExport, 'Umkm.xlsx');
	}


	public function admin_update_umkm(Request $request, $id)
	{

		$data_update = Umkm::where('id', $id)->first();

		$input = [
			'nama_pelaku_usaha' => $request->nama_pelaku_usaha,
			'nama_produk' => $request->nama_produk,
			'jenis_usaha' => $request->jenis_usaha,
			'no_izin' => $request->no_izin,
			'harga' => $request->harga,
			'alamat_usaha' => $request->alamat_usaha,
			'no_hp' => $request->no_hp,
			'sosial_media' => $request->sosial_media,
			'nama_badan_hukum' => $request->nama_badan_hukum,
			'lama_usaha_berjalan' => $request->lama_usaha_berjalan,
			'kapasitas_produksi' => $request->kapasitas_produksi,
			'metode_penjualan' => $request->metode_penjualan,
			'kendala_yang_dialami' => $request->kendala_yang_dialami,

		];

		if ($file = $request->file('foto_ktp')) {
			if ($data_update->foto_ktp) {
				File::delete('uploads/foto_ktp/' . $data_update->foto_ktp);
			}
			$nama_file = $file->getClientOriginalName();
			$file->move(public_path() . '/uploads/foto_ktp/', $nama_file);
			$input['foto_ktp'] = $nama_file;
		}

		if ($file = $request->file('foto_produk')) {
			if ($data_update->foto_produk) {
				File::delete('uploads/foto_produk/' . $data_update->foto_produk);
			}
			$nama_file = $file->getClientOriginalName();
			$file->move(public_path() . '/uploads/foto_produk/', $nama_file);
			$input['foto_produk'] = $nama_file;
		}

		if ($file = $request->file('foto_lokasi_usaha')) {
			if ($data_update->foto_lokasi_usaha) {
				File::delete('uploads/foto_lokasi_usaha/' . $data_update->foto_lokasi_usaha);
			}
			$nama_file = $file->getClientOriginalName();
			$file->move(public_path() . '/uploads/foto_lokasi_usaha/', $nama_file);
			$input['foto_lokasi_usaha'] = $nama_file;
		}

		$data_update->update($input);

		return redirect()->back()->with('success', 'Data UMKM Berhasil Diupdate');
	}


	public function admin_delete_umkm($id)
	{
		$umkm = Umkm::findOrFail($id);

		

		$delete_umkm = Umkm::findOrFail($id);
		File::delete('uploads/foto_ktp/'.$delete_umkm->foto_ktp);
		File::delete('uploads/foto_produk/'.$delete_umkm->foto_produk);
		File::delete('uploads/foto_lokasi_usaha/'.$delete_umkm->foto_lokasi_usaha);
		$delete_umkm->delete();

		return redirect()->back()->with('success', 'Data Umkm Berhasil Dihapus');
	}
}
