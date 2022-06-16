@extends('layouts/admin')
@section('title', 'E-Resource Delivery')

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
            <h3 class="card-title">Permintaan {{$data_type}}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="res" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Tgl Masuk</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Link</th>
                <th>Tambahan</th>
                @if ($data_type == 'Selesai')
                  <th>Pustakawan</th>                    
                @endif
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                <!-- TABEL DATA PERMINTAAN BARU -->
                @if ($data_type == 'Baru')
                  @foreach($data_resource as $resource)
                  <tr>
                    <td>{{$resource->created_at->format('d M Y H:i')}}</td>
                    <td>{{$resource->nama}}</td>
                    <td>{{$resource->kategori}}</td>
                    <td>{{$resource->judul}} oleh {{$resource->pengarang}} {{$resource->tahun}}</td>
                    <td><a href={{$resource->link}} target="_blank">Link</a></td>
                    <td>{{$resource->keterangan}}</td>
                    <td>
                      <div class="parent d-flex">
                        <!-- BUTTON DETAIL -->
                        <button type="button" class="btn btn-sm btn-outline-primary mr-1" style="font-size: 0.8em;" data-toggle="modal" data-target="#detailModal-{{ $resource->id }}">
                          <i class="fas fa-info fa-fw"></i>
                        </button>
                          <div class="modal fade" id="detailModal-{{ $resource->id }}">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <!-- modal header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Detail permintaan oleh {{$resource->nama}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- modal body -->
                                <div class="modal-body" style="display: block;">
                                  <div class="row">
                                    <div class="col-lg-4"><b>Tgl Masuk</b></div>
                                    <div class="col-lg-8">: {{$resource->created_at->format('d M Y H:i')}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Nama</b></div>
                                    <div class="col-lg-8">: {{$resource->nama}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>NID / NRP</b></div>
                                    <div class="col-lg-8">: {{$resource->nid}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Status</b></div>
                                    <div class="col-lg-8">: {{$resource->status}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Institusi / Fakultas</b></div>
                                    <div class="col-lg-8">: {{$resource->institusi}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>No HP</b></div>
                                    <div class="col-lg-8">: {{$resource->no_hp}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Email</b></div>
                                    <div class="col-lg-8">: {{$resource->email}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Kategori</b></div>
                                    <div class="col-lg-8">: {{$resource->kategori}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Judul</b></div>
                                    <div class="col-lg-8">: {{$resource->judul}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Pengarang</b></div>
                                    <div class="col-lg-8">: {{$resource->pengarang}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Tahun</b></div>
                                    <div class="col-lg-8">: {{$resource->tahun}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Link</b></div>
                                    <div class="col-lg-8">: {{$resource->link}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Keterangan</b></div>
                                    <div class="col-lg-8">: {{$resource->keterangan}}</div>
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
                        <a class="btn btn-sm btn-outline-primary mr-1" style="white-space: nowrap; font-size: 0.8em;" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{$resource->email}}" target="_blank" role="button">
                          <i class="fas fa-envelope fa-fw"></i>
                        </a>
                        
                        <!-- BUTTON SELESAI -->
                        <button type="button" class="btn btn-sm btn-outline-primary mr-1" style="font-size: 0.8em;" data-toggle="modal" data-target="#selesaiModal-{{ $resource->id }}">
                          <i class="fas fa-check fa-fw"></i>
                        </button>
                          <div class="modal fade" id="selesaiModal-{{ $resource->id }}">
                          <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                              <!-- modal header -->
                              <div class="modal-header">
                                  <h4 class="modal-title">Menyelesaikan Permintaan {{$resource->nama}}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <!-- modal body -->
                              <div class="modal-body">
                                  <p>Apakah anda yakin ingin menandai ini sebagai permintaan yang sudah diselesaikan?</p>
                              </div>
                              <!-- modal footer -->
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Tidak</button>
                                  <form action="{{ url('/resource/mark', $resource->id) }}" method="post">
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
                <!-- TABEL DATA PERMINTAAN YANG SUDAH SELESAI -->
                @else
                  @foreach($data_resource as $resource)
                  <tr>
                    <td>{{$resource->created_at->format('d M Y H:i')}}</td>
                    <td>{{$resource->nama}}</td>
                    <td>{{$resource->kategori}}</td>
                    <td>{{$resource->judul}} oleh {{$resource->pengarang}} {{$resource->tahun}}</td>
                    <td><a href={{$resource->link}} target="_blank">Link</a></td>
                    <td>{{$resource->keterangan}}</td>
                    <td>{{$resource->user['name']}}</td>
                    <td>
                      <div class="parent d-flex">
                        <button type="button" class="btn btn-sm btn-outline-primary mr-1" style="font-size: 0.8em;" data-toggle="modal" data-target="#detailModal-{{ $resource->id }}">
                          <i class="fas fa-info fa-fw"></i>
                        </button>
                          <div class="modal fade" id="detailModal-{{ $resource->id }}">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <!-- modal header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Detail permintaan oleh {{$resource->nama}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- modal body -->
                                <div class="modal-body" style="display: block;">
                                  <div class="row">
                                    <div class="col-lg-4"><b>Tgl Masuk</b></div>
                                    <div class="col-lg-8">: {{$resource->created_at->format('d M Y H:i')}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Tgl Selesai</b></div>
                                    <div class="col-lg-8">: {{$resource->updated_at->format('d M Y H:i')}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Nama</b></div>
                                    <div class="col-lg-8">: {{$resource->nama}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>NID / NRP</b></div>
                                    <div class="col-lg-8">: {{$resource->nid}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Status</b></div>
                                    <div class="col-lg-8">: {{$resource->status}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Institusi / Fakultas</b></div>
                                    <div class="col-lg-8">: {{$resource->institusi}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>No HP</b></div>
                                    <div class="col-lg-8">: {{$resource->no_hp}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Email</b></div>
                                    <div class="col-lg-8">: {{$resource->email}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Kategori</b></div>
                                    <div class="col-lg-8">: {{$resource->kategori}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Judul</b></div>
                                    <div class="col-lg-8">: {{$resource->judul}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Pengarang</b></div>
                                    <div class="col-lg-8">: {{$resource->pengarang}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Tahun</b></div>
                                    <div class="col-lg-8">: {{$resource->tahun}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Link</b></div>
                                    <div class="col-lg-8">: {{$resource->link}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Keterangan</b></div>
                                    <div class="col-lg-8">: {{$resource->keterangan}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>Nama Pustakawan</b></div>
                                    <div class="col-lg-8">: {{$resource->user['name']}}</div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4"><b>KTP</b></div>
                                  </div>
                               
                                  <div class="row">
                                    <div class="card" style="width: auto;">
                                      <div class="card-body">
                                        <h5 class="card-title">{{$resource->ktp}}</h5>
                                          <a >
                                            <img src="{{ ($resource->ktp) }}" class="card-img-top py-3">
                                            <a class="btn btn-outline-primary" href="{{$resource->ktp}}" type="button" target="_blank">
                                              Lihat <i class="fas fa-search"></i>
                                            </a>
                                          </a>
                                          <a href="/resource/download/{{$resource->id}}" class="btn btn-outline-primary ">
                                            Unduh <i class="fas fa-cloud-download-alt"></i>
                                          </a> 
  
                                        </div>
                                    </div>
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
      $("#res").DataTable({  
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
