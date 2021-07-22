@extends('layouts.master')

@section('buku','active')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Buku / Tambah Data Buku</h1>
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
                <h5>Form Tambah Data Buku</h5>
              </div>
              <!-- /.card-header -->

              <!-- .card-body -->
              <div class="card-body">
                <form role="form" method="post" action="{{ route('buku.store') }}" class="form-horizontal" id="form_tambah" enctype="multipart/form-data">
                @csrf

                  <!-- Judul Buku -->
                  <div class="form-group row">
                    <label for="nama" class="col-form-label">Judul Buku</label>  @error('judul') <span class="text-danger font-italic">{{ $message }}</span>@enderror
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul Buku" value="{{old('judul')}}">
                  </div>
                  <!-- /Judul Buku -->

                  <!-- Pangarang -->
                  <div class="form-group">
                    <label>Pengarang</label>@error('pengarang') <span class="text-danger font-italic">{{ $message }}</span>@enderror
                    <select name="pengarang" class="form-control select2bs4 @error('pengarang') is-invalid @enderror">
                    <option disabled selected value="">--Pilih Pengarang--</option>
                      @foreach($pengarang as $data)
                      <option value="{{$data->id}}" {{ old('pengarang') == $data->id ? 'selected' : '' }}>{{$data->pengarang_nama}}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- /Pengarang -->

                  <!-- Kategori -->
                  <div class="form-group">
                    <label>Kategori Buku</label>@error('kategori') <span class="text-danger font-italic">{{ $message }}</span>@enderror
                    <select name="kategori" class="form-control select2bs4 @error('kategori') is-invalid @enderror">
                    <option disabled selected value="">--Pilih Kategori Buku--</option>
                      @foreach($kategori as $data)
                      <option value="{{$data->id}}" {{ old('kategori') == $data->id ? 'selected' : '' }}>{{$data->kategori_nama}}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- /Kategori -->

                  <!-- Penerbit -->
                  <div class="form-group">
                    <label>Penerbit</label>@error('penerbit') <span class="text-danger font-italic">{{ $message }}</span>@enderror
                    <select name="penerbit" class="form-control select2bs4 @error('penerbit') is-invalid @enderror">
                    <option disabled selected value="">--Pilih Penerbit--</option>
                      @foreach($penerbit as $data)
                      <option value="{{$data->id}}" {{ old('penerbit') == $data->id ? 'selected' : '' }}>{{$data->penerbit_nama}}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- /Penerbit -->

                  <!-- Tahun Terbit -->
                  <div class="form-group col-md-4">
                    <label>Tahun Terbit</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" name="tahun" class="form-control kategori_nama" placeholder="Judul Buku">
                      </div>
                  </div>
                  <!-- /Tahun Terbit -->

                  <!-- Kota Terbit buku -->
                  <div class="form-group">
                    <label for="nama">Kota Terbit Buku</label>
                    <input type="text" name="kota" class="form-control kategori_nama" value="{{old('kota')}}">
                  </div>
                  <!-- /Kota Terbit buku -->

                  <!-- Cover Buku -->
                  <div class="form-group">
                    <img id="img" src="{{ url('images/avatar.jpg')}}" width="100px" height="100px"/>
                  </div>

                  <div class="form-group"> 
                    <label><strong>Cover Buku</strong></label>@error('filefoto') <span class="text-danger font-italic">{{ $message }}</span>@enderror
                    <div class="custom-file mb-3">
                        <input type="file" name="filefoto" class="custom-file-input @error('filefoto') is-invalid @enderror" id="filefoto">
                        <label class="custom-file-label" for="filefoto">Pilih Gambar</label>
                        <div class="text-default">
                          Max: 2mb
                        </div>
                    </div>
                  </div>
                  <!-- /Cover buku -->

                  <!-- File PDF -->
                  <div class="form-group">
                    <label>Link PDF</label>  @error('pdf') <span class="text-danger font-italic">{{ $message }}</span>@enderror
                    <input type="text" name="pdf" class="form-control @error('pdf') is-invalid @enderror" placeholder="Link pdf" value="{{old('pdf')}}">
                  </div>
                  <!-- /File PDF -->

                  <!-- Keterangan -->
                  <div class="form-group">
                      <label for="ket">Keterangan</label>
                      <textarea class="form-control summernote" name="ket">{{old('ket')}}</textarea>
                  </div>
                  <!-- /Keterangan -->

                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ url('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ url('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@push('script')
<!-- Select2 -->
<script src="{{ url('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ url('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    bsCustomFileInput.init();

    $('#filefoto').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
      {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
          }
        reader.readAsDataURL(input.files[0]);
      }
    });

  });
</script>
@endpush

@endsection