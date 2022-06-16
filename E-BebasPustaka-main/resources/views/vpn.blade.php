@extends('layouts/landingpage')

@section('content')

{{-- {{dd($nama)}} --}}

<div class="container">

  <div class="p-5 rounded-lg mt-8" style="background-color: #ebf6fd;">
    <h1>Off-Campus VPN Access ITS <i class="fas fa-network-wired"></i></h1>
    <p class="my-5">
      Untuk mengakses E-journal dan E-Books dari luar ITS oleh Sivitas Akademika ITS, silahkan menggunakan VPN (Virtual Private Network) sesuai dengan sistem yang digunakan. Melalui akun VPN, setiap pengguna layanan internet dapat melakukan login ke jaringan kampus meskipun tidak berada di lingkungan kampus ITS.
    </p>
    <hr class="my-4" size="5" style="color: black">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-body ">
            <h5 class="card-title">Panduan VPN di Windows
              <img src="kp_depan/public/assets/img/icons/windows.png" alt="..." style="width: 50px; height: 50px;">
            </h5>
            <p class="card-text"> file pdf</p>
            <a href="https://www.its.ac.id/dptsi/wp-content/uploads/sites/8/2020/08/Panduan_Setting_VPN_di_Windows.pdf" class="btn btn-outline-primary" target="_blank" rel="noopener noreferrer">Unduh Panduan <i class="fas fa-cloud-download-alt"></i></a>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card ">
          <div class="card-body ">
            <h5 class="card-title">Panduan VPN di Android
              <img src="kp_depan/public/assets/img/icons/android.png" alt="..." style="width: 50px; height: 50px;">
            </h5>
            <p class="card-text">file pdf google drive</p>
            
            <a href="https://drive.google.com/file/d/11QB9hnoo5T-KLOnt6qbLwQkp95wBgjyG/view" class="btn btn-outline-primary" target="_blank" rel="noopener noreferrer">Unduh Panduan <i class="fas fa-cloud-download-alt"></i></a>
          </div> 
        </div>
      </div>
     
      <div class="mt-4 mb-0 mx-3">
        <a class="btn btn-lg btn-secondary hover-top rounded-1"  href="/" role="button"><i class="fas fa-chevron-left"></i>  kembali ke laman utama</a>    
      </div>
  
    </div>    
     
  </div>

          

</div>


@endsection
