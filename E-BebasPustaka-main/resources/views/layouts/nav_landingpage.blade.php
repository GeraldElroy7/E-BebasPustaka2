<nav class="navbar navbar-expand-lg fixed-top py-3 backdrop" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
          <a class="navbar-brand d-flex align-items-center fw-bold fs-2" href="/#Beranda"> 
            <img class="d-inline-block align-top img-fluid" src="/kp_depan/public/assets/img/gallery/logo-icon.png" alt="" width="75" />
            <span class="text-secondary fs-4 ps-2">E-Bebas Pustaka</span><span class="text-primary fs-4 ps-2">ITS</span></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0">
              @if (Auth::guard('mahasiswa')->check())
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/" id="home-btn">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/#video" id="repo-btn">Panduan</a></li>
                <li class="nav-item"><a class="nav-link" href="/#Tahapan" id="repo-btn">Tahapan</a></li>
                <li class="nav-item"><a class="nav-link" href="/#Layanan" id="repo-btn">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="/#Status" id="repo-btn">Status</a></li>
                <li class="nav-item"><a class="nav-link" href="/#Download" id="repo-btn">Download</a></li>
                <li class="nav-item"><a class="nav-link" href="/" id="notif-btn"><i class="bi bi-bell-fill"></i> Notification</a></li>
                <li class="nav-item"><a class="nav-link" href="/" id="profile-btn"><i class="bi bi-person-circle"></i> Username </a></li>
                <li class="nav-item"><a class="nav-link" id="print-btn" data-bs-toggle="modal" data-bs-target="#logoutModal" href="">Logout</a></li>  
              @elseif (Auth::guard('admin')->check())
                <li class="nav-item"><a class="nav-link" id="print-btn" data-bs-toggle="modal" data-bs-target="#logoutModal" href="">Logout</a></li>
              @else  
                @if (!Request::is('admin/*'))
                  <li class="nav-item"><a class="nav-link" href="/login" id="login-btn"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="/register" id="register-btn">Register</a></li>
                @endif
              @endif
            </ul>
        </div>
</nav>


<!-- Modal Logout-->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width:90%">
      <div class="modal-body text-center fs-2 text-black">
        Apakah anda yakin untuk logout?
      </div>
      <div class="modal-footer justify-content-center">
        <a type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Batal</a>
        @if (Auth::guard('admin')->check())
          <a type="button" href="/admin/logout" class="btn btn-danger mx-1">Logout</a>
        @else  
          <a type="button" href="/logout" class="btn btn-danger mx-1">Logout</a>
        @endif
      </div>
    </div>
  </div>
</div>