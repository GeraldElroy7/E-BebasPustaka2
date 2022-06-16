@extends('layouts/admin')
@section('title', 'Ask a Librarian')

@section('css')
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
      @if(session('success'))
        <div class="alert alert-dismissable alert-success" id="successMessage">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ session('success')}}
        </div>
      @endif
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pertanyaan {{$data_type}}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="ask" class="table table-bordered table-striped" width="100%">
              <thead>
              <tr>
                <th>Tgl Masuk</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Kategori</th>
                <th>Pertanyaan</th>
                @if ($data_type == 'Selesai')
                  <th>Pustakawan</th>
                @endif
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                @if ($data_type == 'Baru')
                  @foreach($data_ask as $ask)
                  <tr>
                      <td>{{$ask->created_at->format('d M Y H:i')}}</td>
                      <td>{{$ask->nama}}</td>
                      <td>{{$ask->status}}</td>
                      <td>{{$ask->kategori}}</td>
                      <td>{{$ask->pertanyaan}}</td>
                      <td>
                        <div class="parent d-flex">
                          <!-- BUTTON DETAIL -->
                          <button type="button" class="btn btn-sm btn-outline-primary mr-1" style="font-size: 0.8em;" data-toggle="modal" data-target="#detailModal-{{ $ask->id }}">
                            <i class="fas fa-info fa-fw"></i>
                          </button>
                            <div class="modal fade" id="detailModal-{{ $ask->id }}">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <!-- modal header -->
                                  <div class="modal-header">
                                      <h4 class="modal-title">Detail pertanyaan oleh {{$ask->nama}}</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <!-- modal body -->
                                  <div class="modal-body" style="display: block;">
                                    <div class="row">
                                      <div class="col-lg-4"><b>Tgl Masuk</b></div>
                                      <div class="col-lg-8">: {{$ask->created_at->format('d M Y H:i')}}</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"><b>Nama</b></div>
                                      <div class="col-lg-8">: {{$ask->nama}}</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"><b>Status</b></div>
                                      <div class="col-lg-8">: {{$ask->status}}</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"><b>No HP</b></div>
                                      <div class="col-lg-8">: {{$ask->no_hp}}</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"><b>Email</b></div>
                                      <div class="col-lg-8">: {{$ask->email}}</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"><b>Kategori</b></div>
                                      <div class="col-lg-8">: {{$ask->kategori}}</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"><b>Pertanyaan</b></div>
                                      <div class="col-lg-8">: {{$ask->pertanyaan}}</div>
                                    </div>
                                  </div>
                                  <!-- modal footer -->
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal-->

                          <!-- BUTTON EMAIL -->
                          <a button class="btn btn-sm btn-outline-primary mr-1" style="white-space: nowrap; font-size: 0.8em;" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{$ask->email}}" target="_blank" role="button">
                            <i class="fas fa-envelope fa-fw"></i>
                          </a>
  
                          <!-- BUTTON SELESAI -->
                          <button type="button" class="btn btn-sm btn-outline-primary mr-1" style="font-size: 0.8em;" data-toggle="modal" data-target="#selesaiModal-{{ $ask->id }}">
                            <i class="fas fa-check fa-fw"></i>
                          </button>
                            <div class="modal fade" id="selesaiModal-{{ $ask->id }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <!-- modal header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Menjawab pertanyaan {{$ask->nama}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- modal body -->
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin menandai ini sebagai pertanyaan yang sudah terjawab?</p>
                                </div>
                                <!-- modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Tidak</button>
                                    <form action="{{ url('/ask/mark', $ask->id) }}" method="post">
                                      {{ method_field('patch')}}
                                      {{ csrf_field() }}
                                      <button type="submit" class="btn btn-sm btn-primary">Yakin</button>
                                    </form>
                                </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                      </td>
                  </tr>
                  @endforeach
                @else
                  @foreach($data_ask as $ask)
                  <tr>
                      <td>{{$ask->created_at->format('d M Y H:i')}}</td>
                      <td>{{$ask->nama}}</td>
                      <td>{{$ask->status}}</td>
                      <td>{{$ask->kategori}}</td>
                      <td>{{$ask->pertanyaan}}</td>
                      <td>{{$ask->user['name']}}</td>
                      <td>
                        <div class="parent d-flex">
                          <!-- BUTTON DETAIL -->
                          <button type="button" class="btn btn-sm btn-outline-primary mr-1" style="font-size: 0.8em;" data-toggle="modal" data-target="#detailModal-{{ $ask->id }}">
                            <i class="fas fa-info fa-fw"></i>
                          </button>
                            <div class="modal fade" id="detailModal-{{ $ask->id }}">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <!-- modal header -->
                                  <div class="modal-header">
                                      <h4 class="modal-title">Detail pertanyaan oleh {{$ask->nama}}</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <!-- modal body -->
                                  <div class="modal-body" style="display: block;">
                                    <div class="row">
                                      <div class="col-lg-4"><b>Tgl Masuk</b></div>
                                      <div class="col-lg-8">: {{$ask->created_at->format('d M Y H:i')}}</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"><b>Tgl Terjawab</b></div>
                                      <div class="col-lg-8">: {{$ask->updated_at->format('d M Y H:i')}}</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"><b>Nama</b></div>
                                      <div class="col-lg-8">: {{$ask->nama}}</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"><b>Status</b></div>
                                      <div class="col-lg-8">: {{$ask->status}}</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"><b>Email</b></div>
                                      <div class="col-lg-8">: {{$ask->email}}</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"><b>Kategori</b></div>
                                      <div class="col-lg-8">: {{$ask->kategori}}</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"><b>Pertanyaan</b></div>
                                      <div class="col-lg-8">: {{$ask->pertanyaan}}</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4"><b>Nama Pustakawan</b></div>
                                      <div class="col-lg-8">: {{$ask->user['name']}}</div>
                                    </div>
                                  </div>
                                  <!-- modal footer -->
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal-->
                        </div>
                    </td>
                  </tr>
                  @endforeach
                @endif
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
  <script src="{{asset('AdminLTE')}}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{asset('AdminLTE')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('AdminLTE')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{asset('AdminLTE')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/plug-ins/1.10.24/sorting/datetime-moment.js"></script>

  <script>
    $(function () {
      $.fn.dataTable.moment( 'D MMM YYYY HH:mm' );
      $("#ask").DataTable({  
        "columnDefs": [{
          orderable: false,
          targets: -1
        }],
        "fixedHeader": true,
        "order": [[ 0, "asc" ]]
      });
    });
  </script>

  <script>
    setTimeout(function() {
      $('#successMessage').fadeOut('fast');
    }, 3000); // <-- time in mill
  </script>
@endsection

