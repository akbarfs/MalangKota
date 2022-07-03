@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Tambah User</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/user')}}" enctype="multipart/form-data">
      @csrf
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
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" >
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
                <input type="email" class="form-control" name="email" id="email" placeholder="email">
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
                <input type="password" class="form-control" name="password" id="password" placeholder="password">
              </div>
              @error('password')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
            <label>Level</label>
              <div class="form-group">
                <select name="level" class="form-control" id="level">
                  <option value="Superadmin">Superadmin</option>
                  <option value="Admin">Admin</option>
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