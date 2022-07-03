@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Edit Berita</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/berita.'.$DataBerita->id_berita)}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" value="PUT" name="_method">
      <div class="row">
            <div class="col-md-6 pr-2">
                <label for="">Gambar</label><br>
                <input type="file" name="gambar" id="customfile">
              @error('gambar')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-6 pr-1">
            <label>Kategori Berita</label>
              <div class="form-group">
              <select class="form-control @error('kategori') 
              is-invalid @enderror" id="kategori" 
              name="kategori">
                <option value="">- Pilih Kategori -</option>
                @if (!empty($DataKategori))
                    @foreach($DataKategori as $key => $Kategori)
                        <option value="{{ $Kategori->
                       id_kategori }}"
                        @if ($Kategori->
                     id_kategori==$DataBerita->id_kategori)
                          selected
                        @endif
                        >{{ $Kategori->kategori }}</option>
                    @endforeach
                @endif
              </select>
              </div>
              @error('kategori')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" value="{{ $DataBerita->judul}}" >
              </div>
              @error('judul')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Penulis</label>
                <div class="form-group">
                <select class="form-control  @error('penerbit') 
              is-invalid @enderror" id="penulis" name="penulis">
                <option value="">- Pilih Penulis -</option>
                @if (!empty($DataPenulis))
                    @foreach($DataPenulis as $key => $Penulis)
                      <option value="{{ $Penulis->id_penulis }}"
                        @if ($Penulis->id_penulis==$DataBerita->
                        id_penulis)
                          selected
                        @endif
                        >{{ $Penulis->penulis }}</option>
                    @endforeach
                @endif
              </select>
              </div>
              @error('penulis')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>

          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Isi</label>
                <textarea class="form-control @error('isi') 
              is-invalid @enderror" name="isi" id="editor1" 
              rows="12">{{$DataBerita->isi}}</textarea>
              </div>
              @error('isi')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Tag</label><br>
                @if (!empty($DataTag))
                @foreach($DataTag as $key => $Tag)
                    <input type="checkbox" name="list_berita[]" 
                    value="{{ $Tag->id_tag }}"
                    @if (in_array($Tag->id_tag, $TagBerita))
                    checked
                    @endif
                    -> {{ $Tag->tag }} <br>
                @endforeach
                @endif
              </div>
            </div>
          </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection