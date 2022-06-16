@extends('layouts/admin')
@section('title', 'Profile')

@section('content')    

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
          @if(session('success'))
            <div class="alert alert-dismissable alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              {{ session('success')}}
            </div>
          @endif
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Profile Detail</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group row">
                    <label for="staticName" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticName" value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pass" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-sm btn-warning mr-1" style="font-size: 0.8em;" data-toggle="modal" data-target="#passModal">Ganti Password</button>
                            <div class="modal fade" id="passModal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <!-- modal header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Ganti Password</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ url('/profile/change-password') }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('patch')}}
                                <!-- modal body -->
                                <div class="modal-body">
                                <div class="form-group">
                                    <label>Password Sekarang</label>
                                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" required autocomplete="current-password">
                                        @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                                </div>
                                </div>
                                <!-- modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Ganti Password</button>
                                </div>
                                </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
        </div>
    </div>
</div>
    
@endsection


@section('javascript')
<script type="text/javascript">
    @if (count($errors) > 0)
        $('#passModal').modal('show');
    @endif
</script>
    
@endsection

