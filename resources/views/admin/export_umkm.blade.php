<table>
	<tr>
		<td colspan="14" rowspan="2" align="center">DATA UMKM</td>
	</tr>
	<tr>
		<td></td>
	</tr>

	<tr style="border-style: solid;">
		<th>NO</th>
		<TH>NAMA PELAKU USAHA</TH>
		<TH>NAMA PRODUK</TH>
		<TH>JENIS USAHA</TH>
		<TH>NO IZIN</TH>
		<TH>HARGA</TH>
		<TH>ALAMAT USAHA</TH>
		<TH>NO HP</TH>
		<TH>SOSIAL MEDIA</TH>
		<TH>NAMA BADAN HUKUM</TH>
		<TH>LAMA USAHA BERJALAN</TH>
		<TH>KAPASITAS PRODUKSI</TH>
		<TH>METODE PENJUALAN</TH>
		<TH>KENDALA YANG DIALAMI</TH>
	</tr>

	@php $no=1 @endphp
	@foreach($umkm as $data)
	<tr class="border-b border-gray-200 hover:bg-gray-100" style="border-style: solid;" align="center">
		<td>{{$no++}}</td>
		<td>{{$data->nama_pelaku_usaha}}</td>
		<td>{{$data->nama_produk}}</td>
		<td>{{$data->jenis_usaha}}</td>
		<td>{{$data->no_izin}}</td>
		<td>{{$data->harga}}</td>
		<td>{{$data->alamat_usaha}}</td>
		<td>{{$data->no_hp}}</td>
		<td>{{$data->sosial_media}}</td>
		<td>{{$data->nama_badan_hukum}}</td>
		<td>{{$data->lama_usaha_berjalan}}</td>
		<td>{{$data->kapasitas_produksi}}</td>
		<td>{{$data->metode_penjualan}}</td>
		<td>{{$data->kendala_yang_dialami}}</td>
	</tr>
	@endforeach
</table>