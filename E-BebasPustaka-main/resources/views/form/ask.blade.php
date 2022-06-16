@extends('layouts.landingpage')

@section('content')
<section class="py-0" >
  <div class="bg-holder d-none d-md-block" style="background-image:url(kp_depan/public/assets/img/illustrations/undraw_Live_collaboration_re_60ha.png);background-position: left 100vh top;;background-size:contain; background-size: 115vh; ">
  </div>
  <!--/.bg-holder-->

  <div class="container position-relative">
    <div class="row align-items-center min-vh-75 my-lg-8">
      <div class="col-md-7 col-lg-6 text-center text-md-start py-8">
        <h1 class="mb-4 fs-7 display-1 lh-sm">Ask a Librarian</h1>
        <p class="mt-2 fs-1 lh-base">
          Ask A Librarian  merupakan salah satu layanan perpustakaan ITS untuk menjawab kebutuhan pengguna akan informasi yang responsif dan akurat</p>
        <p class="mt-1 mb-0 fs-1 lh-base">
          Layanan Ask A Librarian meliputi

          fasilitas maupun koleksi yang dimiliki perpustakaan ITS,

          panduan mencari layanan sumber koleksi elektronik atau literatur yang terkait dengan tugas dan penelitian,

          program dan agenda yang diadakan perpustakaan ITS.
          dan pertanyaan lain yang berkaitan dengan kebutuhan informasi yang diinginkan oleh pengguna
          
        </p>
        <br class="d-none d-lg-block" /> 
        <div class="col-md-12">
          <a class="btn btn-lg btn-primary hover-top rounded-1" style="border-radius:50px ;" href="#Form" role="button">Lebih Lanjut</a>
          <a class="btn btn-lg btn-outline-success hover-top rounded-1" style="border-radius:50px ;" href="https://api.whatsapp.com/send?phone=6285937062001&text=Halo+%2C+Saya+ingin+bertanya+sesuatu+mengenai+Perpustakaan+ITS+Surabaya" role="button">WhatsApp <i class="fab fa-whatsapp"></i></a>
        </div>
      
      </div>
    </div>
  </div>
</section>


    <section class="py-0" id="Form">

      <div class="container">
        <div class="row flex-md-center">
          <div class="col-md-11 col-lg-4 py-md-3 px-4 px-md-3 px-lg-0 px-xl-2 order-lg-1">
            <h1 class="fw-bold fs-md-3 fs-xl-5">Form Ask a Librarian</h1>
            <hr class="text-primary my-4 my-lg-3 my-xl-4" style="height:3px; width:70px;" />
            <p class="lh-lg"></p>
            <ul>
              <li>Silahkan mengajukan pertanyaan tentang seluruh kebutuhan informasi yang Anda inginkan kepada kami melalui form ini.</li>
              <li>Mohon diberi alamat email Anda agar kami bisa mengirim jawaban dari pertanyaan yang telah Anda ajukan.</li>
              <li> Pesan email dapat dikirimkan kapan saja dan pustakawan referensi Perpustakaan ITS akan membuka email untuk menanggapi pada jam kerja (Senin s/d Jum’at: 07.30-16.00 WIB).</li>
              <li>Pesan e-mail akan dibalas dalam waktu 1×24 jam.</li>
              
            </ul> 
            <!-- <a class="btn btn-lg btn-primary hover-top" href="#" role="button">Explore</a> -->
          
          </div>
          
          <div class="col-lg-8 order-lg-0 order-1 px-4 px-md-3 py-8 py-md-3">
            <div class="mt-4 mb-3 ml-3">
              <a class="btn btn-lg btn-secondary hover-top rounded-1" href="/" role="button"><i class="fas fa-chevron-left"></i>  kembali ke laman utama</a>
            </div>
        
            <form action="/ask" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-floating mb-3 flex-center">
                <input type="text" name="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror" id="floatingInput" placeholder=" " required>
                <label for="floatingInput">Nama Lengkap</label>
                @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="row g-2">
              <div class="form-floating mb-3 col-4 flex-center">
                <input type="text" name="no_hp" value="{{old('no_hp')}}" class="form-control @error('no_hp') is-invalid @enderror"  id="floatingInput" placeholder=" " required>
                <label for="floatingInput">No Hp</label>
                @error('no_hp')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-floating mb-3 col-8 flex-center">
                <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"  id="floatingInput" placeholder=" " required>
                <label for="floatingInput">E-mail</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              </div>

              <div class="form-floating mb-3 flex-center">
                <select class="form-select @error('status') is-invalid @enderror" name="status" value="{{old('status')}}" id="floatingSelect"style="height: 70px" aria-label="Floating label select example" required>
                  <option value= >Pilih Salah Satu</option>
                  <option value="Mahasiswa ITS">Mahasiswa ITS</option>
                  <option value="Dosen/Tendik ITS">Dosen ITS</option>
                  <option value="Staff ITS">Staff ITS</option>
                  <option value="Pengguna Luar">Pengguna Luar</option>
                </select>
                <label for="floatingSelect">Status</label>
                  @error('status')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>

              <div class="form-floating mb-3 flex-center">
                <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" value="{{old('kategori')}}" id="floatingSelect"style="height: 70px" aria-label="Floating label select example" required>
                  <option value= >Pilih Salah Satu</option>
                  <option value="Jam Operasional Layanan">Jam Operasional Layanan</option>
                  <option value="Fasilitas Perpustakaan">Fasilitas Perpustakaan</option>
                  <option value="Pendaftaran Keanggotaan Baru">Pendaftaran Keanggotaan Baru</option>
                  <option value="Peminjaman Online">Peminjaman Online</option>
                  <option value="Dokumen Delivery ( Pengiriman E Jurnal, E Book dan Karya Ilmiah (TA, Tesis, Disertasi)">Dokumen Delivery ( Pengiriman E Jurnal, E Book dan Karya Ilmiah (TA, Tesis, Disertasi)</option>
                  <option value="Pelatihan Literasi Informasi">Pelatihan Literasi Informasi</option>
                  <option value="Ketersediaan Koleksi dan Informasi Koleksi Baru">Ketersediaan Koleksi dan Informasi Koleksi Baru</option>
                  <option value="Akses Repository">Akses Repository</option>
                  <option value="Upload Mandiri dan Bebas Pustaka">Upload Mandiri dan Bebas Pustaka</option>
                  <option value="Usulan Pengadaan Buku Baru">Usulan Pengadaan Buku Baru</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
                <label for="floatingSelect">Kategori Pertanyaan</label>
                  @error('kategori')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>


              <div class="form-floating mb-3 flex-center">
                <input type="text" name="pertanyaan" value="{{old('pertanyaan')}}" class="form-control @error('pertanyaan') is-invalid @enderror" style="height: 15vh" id="floatingInput" placeholder=" " required>
                <label for="floatingInput">Pertanyaan</label>
                @error('pertanyaan')
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
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Submit Form
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
