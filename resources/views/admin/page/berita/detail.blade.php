@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Detail Berita</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
      @csrf
      <div class="row">
        <div class="col-md-6 pr-2">
          <label for="">Gambar</label>
        </div>
      </div>
        <br>
          <img style="width:100%;height:250px;object-fit:cover;" src="{{asset('public/assets/img/'.$DataBerita->gambar)}}">
            <br>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td width="30%"><strong>Kategori Berita</strong></td>
                <td width="70%">{{$DataBerita->kategori->kategori}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Judul Berita</strong></td>
                <td width="70%">{{$DataBerita->judul}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Penulis</strong></td>
                <td width="70%">{{$DataBerita->penulis->penulis}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Isi Berita</strong></td>
                <td width="70%">{{$DataBerita->isi}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Tag Berita</strong></td>
                <td width="70%">
                  <ul>
                    @foreach($DataBerita->tag as $tag)
                    <li>{{$tag->tag}}</li>
                    @endforeach
                  </ul>
                </td>
              </tr>
            </tbody>
          </table>
          <a href="{{url('/berita')}}">
            <button class="btn btn-primary">Kembali</button></a>
      </div>
    </div>
  </div>
@endsection