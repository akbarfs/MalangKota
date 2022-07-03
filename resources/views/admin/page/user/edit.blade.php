@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Edit User</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/user.'.$DataUser->id)}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="put" name="_method">
      <div class="row">
            <div class="col-md-6 pr-2">
                <input type="file" name="foto" id="customfile"><br>
                <span class="text-danger" style="font-weight:lighter;font-size:12px">*Jika foto tidak ingin dirubah maka anda tidak perlu mengupload foto</span>
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ $DataUser->name }}" >
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
                <input type="email" class="form-control" name="email" id="email" value="{{ $DataUser->email }}">
              </div>
              @error('email')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" value=" ">
                <span class="text-danger" style="font-weight:lighter;font-size:12px">*Jangan disi jika password tidak ingin dirubah</span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
            <label>Level</label>
              <div class="form-group">
                <select name="level" class="form-control" id="level">
                  <option value="Superadmin"
                  @if($DataUser->level=="Superadmin") selected
                  @endif >Superadmin</option>
                  <option value="Admin" @if($DataUser->level=="Superadmin") selected
                  @endif >Admin</option>
                </select>
              </div>
              @error('level')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection