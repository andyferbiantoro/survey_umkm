@extends('layouts.app')

@section('title')
Detail UMKM
@endsection


@section('content')

<div class="row">
 <div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <h4 style="color: #141b44">Selamat Datang Admin</h4>
    </div>
    <div class="card-body">
      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
      



      @foreach($detail_umkm as $data)
      <div class="row match-height">
        <!-- Greetings Card starts -->
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card">
            <div class="card-body text-left">


              <div class="text-left">
                <div class="row">

                  <div class="col-lg-6">
                   <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>Nama Pelaku Usaha</th>
                        <th>:</th>
                        <td>{{$data->nama_pelaku_usaha}}</td>
                      </tr> 

                      <tr>
                        <th>Nama Produk</th>
                        <th>:</th>
                        <td>{{$data->nama_produk}}</td>
                      </tr> 

                      <tr>
                        <th>No Izin</th>
                        <th>:</th>
                        <td>{{$data->no_izin}}</td>
                      </tr>

                      <tr>
                        <th>Harga /pcs</th>
                        <th>:</th>
                        <td>Rp. <?=number_format($data->harga, 0, ".", ".")?>,00</td>
                      </tr>

                      <tr>
                        <th>Alamat Usaha</th>
                        <th>:</th>
                        <td>{{$data->alamat_usaha}}</td>
                      </tr>

                      <tr>
                        <th>No HP</th>
                        <th>:</th>
                        <td>{{$data->no_hp}}</td>
                      </tr>

                    </table>
                  </div>
                </div>


                <div class="col-lg-6">
                 <div class="table-responsive">
                  <table class="table table-striped">
                    <tr>
                      <th>Sosial Media</th>
                      <th>:</th>
                      <td>{{$data->sosial_media}}</td>
                    </tr> 

                    <tr>
                      <th>Nama badan Hukum</th>
                      <th>:</th>
                      <td>{{$data->nama_badan_hukum}}</td>
                    </tr> 

                    <tr>
                      <th>Lama Usaha Berjalan</th>
                      <th>:</th>
                      <td>{{$data->lama_usaha_berjalan}}</td>
                    </tr> 

                    <tr>
                      <th>Kapasitas Produksi</th>
                      <th>:</th>
                      <td>{{$data->kapasitas_produksi}}</td>
                    </tr> 

                    <tr>
                      <th>Metode Penjualan</th>
                      <th>:</th>
                      <td>{{$data->metode_penjualan}}</td>
                    </tr> 

                    <tr>
                      <th>Kendala yang Dihadapi</th>
                      <th>:</th>
                      <td>{{$data->kendala_yang_dialami}}</td>
                    </tr> 


                  </table>
                </div>
              </div>
            </div>

            <div class="col-lg-12 text-center">

              <img style="border-radius: 0%; height: 200px; width: auto;"  src="{{asset('uploads/foto_produk/'.$data->foto_produk)}}">
              <p>Foto Produk</p>
            </div>
            <hr><br>

            <div class="col-lg-12 text-center">

              <img style="border-radius: 0%; height: 200px; width: auto;"  src="{{asset('uploads/foto_ktp/'.$data->foto_ktp)}}">
              <p>Foto KTP</p>
            </div>
            <hr><br>


            <div class="col-lg-12 text-center">

              <img style="border-radius: 0%; height: 200px; width: auto;"  src="{{asset('uploads/foto_lokasi_usaha/'.$data->foto_lokasi_usaha)}}">
              <p>Foto Lokasi Usaha</p>
            </div>
            <hr><br>

            <!-- <div class="col-lg-12 text-center"> 
             <div id="googleMap" style="width: 100%; height: 420px; border-radius: 3px;"></div>
             <p>Maps Lokasi Usaha</p>
           </div> -->


         </div>
       </div>
     </div>
   </div>
 </div>
 @endforeach


</div>
</div>
</div>
</div>


@endsection

@section('scripts')
<!-- ====================== Input Map ====================== -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


<script type="text/javascript">

function initialize() {

  var propertiPeta = {

    center: new google.maps.LatLng(<?php echo  $lat; ?>,<?php echo  $long; ?>),

     zoom: 14,

    mapTypeId:google.maps.MapTypeId.ROADMAP

  };

 

  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

 

  // membuat Marker

  var marker=new google.maps.Marker({

      position: new google.maps.LatLng(<?php echo  $lat; ?>, <?php echo  $long; ?>),

      map: peta

  });

}

</script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDv-h2II7DbFQkpL9pDxNRq3GWXqS5Epts&callback=initialize"
  type="text/javascript"></script>
<!-- ====================== End Input Map ====================== -->

@endsection


