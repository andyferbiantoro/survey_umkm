@extends('layouts.app')

@section('title')
AURA
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <h4 style="color: #141b44">Selamat Datang di AURA</h4>
    </div>
    <div class="card-body">
      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
      <form method="post" action="{{route('add_umkm')}}" enctype="multipart/form-data">


        {{csrf_field()}}



        <div class="form-group">
          <label for="nama_pelaku_usaha">Nama Pelaku Usaha</label>
          <input type="text" class="form-control" id="nama_pelaku_usaha" name="nama_pelaku_usaha"  required=""></input>
        </div>

        <div class="form-group">
          <label for="nama_produk">Nama Produk</label>
          <input type="text" class="form-control" id="nama_produk" name="nama_produk"  required=""></input>
        </div>

        <div class="form-group form-success">
          <label>Jenis Usaha</label>
          <select  name="jenis_usaha" class="form-control"  required="">
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
        <input type="text" class="form-control" id="no_izin" name="no_izin"></input>
      </div>

      <div class="form-group">
        <label for="harga">Harga/pcs</label>
        <input type="number" class="form-control" id="harga" name="harga"  required=""></input>
      </div>

      <div class="form-group">
        <label for="alamat_usaha">Alamat Usaha</label>
        <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha"  required=""></input>
      </div>

      <div class="form-group">
        <label for="no_hp">No HP (WA)</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp"  required=""></input>
      </div>

      <div class="form-group">
        <label for="sosial_media">Sosial Media</label>
        <input type="text" class="form-control" id="sosial_media" name="sosial_media"  required=""></input>
      </div>

      <div class="form-group">
        <label for="nama_badan_hukum">Nama Badan Hukum</label>
        <input type="text" class="form-control" id="nama_badan_hukum" name="nama_badan_hukum"  required=""></input>
      </div>

      <div class="form-group">
        <label for="lama_usaha_berjalan">Lama Usaha Berjalan</label>
        <input type="text" class="form-control" id="lama_usaha_berjalan" name="lama_usaha_berjalan"  required=""></input>
      </div>

      <div class="form-group">
        <label for="kapasitas_produksi">Kapasitras Produksi /bulan</label>
        <input type="number" class="form-control" id="kapasitas_produksi" name="kapasitas_produksi"  required=""></input>
      </div>

      <div class="form-group">
        <label for="metode_penjualan">Metode Penjualan</label>
        <input type="text" class="form-control" id="metode_penjualan" name="metode_penjualan"  required=""></input>
      </div>

      <div class="form-group">
        <label for="foto_ktp">Foto KTPP</label>
        <input type="file" class="form-control" id="foto_ktp" name="foto_ktp"  required=""></input>
      </div>

      <div class="form-group">
        <label for="foto_produk">Foto Produk</label>
        <input type="file" class="form-control" id="foto_produk" name="foto_produk"  required=""></input>
      </div>

      <div class="form-group">
        <label for="foto_lokasi_usaha">Foto Lokasi Usaha</label>
        <input type="file" class="form-control" id="foto_lokasi_usaha" name="foto_lokasi_usaha"  required=""></input>
      </div>

      <div class="form-group">
        <label for="kendala_yang_dialami">Kendala yang Dialami</label>
        <textarea type="text" class="form-control" id="kendala_yang_dialami" name="kendala_yang_dialami"  required=""></textarea>
      </div>

      <!-- <div class="row">
        <div class="col-lg-6 col-sm-12 col-12">
         <label for="kendala_yang_dialami">Titik Lokasi </label>
         <div id="mapInput" data-tap-disabled="true" style="width: 100%; height: 320px; border-radius: 3px;"></div>
         <p>klik satu kali untuk menentukan posisi</p>
       </div>
       <div class="col-lg-6 col-sm-12 col-12">

        <div class="form-group">
          <label for="latitude">Latitude</label>
          <div class="input-group">
            <input type="number" step="any" id="lat" name="latitude" class="form-control"
            required>
          </div>
        </div>
        <div class="form-group">
          <label for="longitude">Longitude</label>
          <div class="input-group">
            <input name="longitude" step="any" id="leng" type="number" class="form-control"
            required>
          </div>
        </div>
      </div>
    </div> -->




  </div>
  <div class="modal-footer">
    <button class="btn btn-primary" type="Submit">Submit Data UMKM</button>
    <!--  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button> -->

  </div>
</form>


</div>
</div>
</div>
</div>

         
          @endsection

          @section('scripts')
          <!-- ====================== Input Map ====================== -->

    <script>
        function initialize() {
            //Cek Support Geolocation
            if (navigator.geolocation) {
                //Mengambil Fungsi golocation
                navigator.geolocation.getCurrentPosition(lokasi);
            } else {
                swal("Maaf Browser tidak Support HTML 5");
            }
            //Variabel Marker
            var marker;

            function taruhMarker(peta, posisiTitik) {

                if (marker) {
                    // pindahkan marker
                    marker.setPosition(posisiTitik);
                } else {
                    // buat marker baru
                    marker = new google.maps.Marker({
                        position: posisiTitik,
                        map: peta,
                        icon: 'https://img.icons8.com/plasticine/40/000000/marker.png',
                    });
                }

            }
            //Buat Peta
            var peta = new google.maps.Map(document.getElementById("mapInput"), {
                center: {
                    lat: -8.408698,
                    lng: 114.2339090
                },
                zoom: 9
            });
            //Fungsi untuk geolocation
            function lokasi(position) {
                //Mengirim data koordinat ke form input
                document.getElementById("lat").value = position.coords.latitude;
                document.getElementById("leng").value = position.coords.longitude;
                //Current Location
                var lat = position.coords.latitude;
                var long = position.coords.longitude;
                var latlong = new google.maps.LatLng(lat, long);
                //Current Marker 
                var currentMarker = new google.maps.Marker({
                    position: latlong,
                    icon: 'https://img.icons8.com/plasticine/40/000000/user-location.png',
                    map: peta,
                    title: "Anda Disini",
                    optimized: false
                });
                //Membuat Marker Map dengan Klik
                var latLng = new google.maps.LatLng(-8.408698, 114.2339090);

                var addMarkerClick = google.maps.event.addListener(peta, 'mousedown', function(event) {


                    taruhMarker(this, event.latLng);

                    //Kirim data ke form input dari klik
                    document.getElementById("lat").value = event.latLng.lat();
                    document.getElementById("leng").value = event.latLng.lng();

                });


            }

        }

    </script>
    <!-- ====================== End Input Map ====================== -->

     <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDv-h2II7DbFQkpL9pDxNRq3GWXqS5Epts&callback=initialize"
        type="text/javascript"></script>
          @endsection


