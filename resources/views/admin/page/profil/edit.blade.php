@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Edit Profile</h4> 
        <div class="col-md-6 pr-1">
          <a href="{{url('/profil')}}"><button class="btn btn-warning btn-round" >Kembali</button>
        </div>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/profil.'.Auth::user()->id)}}" enctype="multipart/form-data">
      @csrf
        <input type="hidden" value="PUT" name="_method">
        <div class="row">
            <div class="col-md-6 pr-2">
                <input type="file" name="foto" id="customfile">
              @error('foto')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="{{ Auth::user()->name }}">
              </div>
              @error('nama')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="email" value="{{ Auth::user()->email }}">
              </div>
              @error('email')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>
            <button type="submit" class="btn btn-primary btn-round">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection