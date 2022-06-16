@extends('layouts.landingpage')

@section('content')

{{-- {{dd($nama)}} --}}
<div class="container">

    <div class="p-5 rounded-lg mt-8">

        <div class="bg-holder d-none d-md-block" style="background-image:url(kp_depan/public/assets/img/illustrations/undraw_Envelope_re_f5j4.png);background-position:90vh top;background-size:contain;">
        </div>
        @if(session('successform'))
            <div class="col-9">
                <h1 > {{ session('successform')}}</h1>
                <h1 > Terima kasih, {{$nama}}.</h1>
            </div>
        @endif
        
        <hr size="4" class="my-4" style="width: 65%">
        <div class="row my-5">
            <div class="col-8">
                <p class="lead">Cek balasan melalui email anda dalam beberapa hari <i class="fas fa-envelope"></i></p>
            </div>    
        </div>
        
        <div class="mt-4 mb-3 ml-3">
            <div class="col-md-12 col-sm-7">
                <a class="btn btn-lg btn-secondary hover-top rounded-1" href="/" role="button"><i class="fas fa-chevron-left"></i>kembali ke laman utama</a>
                <a class="btn btn-lg btn btn-outline-primary hover-top rounded-1" href="{{ url()->previous() }}" role="button">kirim tanggapan lain</a>
            </div>
        </div>
        
    </div>    
</div>


@endsection
