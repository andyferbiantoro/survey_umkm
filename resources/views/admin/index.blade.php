@extends('layouts.app')

@section('title')
AURA Admin
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <h4 style="color: #141b44">Selamat Datang Admin</h4><br>
    </div>


    <div class="card-body">
      <a href="{{ route('admin_export') }}"><button class="btn btn-success">Export Excel</button></a><br><br>
      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
      <div class="table-responsive">
        <table id="dataTable" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pelaku Usaha</th>
              <th>Nama Produk</th>
              <th>Jenis Usaha</th>
              <th>Foto Produk</th>
              <th>Opsi</th>
              <th style="display: none;">hidden no izin</th>
              <th style="display: none;">hidden harga</th>
              <th style="display: none;">hidden alamat</th>
              <th style="display: none;">hidden nohp</th>
              <th style="display: none;">hidden sosmed</th>
              <th style="display: none;">hidden nama bdan hukum</th>
              <th style="display: none;">hidden lama usaha</th>
              <th style="display: none;">hidden kpasitas</th>
              <th style="display: none;">hidden metode penjualan</th>
              <th style="display: none;">hidden kendala</th>

              <th style="display: none;">hidden</th>
            </tr>
          </thead>
          <tbody>
           @php $no=1 @endphp
           @foreach($umkm as $data)
           <tr>
            <td>{{$no++}}</td>
            <td>{{$data->nama_pelaku_usaha }}</td>
            <td>{{$data->nama_produk }}</td>
            <td>{{$data->jenis_usaha }}</td>
            <td><img style="border-radius: 0%" height="70" id="ImageTampil" src="{{asset('uploads/foto_produk/'.$data->foto_produk)}}"  data-toggle="modal" data-target="#myModal"></img></td>

            <td>
             <a href="{{ route('admin_detail_umkm',$data->id) }}"><button class="btn btn-warning btn-sm ">Detail</button></a> 

             <button class="btn btn-primary btn-sm edit" title="Edit">Edit</button>

             <a href="#" data-toggle="modal" onclick="deleteData({{$data->id}})" data-target="#DeleteModal">
              <button class="btn btn-danger btn-sm"  title="Hapus">Hapus</button>
            </a>

          </td>
          <td style="display: none;">{{$data->no_izin}}</td>
          <td style="display: none;">{{$data->harga}}</td>
          <td style="display: none;">{{$data->alamat_usaha}}</td>
          <td style="display: none;">{{$data->no_hp}}</td>
          <td style="display: none;">{{$data->sosial_media}}</td>
          <td style="display: none;">{{$data->nama_badan_hukum}}</td>
          <td style="display: none;">{{$data->lama_usaha_berjalan}}</td>
          <td style="display: none;">{{$data->kapasitas_produksi}}</td>
          <td style="display: none;">{{$data->metode_penjualan}}</td>
          <td style="display: none;">{{$data->kendala_yang_dialami}}</td>
          <td style="display: none;">{{$data->id}}</td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


</div>
</div>
</div>
</div>



