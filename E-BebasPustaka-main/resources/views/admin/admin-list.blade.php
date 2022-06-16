@extends('layouts/admin')
@section('title', 'Daftar Pustakawan')

@section('css')
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

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
            <button type="button" class="btn btn-sm btn-primary mr-1" style="font-size: 0.8em;" data-toggle="modal" data-target="#tambahModal">Tambah Pustakawan</button>
            <div class="modal fade" id="tambahModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <!-- modal header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Pustakawan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('/admin-list/add') }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('post')}}
                    <!-- modal body -->
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="name">Nama</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="email-confirm">Konfirmasi Email</label>
                        <input id="email-confirm" type="email" class="form-control" name="email_confirmation" required autocomplete="email">
                      </div>
                      <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="password-confirm">Konfirmasi Kata Sandi</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                    </div>
                    <!-- modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Tambah Pustakawan</button>
                    </form>
                    </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->  
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="admin-list" class="table table-bordered table-striped" width="100%">
              <thead>
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
              </tr>
              </thead>
              <tbody>
                @foreach($data_user as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->level}}</td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
@endsection

@section('javascript')
  <script src="{{asset('AdminLTE')}}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{asset('AdminLTE')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('AdminLTE')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{asset('AdminLTE')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <script>
    $(function () {
      $("#admin-list").DataTable({  
        "columnDefs": [{
          orderable: false,
          targets: -1
        }],
        "fixedHeader": true,
        "order": [[ 2, "asc" ]]
      });
    });
  </script>

  <script type="text/javascript">
    @if (count($errors) > 0)
        $('#tambahModal').modal('show');
    @endif
    </script>
@endsection

