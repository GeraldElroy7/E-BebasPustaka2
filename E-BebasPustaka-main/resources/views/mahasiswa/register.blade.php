<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="kp_depan/public/assets/css/theme.css" rel="stylesheet" />
    
</head>
<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container" style="padding-top:70px;padding-bottom:70px;">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <img src="kp_depan/public/assets/img/illustrations/undraw_Envelope_re_f5j4.png" alt="login" class="login-card-img">
                    </div>
                    <!-- <div class="col-md-1"></div> -->
                    <div class="col-md-6">
                        <div class="card-body">
                          <a style="color:black"  href="/">
                              <img src="kp_depan/public/assets/img/gallery/logo-icon.png" alt="" width="75" />   
                          </a>
                          <span class="fs-4 ps-2" style="font-size: xx-large;">E-Bebas Pustaka ITS</span>
                          <p class="login-card-description mt-3" style="font-weight:bold;">Daftarkan Akun Anda</p>
                          {{-- Form Container --}}
                        <div class="">
                          <form action="/register" method="POST" enctype="multipart/form-data">
                            @csrf
                              <div class="form-floating mb-3 flex-center">
                                <input type="text" name="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror" id="floatingInput" placeholder=" " required >
                                <label for="floatingInput">Nama Lengkap</label>
                                @error('nama')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                              </div> 
                              <div class="form-floating mb-3 flex-center">
                                <input type="text" name="nrp" value="{{old('nrp')}}" class="form-control @error('nrp') is-invalid @enderror" id="floatingInput" placeholder=" " required >
                                <label for="floatingInput">NRP</label>
                                @error('nrp')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                              </div>
                              <div class="form-floating mb-3 flex-center">
                                  <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder=" " required >
                                  <label for="floatingInput">E-mail</label>
                                  @error('email')
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              <div class="form-floating mb-3 flex-center">
                                  <input type="text" name="telp" value="{{old('telp')}}" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder=" " required >
                                  <label for="floatingInput">Nomor Telepon (WhatsApp)</label>
                                  @error('email')
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              <div class="form-floating mb-3 flex-center">
                                  <select class="form-select @error('jenjang') is-invalid @enderror" name="jenjang" value="{{old('jenjang')}}" id="floatingSelect"style="height: 70px" aria-label="Floating label select example" required>
                                    <option value= >Pilih Salah Satu</option>
                                    <option value="D3" >D3</option>
                                    <option value="D4" >D4</option>
                                    <option value="S1" >S1</option>
                                    <option value="S2" >S2</option>
                                    <option value="S3" >S3</option>
                                    <option value="Profesi" >Pilih Salah Satu</option>
                                  </select>
                                  <label for="floatingSelect">Jenjang</label>
                                  @error('jenjang')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                              </div>
                              <div class="form-floating mb-3 flex-center">
                                <select class="form-select @error('fakultas') is-invalid @enderror" name="fakultas" value="{{old('fakultas')}}" id="floatingSelect"style="height: 70px" aria-label="Floating label select example" required>
                                  <option value= >Pilih Salah Satu</option>
                                  <option value="Fakultas Sains dan Analitika Data">Fakultas Sains dan Analitika Data</option>
                                  <option value="Fakultas Teknologi Industri dan Rekayasa Sistem">Fakultas Teknologi Industri dan Rekayasa Sistem</option>
                                  <option value="Fakultas Teknik Sipil, Perencanaan, dan Kebumian">Fakultas Teknik Sipil, Perencanaan, dan Kebumian</option>
                                  <option value="Fakultas Teknologi Kelautan">Fakultas Teknologi Kelautan</option>
                                  <option value="Fakultas Teknologi Elektro dan Informatika Cerdas">Fakultas Teknologi Elektro dan Informatika Cerdas</option>
                                  <option value="Fakultas Desain Kreatif da Bisnis Digital">Fakultas Desain Kreatif da Bisnis Digital</option>
                                  <option value="Fakultas Vokasi">Fakultas Vokasi</option>
                                </select>
                                <label for="floatingSelect">Fakultas</label>
                                  @error('fakultas')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                              </div>
                              <div class="form-floating mb-3 flex-center">
                                  <input type="text" name="departemen" value="{{old('departemen')}}" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder=" " required >
                                  <label for="floatingInput">Departemen</label>
                                  @error('email')
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              <div class="form-floating mb-3 flex-center">
                                  <input type="text" name="judulTA" value="{{old('judulTA')}}" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder=" " required >
                                  <label for="floatingInput">Judul TA</label>
                                  @error('email')
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              
                              <div class="form-floating mb-3 flex-center">
                                <input type="password" name="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" id="floatingInput" placeholder=" " required >
                                <label for="floatingInput">Password</label>
                                @error('password')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <div class="form-floating mb-3 flex-center">
                                <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingInput" placeholder=" " required >
                                <label for="floatingInput">Konfirmasi Password</label>
                                @error('password_confirmation')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>

                              <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary hover-top rounded-1">Daftar</button>
                                {{-- <span class="px-2 mt-3 mx-auto">Sudah punya akun?</span> --}}
                                <h6 class="my-3"><span class="mx-2">Sudah punya akun?</span></h6>
                
                                <a class="btn btn-outline-primary hover-top rounded-1" href="/login" role="button">Masuk</a>
                              </div>
                          </form>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>

      </main>
</body>
