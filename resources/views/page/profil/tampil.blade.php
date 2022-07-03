@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
    <h4 style="margin:20px;">Profile Admin</h4>
@endsection

          @section('main-content')
              <div class="image">
                <img src="public/admin/assets/img/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="{{asset('public/foto/'.Auth::user()->foto)}}" alt="...">
                  </a>

                  @if (session('status'))
                  <div class="alert alert-success">{!! session()->get('status') !!}</div>
                  @endif
                  
                  <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <td width="20%"><strong>Nama</strong></td>
                      <td width="80%">{{ Auth::user()->name}}</td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>Alamat E-mail</strong></td>
                      <td width="80%">{{ Auth::user()->email}}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <a href="{{url('/profil.'.Auth::user()->id.'.edit')}}">
                      <button type="submit" class="btn btn-primary btn-round">Edit Profile</button></a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        @endsection