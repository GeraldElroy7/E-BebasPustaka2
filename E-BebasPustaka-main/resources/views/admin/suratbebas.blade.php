@extends('layouts/landingpage')

@section('content')

<section class="py-0" id="Beranda">
  <!--/.bg-holder-->

  <div class="container-fluid position-relative px-7">
    <div class="row min-vh-75 mt-8 cols">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 btn-group mb-6 d-flex justify-content-center px-md-4 px-lg-9">
      <a href="/admin/dashboard" class="col btn btn-lg btn-primary">1. Aktivasi</a>
          <a href="/admin/validasi" class="col btn btn-lg btn-primary">2. Validasi</a>
          <a href="/admin/terimaTA" class="col btn btn-lg btn-primary">3. Terima TA</a>
          <a href="/admin/tanggungan" class="col btn btn-lg btn-primary">4. Tanggungan</a>
          <a href="/admin/suratbebas" class="col btn btn-lg btn-primary active" aria-current="page">5. Surat BP</a>
      </div>
        
      <div class="card-body shadow-lg mt-n2">
        <div class="table-responsive">
          <table class="table table-hover border-light table-bordered pt-3 pb-2" id="adminTable">
            <thead class="table-primary">
              <tr>
                <th scope="col">Nama</th>
                <th scope="col">NRP</th>
                <th scope="col">Kirim Surat</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($mahasiswa as $mhs)
                @if($mhs->status == 3)
                  <tr>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->nrp }}</td>
                    <td>
                      <span style="font-size: 25px; color: green;">
                        <i class="far fa-check-circle" role="button" data-bs-toggle="modal" data-bs-target="#modalsurat-{{ $mhs->id }}"></i>
                      </span>
                      <div class="modal fade" id="modalsurat-{{ $mhs->id }}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p style="text-align: center; font-weight: bold; font-size: 16px">Apakah Anda yakin untuk mengirim surat kepada mahasiswa ini?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-sm btn-warning" data-bs-dismiss="modal">Tidak</button>
                                <form action="{{ route('admin.suratbebas.setuju', $mhs->id) }}" method="post">
                                  @method('PUT')
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-success">Yakin</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endif
              @empty
                  <p>Tidak ada ajuan</p>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</section>

<!-- Modal -->

<div class="modal fade" id="aktivasiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 700px">
    <div class="modal-content" style="">
      <div class="modal-body text-center text-black fs-2">
        Apakah anda yakin untuk mengaktivasi akun ini?
      </div>
      <div class="modal-footer justify-content-center">
        <a type="button" class="rounded-1 btn btn-lg btn-secondary mx-2" data-bs-dismiss="modal">Batal</a>
        <a type="button" class="rounded-1 btn btn-lg btn-primary mx-2" href="/admin/aktivasi/{{ $mhs->id }}">iya</a>
      </div>
    </div>
  </div>
</div>

<div id="orderModal" class="modal hide fade" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Order</h3>

  </div>
  <div id="orderDetails" class="modal-body"></div>
  <div id="orderItems" class="modal-body"></div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

</section>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#adminTable').DataTable();
      $('body').on('click', '#show-user', function () {
          var userURL = $(this).data('url');
          $.get(userURL, function (data) {
              $('#exampleModalCenter').modal('show');
              $('#mhs-id').text(data.id);
              $('#mhs-nama').text(data.nama);
              $('#mhs-nrp').text(data.nrp);
              $('#mhs-email').text(data.email);
              $('#mhs-telp').text(data.telp);
              $('#mhs-jenjang').text(data.jenjang);
              $('#mhs-fakultas').text(data.fakultas);
              $('#mhs-departemen').text(data.departemen);
              $('#mhs-judulTA').text(data.judulTA);
          })
       });
  } );
</script>
  
<!-- <section> close ============================-->
<!-- ============================================-->

@endsection