<!-- Modal Update -->
      <div id="updateInformasi" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!--Modal content-->
         <form action="" id="updateInformasiform" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Anda yakin ingin memperbarui Data UMKM ini ?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {{ csrf_field() }}
              {{ method_field('POST') }}

              <div class="form-group">
          <label for="nama_pelaku_usaha">Nama Pelaku Usaha</label>
          <input type="text" class="form-control" id="nama_pelaku_usaha_update" name="nama_pelaku_usaha"  required=""></input>
        </div>

        <div class="form-group">
          <label for="nama_produk">Nama Produk</label>
          <input type="text" class="form-control" id="nama_produk_update" name="nama_produk"  required=""></input>
        </div>

        <div class="form-group form-success">
          <label>Jenis Usaha</label>
          <select  name="jenis_usaha" id="jenis_usaha_update" class="form-control"  required="">
           <option selected disabled> -- Pilih Jenis Usaha -- </option>
           <option value="Perikanan">Perikanan</option>
           <option value="Pertanian">Pertanian</option>
           <option value="Jasa">Jasa</option>
           <option value="Kerajinan">Kerajinan</option>
         </select>
         <span class="form-bar"></span>
       </div>

       <div class="form-group">
        <label for="no_izin">Nomor Izin PIRT/BPOM (OPSIONAL)</label>
        <input type="text" class="form-control" id="no_izin_update" name="no_izin"></input>
      </div>

      <div class="form-group">
        <label for="harga">Harga/pcs</label>
        <input type="number" class="form-control" id="harga_update" name="harga"  required=""></input>
      </div>

      <div class="form-group">
        <label for="alamat_usaha">Alamat Usaha</label>
        <input type="text" class="form-control" id="alamat_usaha_update" name="alamat_usaha"  required=""></input>
      </div>

      <div class="form-group">
        <label for="no_hp">No HP (WA)</label>
        <input type="text" class="form-control" id="no_hp_update" name="no_hp"  required=""></input>
      </div>

      <div class="form-group">
        <label for="sosial_media">Sosial Media</label>
        <input type="text" class="form-control" id="sosial_media_update" name="sosial_media"  required=""></input>
      </div>

      <div class="form-group">
        <label for="nama_badan_hukum">Nama Badan Hukum</label>
        <input type="text" class="form-control" id="nama_badan_hukum_update" name="nama_badan_hukum"  required=""></input>
      </div>

      <div class="form-group">
        <label for="lama_usaha_berjalan">Lama Usaha Berjalan</label>
        <input type="text" class="form-control" id="lama_usaha_berjalan_update" name="lama_usaha_berjalan"  required=""></input>
      </div>

      <div class="form-group">
        <label for="kapasitas_produksi">Kapasitras Produksi /bulan</label>
        <input type="number" class="form-control" id="kapasitas_produksi_update" name="kapasitas_produksi"  required=""></input>
      </div>

      <div class="form-group">
        <label for="metode_penjualan">Metode Penjualan</label>
        <input type="text" class="form-control" id="metode_penjualan_update" name="metode_penjualan"  required=""></input>
      </div>

      <div class="form-group">
        <label for="foto_ktp">Foto KTPP</label>
        <input type="file" class="form-control" id="foto_ktp_update" name="foto_ktp" ></input>
      </div>

      <div class="form-group">
        <label for="foto_produk">Foto Produk</label>
        <input type="file" class="form-control" id="foto_produk_update" name="foto_produk" ></input>
      </div>

      <div class="form-group">
        <label for="foto_lokasi_usaha">Foto Lokasi Usaha</label>
        <input type="file" class="form-control" id="foto_lokasi_usaha_update" name="foto_lokasi_usaha" ></input>
      </div>

      <div class="form-group">
        <label for="kendala_yang_dialami">Kendala yang Dialami</label>
        <textarea type="text" class="form-control" id="kendala_yang_dialami_update" name="kendala_yang_dialami"  required=""></textarea>
      </div>


            </div> 
            <div class="modal-footer">
              <button type="submit"  class="btn btn-primary float-right mr-2" >Perbarui</button>
              <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </form>
      </div>
    </div>




<!-- Modal konfirmasi Hapus -->
<div id="DeleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <form action="" id="deleteForm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Data UMKM</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}
          {{ method_field('POST') }}
          <p>Apakah anda yakin ingin menghapus data UMKM ini ?</p>
          <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
          <button type="submit" name="" class="btn btn-danger float-right mr-2" data-dismiss="modal" onclick="formSubmit()">Hapus</button>
        </div>
      </div>
    </form>
  </div>
</div> 





<!-- show Foto -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body text-center">
        <img src="" id="img01" style="width: 450px; height: auto;" >
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')
<script type="text/javascript">
  function deleteData(id) {
    var id = id;
    var url = '{{route("admin_delete_umkm", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
  }
  function formSubmit() {
    $("#deleteForm").submit();
  }
</script>


<script>
    $(document).ready(function() {
      var table = $('#dataTable').DataTable();
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
      }
      var data = table.row($tr).data();
      console.log(data);
      $('#nama_pelaku_usaha_update').val(data[1]);
      $('#nama_produk_update').val(data[2]);
      $('#jenis_usaha_update').val(data[3]);
      $('#no_izin_update').val(data[6]);
      $('#harga_update').val(data[7]);
      $('#alamat_usaha_update').val(data[8]);
      $('#no_hp_update').val(data[9]);
      $('#sosial_media_update').val(data[10]);
      $('#nama_badan_hukum_update').val(data[11]);
      $('#lama_usaha_berjalan_update').val(data[12]);
      $('#kapasitas_produksi_update').val(data[13]);
      $('#metode_penjualan_update').val(data[14]);
      $('#kendala_yang_dialami_update').val(data[15]);

      $('#updateInformasiform').attr('action','admin_update_umkm/'+ data[16]);
      $('#updateInformasi').modal('show');
  });
  });
</script>


@endsection

