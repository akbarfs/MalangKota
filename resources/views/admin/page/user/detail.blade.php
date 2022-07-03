@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Detail Data User</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
      @csrf
      <div class="row">
            <div class="col-md-6 pr-2">
            <div class="form-group">
                <label>Foto</label><br>
                <img src="{{asset('public/foto/'.$DataUser->foto)}}" class="img-fluid" width="200px">
              </div>
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" disabled="" value="{{ $DataUser->name }}" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Email</label>
                <input class="form-control" disabled="" value="{{ $DataUser->email }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Level</label>
                <input class="form-control" disabled="" value="{{ $DataUser->level }}">
              </div>
            </div>
          </div>
          <a href="{{url('/user')}}">
            <button class="btn btn-primary">Kembali</button></a>
          </div>
      </div>
    </div>
  </div>
@endsection