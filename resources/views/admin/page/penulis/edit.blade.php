@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Edit Penulis</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/penulis.'.$DataPenulis->id_penulis)}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="PUT" name="_method">
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Nama Penulis</label>
                <input type="text" class="form-control" name="penulis" id="penulis" value="{{$DataPenulis->penulis}}" >
              </div>
              @error('penulis')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Alamat Email Penulis</label>
                <input type="text" class="form-control" name="email_penulis" id="email_penulis" value="{{$DataPenulis->email_penulis}}" >
              </div>
              @error('email_penulis')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection