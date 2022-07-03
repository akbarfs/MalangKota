@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
    <h4 style="margin:20px;">Daftar Penulis</h4>
    <div class="col">
      <form method="get" action="{{url('/penulis.cari')}}">
      <div class="input-group no-border">
        <input type="text" value="" class="form-control" placeholder="Search..." id="kata_kunci" name="katakunci">
          <div class="input-group-append">
            <div class="input-group-text">
              <button type="submit" class="btn btn-primary nc-icon nc-zoom-split" title="Cari"></button>
            </div>
          </div>
      </div>
    </form>
    </div>
    <div class="col"><a href="{{url('/penulis.tambah')}}">
    <button class="btn btn-primary" ><i class="nc-icon nc-simple-add"></i> Tambah</button></a>
    </div>

@endsection

          @section('main-content')
                  @if (session('status'))
                  <div class="alert alert-success">{!! session()->get('status') !!}</div>
                  @endif
                  
                  <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                    <tr>
                      <th width="5%"><strong>No</strong></th>
                      <th width="30%"><strong>Penulis</strong></th>
                      <th width="30%"><strong>Alamat Email Penulis</strong></th>
                      <th width="35%"><strong>Action</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                  @if (!empty($DataPenulis))
                  @foreach($DataPenulis as $key => $Penulis)
                    <tr>
                      <td align="center">{{$no}}</td>
                      <td>{{$Penulis->penulis}}</td>
                      <td>{{$Penulis->email_penulis}}</td>
                      <td align="center">
                        <form action="{{url('/penulis.'.$Penulis->id_penulis)}}" method="Post" onsubmit="return confirm('Apakah data ingin dihapus?')">
                        @csrf
                        <a href="{{url('/penulis.'.$Penulis->id_penulis.'.edit')}}" class="btn btn-xs btn-info" title="Edit"><i class="nc-icon nc-settings-gear-65"></i></a>
                        <input type="hidden" value="DELETE" name="_method">
                        <button type="submit" class="btn btn-xs btn-info" title="Hapus"><i class="nc-icon nc-simple-remove"></i></button>
                      </form>
                      </td>
                    </tr>
                    @php
                    $no++
                    @endphp
                    @endforeach
                  @endif
                  </tbody>
                  </table>
                  </div>
                <ul class="pagination">
                    {{$DataPenulis->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection