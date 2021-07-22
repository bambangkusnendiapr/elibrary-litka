@extends('layouts.front_master')

@section('front_buku','active')

@section('front_content')

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Daftar Buku</h2>
      <ol>
        <li><a href="{{ route('front')}}">Home</a></li>
        <li>Buku</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-striped">
              <thead>
              <tr class="text-center">
                <th>#</th>
                <th>GAMBAR</th>
                <th>JUDUL</th>
                <th>PENGARANG</th>
                <th>LIHAT</th>
                <th>AKSI</th>                
              </tr>
              </thead>
              @foreach($buku as $e=>$data)
                <tr>
                  <td class="align-middle">{{ $e+1 }}</td>
                  <td class="text-center">
                    @if($data->buku_gambar)
                      <a href="{{ route('buku_sungle', $data->buku_slug) }}">
                        <img id="img" src="{{ url('images/')}}/{{$data->buku_gambar}}" width="70px"/>
                      </a>
                    @else
                      <a href="#">
                        <img id="img" src="{{ url('images/avatar.jpg')}}" width="70px"/>                      
                      </a>
                    @endif
                  </td>
                  <td class="align-middle"><a href="{{ route('buku_sungle', $data->buku_slug) }}">{{ $data->buku_judul }}</a></td>
                  <td class="align-middle">{{ $data->pengarang->pengarang_nama }}</td>
                  <td class="text-right align-middle">{{ $data->buku_lihat }} x lihat</td>
                  <td class="text-center align-middle">
                    <a href="{{ route('buku_sungle', $data->buku_slug) }}" class="btn btn-sm btn-primary" title="Lihat/Baca Buku"><i class="icofont-book"></i></a>
                    @if(!Auth::guest())
                      @if($data->buku_file)
                        <a href="{{ $data->buku_file }}" target="_blank" class="btn btn-sm btn-success" title="Download"><i class="icofont-download-alt"></i></a>
                      @endif
                    @endif
                  </td>
                </tr>
              @endforeach
              <tbody>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>

      </div>
    </div>
  </div>
</section>

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
   $(document).bind("contextmenu",function(e){
      return false;
   });
});
</script>
@endpush

@endsection