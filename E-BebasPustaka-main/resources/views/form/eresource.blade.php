@extends('layouts/landingpage')

@section('content')

      <section class="py-0" id="form">
        <div class="bg-holder d-none d-md-block" style="background-image:url(kp_depan/public/assets/img/illustrations/undraw_Bookshelves_re_lxoy.png);background-position: left 112vh top;;background-size:contain; background-size: 105vh; ">
        </div>
        <!--/.bg-holder-->

        <div class="container position-relative">
          <div class="row align-items-center min-vh-75 my-lg-8">
            <div class="col-md-7 col-lg-7 text-center text-md-start py-8">
              <h1 class="mb-4 fs-7 display-1 lh-sm">E-Resource Delivery</h1>
              <p class="mt-2 mb-2 fs-1 lh-base">
                
                Layanan ini merupakan layanan pengiriman sumber daya elektronik (khususnya artikel E-Journal atau E-Book) yang dibutuhkan oleh pengguna yang kesulitan mendapatkan akses penuh (full text) artikel yang dibutuhkan artikel E-Journal atau E-Book dengan memanfaatkan jaringan yang dimiliki.

              </p>
              <br class="d-none d-lg-block" />
              <p class="lh-sm">
                Cari E-Journal Anda untuk menemukan artikel dan E-Book yang Anda butuhkan.
              </p>
              <p>
                Jika artikel E-Journal atau E-Book Anda tidak tersedia, Anda dapat meminta melalui layanan ini.
              </p>
              <div class="col-md-12">
                <a class="btn btn-lg btn-primary hover-top rounded-1" style="border-radius:50px ;" href="#Form" role="button">Lebih Lanjut</a>
              </div>
            </div>
          </div>
        </div>
      </section>

    <section class="py-0" id="Form">

      <div class="container">
        <div class="row flex-md-center">
          <div class="col-md-11 col-lg-4 py-md-3 px-4 px-md-3 px-lg-0 px-xl-2 order-lg-1">
            <h1 class="fw-bold fs-md-3 fs-xl-5">Form E-Resource Delivery</h1>
            <hr class="text-primary my-4 my-lg-3 my-xl-4" style="height:3px; width:70px;" />
            <p class="lh-lg">
              Permintaan artikel E-Journal atau E-Book akan dikirim melalui email. 
              <ul>
                <li>Layanan ini diberikan secara gratis untuk Sivitas Akademika ITS.</li>
                <li>Respon layanan ini maksimal 2x24 jam </li>
              </ul> 
            </p>
            <p class="lh-lg">
              Petunjuk Pengisian              
              <ul>
                <li>Isi dengan Nama Lengkap</li>
                <li>Permintaan ini hanya disampaikan melalui email ITS (domain ITS | .its.ac.id).   
                  <p style="color: #5065ac;"> contoh@mhs.its.ac.id </p>
                </li>
                <li>Isikan No KTP jika anda pengguna luar,NRP untuk Mahasiswa ITS </li>
                <li>Contoh Judul : Programming Rust: Fast, Safe Systems Development 2nd Edition</li>
                <li>Contoh Pengarang : Jim Blandy , Jason Orendorff 2021</li>
                <li>isi dengan link pembelian buku atau sumber buku seperti link pembelian buku di toko online (tambahkan ' https:/ ' didepannya)
                  <a href="https://www.amazon.com/Programming-Rust-Fast-Systems-Development/dp/1492052590?ref_=Oct_s9_apbd_obs_hd_bw_b9sB58t&pf_rd_r=PRR777VD9E2D7T9PC177&pf_rd_p=aad2d181-110f-5f7d-b8e7-e578c9910493&pf_rd_s=merchandised-search-10&pf_rd_t=BROWSE&pf_rd_i=9045759011">
                    https://www.amazon.com/Programming-R...
                  </a>  
                </li>
              </ul> 
              <p class="mb-1"> Tanyakan melalui whatsapp jika terdapat pertanyaan                  
                <a class="btn btn-outline-success btn-sm mt-2" href="#" type="button" >
                  whatsapp
                  <i class="fab fa-whatsapp"></i>
                </a>
              </p>
            </p>  
             {{-- <a class="btn btn-lg btn-primary hover-top" href="#" role="button">Explore</a>  --}}
          
          </div>
          
          <div class="col-lg-8 order-lg-0 order-1 px-4 px-md-3 py-8 py-md-3">
            <div class="mt-4 mb-3 ml-3">
              <a class="btn btn-lg btn-secondary hover-top rounded-1"  href="/" role="button"><i class="fas fa-chevron-left"></i>  kembali ke laman utama</a>
            </div>
        
            <form action="/resource" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-floating mb-3 flex-center">
                <input type="text" name="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror" id="floatingInput" placeholder=" " >
                <label for="floatingInput">Nama Lengkap</label>
                @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="row g-2">
              <div class="form-floating mb-3 col-4 flex-center">
                <input type="text" name="no_hp" value="{{old('no_hp')}}" class="form-control @error('no_hp') is-invalid @enderror"  id="floatingInput" placeholder=" " >
                <label for="floatingInput">No Hp</label>
                @error('no_hp')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-floating mb-3 col-8 flex-center">
                <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"  id="floatingInput" placeholder=" " >
                <label for="floatingInput">E-mail</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              </div>
              <div class="row g-2">
                <div class="form-floating mb-3 col-6 flex-center">
                  <input type="text" name="institusi" value="{{old('institusi')}}" class="form-control @error('institusi') is-invalid @enderror"  id="floatingInput" placeholder=" " >
                  <label for="floatingInput">Fakultas/Institusi</label>
                  @error('institusi')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                </div>
                <div class="form-floating mb-3 col-6 flex-center">
                  <input type="text" name="nid" value="{{old('nid')}}" class="form-control @error('nid') is-invalid @enderror"  id="floatingInput" placeholder=" " >
                  <label for="floatingInput">NIP / NRP / KTP</label>
                  @error('nid')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                </div>
              </div>

              <div class="form-floating mb-3 flex-center">
                <select class="form-select @error('status') is-invalid @enderror" name="status" value="{{old('status')}}" id="floatingSelect"style="height: 70px" aria-label="Floating label select example" required >
                  <option value= >Pilih Salah Satu</option>
                  <option value="Mahasiswa ITS" @if (old('status') == 'Mahasiswa ITS') selected="selected" @endif>Mahasiswa ITS</option>
                  <option value="Dosen/Tendik ITS" @if (old('status') == 'Dosen/Tendik ITS') selected="selected" @endif>Dosen/Tendik ITS</option>
                </select>
                <label for="floatingSelect">Status</label>
                @error('status')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror

              </div>

              <div class="form-floating mb-3 flex-center">
                <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" value="{{old('kategori')}}" id="floatingSelect" aria-label="Floating label select example" required>
                  <option value= >Pilih Salah Satu</option>
                  <option value="Artikel E-Journal" @if (old('kategori') == 'Artikel E-Journal') selected="selected" @endif>Artikel E-Journal (SNI dll)</option>
                  <option value="E-Book" @if (old('kategori') == 'E-Book') selected="selected" @endif>E-Book (SNI dll)</option>
                  <option value="E-Proceeding" @if (old('kategori') == 'E-Proceeding') selected="selected" @endif>E-Proceeding</option>
                  <option value="Standard" @if (old('kategori') == 'Standard') selected="selected" @endif>Standard (SNI dll)</option>
                  <option value="Topik khusus" @if (old('kategori') == 'Topik khusus') selected="selected" @endif>Topik khusus</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
                <label for="floatingSelect">Kategori E-Resource delivery</label>
                @error('kategori')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="row g-2">
              <div class="form-floating mb-3 col-9 flex-center">
                <input type="text" name="judul" value="{{old('judul')}}" class="form-control @error('judul') is-invalid @enderror"  id="floatingInput" placeholder=" " >
                <label for="judul">Judul</label>
                @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>        
              <div class="form-floating mb-3 col-3 flex-center">
                <input type="text" name="tahun" value="{{old('tahun')}}" class="form-control @error('tahun') is-invalid @enderror"  id="floatingInput" placeholder=" " >
                <label for="floatingInput">Tahun</label>
                @error('tahun')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              </div>
              <div class="row g-2"> 
              <div class="form-floating mb-3 col-6 flex-center">
                <input type="text" name="pengarang" value="{{old('pengarang')}}" class="form-control @error('pengarang') is-invalid @enderror"  id="floatingInput" placeholder=" " >
                <label for="floatingInput">Pengarang</label>
                @error('pengarang')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>          
              <div class="form-floating mb-3 col-6 flex-center">
                <input type="text" name="link" value="{{old('link')}}" class="form-control @error('link') is-invalid @enderror"  id="floatingInput" placeholder=" " >
                <label for="floatingInput">Link Halaman Website E-Journal </label>
                @error('link')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              </div>

              <div class="form-floating mb-3 flex-center">
                <input type="text" name="keterangan" value="{{old('keterangan')}}" class="form-control @error('keterangan') is-invalid @enderror"  id="floatingInput" style="height: 100px" placeholder="keterangan" >
                <label for="floatingInput"></label>
                @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              {{-- <button type="submit" class="btn btn-primary">Submit Form</button>               --}}

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Simpan
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      {{-- <h5 class="modal-title" id="exampleModalLabel"></h5> --}}
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      pastikan bahwa data yang diisikan sudah benar agar permintaan dapat diproses!
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan dan Lanjutkan</button>
                    </div>
                  </div>
                </div>
              </div>

            </form> 

          </div>
        </div>
      </div>

    </section>

  
@endsection
