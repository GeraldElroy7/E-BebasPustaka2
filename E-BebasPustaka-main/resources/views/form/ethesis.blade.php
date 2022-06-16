@extends('layouts.landingpage')

{{-- <main class="main" id="top"> --}}
@section('content')

  <section class="py-0" >
    <div class="bg-holder d-none d-md-block" style="background-image:url(kp_depan/public/assets/img/illustrations/undraw_Notebook_re_id0r.png);background-position: right 10px bottom 45%;;background-size:contain; background-size: 125vh; ">
    </div>
    <!--/.bg-holder-->

    <div class="container position-relative">
      <div class="row align-items-center min-vh-75 my-lg-8">
        <div class="col-md-7 col-lg-6 text-center text-md-start py-8">
          <h1 class="mb-4 fs-7 display-1 lh-sm">E-Thesis Delivery</h1>
          <p class="mt-2 fs-1 lh-base">
            Layanan ini adalah layanan pengiriman konten Lokal ITS elektronik (khusus Tugas Akhir, Tesis, dan Disertasi) yang dibutuhkan oleh pengguna (Sivitas Akademika ITS) dan Alumni ITS yang kesulitan mendapatkan akses penuh   
            (full text) karya ilmiah ITS elektronik yang tersedia di Repository ITS
            <a href="http://repository.its.ac.id/">(http://repository.its.ac.id/)</a>.
          </p>
          <br class="d-none d-lg-block" />
          <div class="col-md-12">
            <a class="btn btn-lg btn-primary hover-top rounded-1" style="border-radius:50px ;" href="#Form" role="button">Lebih Lanjut</a>
          </div></div>
      </div>
    </div>
  </section>


  <section class="py-0" id="Form">

    <div class="container">
      <div class="row flex-md-center">
        <div class="col-md-11 col-lg-4 py-md-3 px-4 px-md-3 px-lg-0 px-xl-2 order-lg-1">
          <h1 class="fw-bold fs-md-3 fs-xl-5">Form E-Thesis Delivery</h1>
          <hr class="text-primary my-4 my-lg-3 my-xl-4" style="height:3px; width:70px;" />
          <p class="lh-lg">
            Untuk permintaan konten lokal ITS elektronik (khusus Tugas Akhir, Skripsi, dan Disertasi) lampirkan foto KTM (Mahasiswa ITS) atau foto KTP 
          </p>
          <p class="lh-lg">
            Petunjuk Pengisian              
            <ul>
              <li>Isi dengan Nama Lengkap</li>
              <li>Permintaan ini hanya disampaikan melalui email ITS (domain ITS | .its.ac.id).   
                <p style="color: #5065ac;"> contoh@mhs.its.ac.id </p>
              </li>
              <li>Contoh Judul : Programming Rust: Fast, Safe Systems Development 2nd Edition</li>
              <li>Contoh Pengarang : Jim Blandy , Jason Orendorff 2021</li>
              <li>isi dengan link e-thesis yang ingin diberi akses (tambahkan ' https:/ ' didepannya) contoh:
                <a href="https://repository.its.ac.id/3072/">
                  https://repository.its.ac.id/3072/
                </a>   
              </li>
              <li>beri foto KTP dengan jelas agar permintaan diproses </li>
            </ul> 
            <p class="mb-1"> Tanyakan melalui whatsapp jika terdapat pertanyaan                  
              <a class="btn btn-outline-success btn-sm mt-2" href="#" type="button" >
                whatsapp
                <i class="fab fa-whatsapp"></i>
              </a>
            </p>
          </p>  
          <!-- <a class="btn btn-lg btn-primary hover-top" href="#" role="button">Explore</a> -->
        
        </div>
        
        <div class="col-lg-8 order-lg-0 order-1 px-4 px-md-3 py-8 py-md-3">
          <div class="mt-4 mb-3 ml-3">
            <a class="btn btn-lg btn-secondary hover-top rounded-1" href="/" role="button"><i class="fas fa-chevron-left"></i>  kembali ke laman utama</a>
          </div>
      
      
          <form action="/thesis" method="POST" enctype="multipart/form-data">
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

            <div class="row g-2">
            <div class="form-floating mb-3 col-4 flex-center">
              <input type="text" name="no_hp" value="{{old('no_hp')}}" class="form-control @error('no_hp') is-invalid @enderror"  id="floatingInput" placeholder=" " required >
              <label for="floatingInput">No Hp</label>
              @error('no_hp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-floating mb-3 col-8 flex-center">
              <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"  id="floatingInput" placeholder=" " required >
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
                <input type="text" name="institusi" value="{{old('institusi')}}" class="form-control @error('institusi') is-invalid @enderror"  id="floatingInput" style="height: 70px" placeholder=" " required >
                <label for="floatingInput">Fakultas/Institusi</label>
                @error('institusi')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>
              
              {{-- <div class="form-floating mb-3 col-6 flex-center">
                <input type="text" name="nid" value="{{old('nid')}}" class="form-control @error('nid') is-invalid @enderror"  id="floatingInput" placeholder=" " required >
                <label for="floatingInput">NIP / NRP</label>
                @error('nid')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div> --}}
              <div class="form-floating mb-3 col-6 flex-center">
                <select class="form-select @error('status') is-invalid @enderror" name="status" value="{{old('status')}}" id="floatingSelect" style="height: 70px" aria-label="Floating label select example" required >
                  <option value= >Pilih Salah Satu</option>
                  <option value="Mahasiswa ITS" @if (old('status') == 'Mahasiswa ITS') selected="selected" @endif>Mahasiswa ITS</option>
                  <option value="Dosen ITS" @if (old('status') == 'Dosen ITS') selected="selected" @endif>Dosen ITS</option>
                  <option value="Staff ITS" @if (old('status') == 'Mahasiswa ITS') selected="selected" @endif>Staff ITS</option>
                </select>
                <label for="floatingSelect">Status</label>
                @error('status')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
            </div>

            
            <div class="form-floating mb-3 flex-center">
              <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" value="{{old('kategori')}}" id="floatingSelect" aria-label="Floating label select example" required >
                <<option value= >Pilih Salah Satu</option>
                <option value="Artikel E-Journal" @if (old('kategori') == 'Artikel E-Journal') selected="selected" @endif>Artikel E-Journal (SNI dll)</option>
                <option value="E-Book" @if (old('kategori') == 'E-Book') selected="selected" @endif>E-Book (SNI dll)</option>
                <option value="E-Proceeding" @if (old('kategori') == 'E-Proceeding') selected="selected" @endif>E-Proceeding</option>
                <option value="Standard" @if (old('kategori') == 'Standard') selected="selected" @endif>Standard (SNI dll)</option>
                <option value="Topik khusus" @if (old('kategori') == 'Topik khusus') selected="selected" @endif>Topik khusus</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            
              </select>
              <label for="floatingSelect">Kategori E-Thesis delivery</label>
              @error('kategori')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="row g-2">
            <div class="form-floating mb-3 col-9 flex-center">
              <input type="text" name="judul" value="{{old('judul')}}" class="form-control @error('judul') is-invalid @enderror"  id="floatingInput" placeholder=" " required >
              <label for="judul">Judul</label>
              @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>        
            <div class="form-floating mb-3 col-3 flex-center">
              <input type="text" name="tahun" value="{{old('tahun')}}" class="form-control @error('tahun') is-invalid @enderror"  id="floatingInput" placeholder=" " required >
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
              <input type="text" name="pengarang" value="{{old('pengarang')}}" class="form-control @error('pengarang') is-invalid @enderror"  id="floatingInput" placeholder=" " required >
              <label for="floatingInput">Pengarang</label>
              @error('pengarang')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>          
            <div class="form-floating mb-3 col-6 flex-center">
              <input type="text" name="link" value="{{old('link')}}" class="form-control @error('link') is-invalid @enderror"  id="floatingInput" placeholder=" " required >
              <label for="floatingInput">Link Repository ITS </label>
              @error('link')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            </div>

            <div class="form-floating mb-3 flex-center">
              <input type="text" name="keterangan" value="{{old('keterangan')}}" class="form-control @error('keterangan') is-invalid @enderror"  id="floatingInput" style="height: 100px" placeholder=" "  >
              <label for="floatingInput">Keterangan</label>
              @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            {{-- belum setting di database --}}
            <div class="mb-3">
              <label for="formFile" class="form-label">Upload Foto KTP/KTM</label>
              <input class="form-control @error('ktp') is-invalid @enderror" type="file" name="ktp" value="{{old('ktp')}}" id="formFile" required >
              @error('ktp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror

            </div>

            {{-- <div class="form-floating mb-3 col-6 flex-center">
            <input type="Nama" class="form-control" id="floatingInput" placeholder=" ">
            <label for="floatingInput">Surat Pernyataan</label>
            </div> --}}

            {{-- <button type="submit" class="btn btn-primary">Submit Form</button> --}}
            
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit Form</button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Persetujuan dan Kebijakan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <div class="container">
                      <h5 class="text-center mb-3">Surat Pernyataan</h5> 
                      <p>Dengan ini diisinya form dibawah ini maka pengguna menyatakan telah meng-copy dan tidak akan melakukan plagiasi serta tidak menyebarluaskan karya Tugas Akhir/Tesis/Disertasi di Perpustakaan ITS dengan judul , penulis , tahun yang terdapat di link https://repository.its.ac.id/ yang saya input</p>
                      
                      <p>
                        Untuk mendukung kegiatan perkuliahan/pendidikan dan pengajaran/penelitian ilmiah yang
                        kami lakukan.
                      </p>

                      <p> Apabila terdapat penyalahgunaan dikemudian hari dan terjadi suatu kesalahan itu adalah kesalahan pengguna dan bukan merupakan tanggung jawab
                        Perpustakaan ITS.
                      </p>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
