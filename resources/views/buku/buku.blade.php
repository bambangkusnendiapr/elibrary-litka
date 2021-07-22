@extends('layouts.master')

@section('buku','active')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Buku</h1>
            <!-- @if (session('status'))
              <div class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Selamat!</h5>
                {{ session('status') }}
              </div>
            @endif -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
              <a href="{{ route('buku.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Tambah Buku</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Kategori</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Kota</th>                    
                    <th>JML Lihat</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($buku as $e=>$k)
                  <tr>
                    <td class="align-middle">{{ $e+1 }}</td>
                    <td class="align-middle">
                    @if($k->buku_gambar)
                      <a href="{{ route('buku_sungle', $k->buku_slug) }}" target="_blank">
                        <img id="img" src="{{ url('images/')}}/{{$k->buku_gambar}}" width="70px"/>
                      </a>
                    @else
                      <a href="#">
                        <img id="img" src="{{ url('images/avatar.jpg')}}" width="70px"/>                      
                      </a>
                    @endif
                    </td>
                    <td class="align-middle">
                      <a href="{{ route('buku_sungle', $k->buku_slug) }}" target="_blank">
                        {{ $k->buku_judul }}
                      </a>
                    </td>
                    <td class="align-middle">{{ $k->pengarang->pengarang_nama }}</td>
                    <td class="align-middle">{{ $k->kategori->kategori_nama }}</td>
                    <td class="align-middle">{{ $k->penerbit->penerbit_nama }}</td>
                    <td class="align-middle">{{ Carbon\Carbon::parse($k->buku_tahun)->year }}</td>
                    <td class="align-middle">{{ $k->buku_kota }}</td>                    
                    <td class="align-middle">{{ $k->buku_lihat }} x lihat</td>
                    <td class="align-middle">{{ $k->buku_ket }}</td>
                    <td class="align-middle">
                      <!-- tombol edit -->
                      <a href="{{ route('buku.edit',$k->id)}}" class="btn btn-warning btn-sm mb-1" title="Edit Buku"><i class="fas fa-edit"></i></a>
                      <!-- tombol hapus -->
                      <a href="#" data-target="#modal-hapus{{ $k->id }}" class="btn btn-danger btn-sm mb-1" data-toggle="modal" title="Hapus Buku"><i class="fas fa-trash"></i></a>
                      <!-- tombol lihat -->
                      <a href="{{ route('buku_sungle', $k->buku_slug) }}" class="btn btn-sm btn-primary mb-1" title="Lihat/Baca Buku"><i class="fas fa-book"></i></a>
                      <!-- tombol download -->
                      @if($k->buku_file)
                      <a href="{{ $k->buku_file }}" target="_blank" class="btn btn-sm btn-success mb-1"><i class="fas fa-download" title="Download"></i></a>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

@foreach($buku as $k)
  <div class="modal fade" id="modal-hapus{{$k->id}}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title modal_pc">Konfirmasi Hapus</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <p>Yakin ingin dihapus?</p>
              <form action="{{ route('buku.destroy', $k->id) }}" method="post" class="d-inline" id="id_form">
              @method('delete')
              @csrf
              <input type="hidden" value="" id="{{ $k->id }}">
            </div>
          </div>
                          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endforeach

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@push('script')
<!-- DataTables -->
<script src="{{ url('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false,
      "autoWidth": true,
      "scrollX": true,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

  });
</script>
@endpush

@include('sweetalert::alert')

@endsection