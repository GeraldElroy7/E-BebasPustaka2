@extends('layouts.landingpage')

{{-- <main class="main" id="top"> --}}
@section('content')
<div class="d-flex justify-content-center mt-8">
    
    <form action="/thesis" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3 flex-center">
            Register
        </div>
        <div class="form-floating mb-3 flex-center">
            <input type="text" name="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror" id="floatingInput" placeholder=" " required >
            <label for="floatingInput">Nama Lengkap</label>
            @error('nama')
            <div class="invalid-feedback">
                
            </div>
            @enderror
        </div>

        <div class="row g-2">
            <div class="form-floating mb-3 col-4 flex-center">
                <input type="text" name="no_hp" value="{{old('no_hp')}}" class="form-control @error('no_hp') is-invalid @enderror"  id="floatingInput" placeholder=" " required >
                <label for="floatingInput">No Hp</label>
                @error('no_hp')
                <div class="invalid-feedback">
                    
                </div>
                @enderror
            </div>

            <div class="form-floating mb-3 col-8 flex-center">
                <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"  id="floatingInput" placeholder=" " required >
                <label for="floatingInput">E-mail</label>
                @error('email')
                <div class="invalid-feedback">
                    
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
                    
                </div>
                @enderror
            </div>
        
            <div class="form-floating mb-3 col-6 flex-center">
                <select class="form-select @error('status') is-invalid @enderror" name="status" value="{{old('status')}}" id="floatingSelect" style="height: 70px" aria-label="Floating label select example" required >
                    <option value= >Pilih Salah Satu</option>
                    <option value="Mahasiswa ITS" @if (old('status') == 'Mahasiswa ITS') selected="selected" @endif>Mahasiswa ITS</option>
                </select>
                <label for="floatingSelect">Status</label>
                @error('status')
                    <div class="invalid-feedback">
                    
                    </div>
                @enderror
            </div>
        </div>
        
        <div class="form-floating mb-3 flex-center">
            <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" value="{{old('kategori')}}" id="floatingSelect" aria-label="Floating label select example" required >
            <<option value= >Pilih Salah Satu</option>
            <option value="Artikel E-Journal" @if (old('kategori') == 'Artikel E-Journal') selected="selected" @endif>Artikel E-Journal (SNI dll)</option>
            <option value="E-Book" @if (old('kategori') == 'E-Book') selected="selected" @endif>E-Book (SNI dll)</option>
            </select>
        
            </select>
            <label for="floatingSelect">Kategori E-Thesis delivery</label>
            @error('kategori')
            <div class="invalid-feedback">
                
            </div>
            @enderror
        </div>
        
        <div class="row g-2">
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Foto KTP/KTM</label>
                <input class="form-control @error('ktp') is-invalid @enderror" type="file" name="ktp" value="{{old('ktp')}}" id="formFile" required >
                @error('ktp')
                <div class="invalid-feedback">
                    
                </div>
                @enderror

            </div>
        </div>
        
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
@endsection