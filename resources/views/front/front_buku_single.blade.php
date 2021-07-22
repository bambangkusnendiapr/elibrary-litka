@extends('layouts.front_master')

@section('front_buku','active')

@section('front_content')

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Baca Buku</h2>
      <ol>
        <li><a href="{{ route('front')}}">Home</a></li>
        <li><a href="{{ route('front_buku')}}">Buku</a></li>
        <li>Baca Buku</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    <div class="row">
      <div class="col-12">

        <!-- card informasi buku-->
        <div class="card">
          <div class="card-header">
            Judul Buku : {{ $buku->buku_judul }}
          </div>

          <!-- card body -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
              @if($buku->buku_gambar)
                <a href="#" class="d-flex justify-content-center">
                  <img id="img" src="{{ url('images/')}}/{{$buku->buku_gambar}}" width="200px"/>
                </a>
              @else
                <a href="#" class="d-flex justify-content-center">
                  <img id="img" src="{{ url('images/avatar.jpg')}}" width="70px"/>                      
                </a>
              @endif
              </div>

              <div class="col-md-6">
                <table class="table table-striped table-sm table-hover">
                  <tbody>
                    <tr>
                      <td><i class="icofont-user-suited"></i></td>
                      <td>Pengarang</td>
                      <td>:</td>
                      <td>{{ $buku->pengarang->pengarang_nama }}</td>
                    </tr>
                    <tr>
                      <td><i class="icofont-building"></i></td>
                      <td>Penerbit</td>
                      <td>:</td>
                      <td>
                        @if ($buku->penerbit->penerbit_nama == "Lainnya")
                          {{ "-" }}
                        @else
                          {{ $buku->penerbit->penerbit_nama }}
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td><i class="icofont-tag"></i></td>
                      <td>Kategori</td>
                      <td>:</td>
                      <td>{{ $buku->kategori->kategori_nama }}</td>
                    </tr>
                    <tr>
                      <td><i class="icofont-ui-calendar"></i></td>
                      <td>Tahun</td>
                      <td>:</td>
                      <td>{{ Carbon\Carbon::parse($buku->buku_tahun)->year }}</td>
                    </tr>
                    <tr>
                      <td><i class="icofont-world"></i></td>
                      <td>Kota Terbit</td>
                      <td>:</td>
                      <td>{{ $buku->buku_kota }}</td>
                    </tr>
                    <tr>
                      <td><i class="icofont-eye-open"></i></td>
                      <td>Lihat</td>
                      <td>:</td>
                      <td>{{ $buku->buku_lihat }} x lihat</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-2">
              @if(!Auth::guest())
                @if($buku->buku_file)
                  <a href="{{ $buku->buku_file }}" target="_blank" class="btn btn-success"><i class="icofont-download-alt"></i> Download</a>
                @else
                  <button class="btn btn-secondary">Buku Belum Ada</button>
                @endif
              @else
                <a href="https://api.whatsapp.com/send?phone=6287881791025&text=Bismillah,%20Kang,%20izin%20download%20buku%20PERSIS." target="_blank" class="btn btn-success">Izin Download</a>
              @endif
              </div>
            </div>            
          </div>
          <!-- /.card-body -->
          
        </div>
        <!-- /card informasi buku-->

        <br>

        <!-- card baca Buku -->
        <div class="card">
          <div class="card-body">

            @if($buku->buku_file)
            <!-- pdf -->
            <!-- <embed type="application/pdf" src="{{ url('files/')}}/{{$buku->buku_file}}#toolbar=0" width="100%" height="1000px"></embed> -->

            <div style="width: 100%; height: 1000px; position: relative;"> 
              <iframe src="{{ $buku->buku_file }}" width="100%" height="1000" frameborder="0" scrolling="no" seamless=""></iframe>
              <div style="width: 40px; height: 40px; position: absolute; opacity: 0; right: 12px; top: 12px;">&nbsp;</div>
            </div>
            <!-- /pdf -->
            @else
              <p class="text-center text-danger">Buku Belum Tersedia Untuk Dibaca</p>
            @endif
          </div>
        </div>
        <!-- /card baca buku -->

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