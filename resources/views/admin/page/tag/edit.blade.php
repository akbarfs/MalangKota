@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Edit Tag</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/tag.'.$DataTag->id_tag)}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="PUT" name="_method">
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Nama Tag</label>
                <input type="text" class="form-control" name="tag" id="tag" value="{{$DataTag->tag}}" >
              </div>
              @error('tag')
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