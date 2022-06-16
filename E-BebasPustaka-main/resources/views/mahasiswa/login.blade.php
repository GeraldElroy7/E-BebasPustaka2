<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
                          <p class="login-card-description mt-3" style="font-weight:bold;">Masuk ke Akun Anda</p>
                          {{-- Form Container --}}
                          <form action="/login" method="POST" enctype="multipart/form-data">
                            @csrf
                              <div class="form-floating mb-4 flex-center">
                                <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder=" " required >
                                <label for="floatingInput">Email</label>
                                @error('email')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>  
                              <div class="form-floating mb-4 flex-center">
                                <input type="password" name="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" id="floatingInput" placeholder=" " required >
                                <label for="floatingInput">Password</label>
                                @error('password')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary hover-top rounded-1">Masuk</button>
                
                                {{-- <span class="px-2 mt-3 mx-auto">Belum punya akun?</span> --}}
                                <h6 class="my-3"><span class="mx-2">Belum punya akun?</span></h6>
                
                                <a class="btn btn-outline-primary hover-top rounded-1" href="/register" role="button">Buat Akun</a>
                              </div>
                          </form>

                      </div>
                  </div>
                </div>
            </div>
          </div>

      </main>
</body>