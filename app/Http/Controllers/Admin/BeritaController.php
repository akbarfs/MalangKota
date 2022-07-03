<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Tag;
use App\Models\Penulis;
use Validator;
use public\assets\img;
use File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 2;
        $data_berita = Berita::orderBy('judul')->paginate($batas);
        $no = ($batas * ($data_berita->currentpage()-1))+1;
        return view('admin.page.berita.tampil',['DataBerita' => $data_berita, 'no'=>$no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kategori = Kategori::orderBy('kategori','asc')->get();
        $data_tag = Tag::orderBy('tag','asc')->get();
        $data_penulis = Penulis::orderBy('penulis','asc')->get();
        return view('admin.page.berita.tambah',['DataKategori' => $data_kategori,'DataTag' => $data_tag, 'DataPenulis' => $data_penulis]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
        ])->validated();

        $berita= new Berita;
        $berita->id_kategori = $request->kategori;
        $berita->judul = $request->judul;
        $berita->id_penulis = $request->penulis;
        $berita->isi = $request->isi;
        $gambar = $request->gambar;
        $namafile = time().'.'.$gambar->
        getClientOriginalExtension();
        $gambar->move('public/assets/img/',$namafile);
        $berita->gambar = $namafile;
        $berita->save();
        $berita->tag()->attach($request->input("list_berita"));
        return redirect('/berita')->with('status', 
        'Data buku berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_berita = Berita::find($id);
        return view('admin.page.berita.detail',['DataBerita' => $data_berita]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_berita = Berita::find($id);
        $data_kategori = Kategori::orderBy('kategori','asc')->get();
        $data_penulis = Penulis::orderBy('penulis','asc')->get();
        $data_tag = Tag::orderBy('tag','asc')->get();
        $tag_berita = $data_berita->tag->pluck('id_tag')->toArray();
        return view('admin.page.berita.edit', ['DataBerita' => $data_berita,'DataKategori' => $data_kategori, 'DataPenulis' => $data_penulis, 'DataTag' => $data_tag, 'TagBerita' => $tag_berita ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kategori' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png',
        ])->validated();

        $data_berita = Berita::find($id);

        if($request->has('gambar')){
            if(File::exists('public/assets/img/'.$namafileold)) {
                File::delete('public/assets/img/'.$namafileold);
            }
            $data_berita->id_kategori = $request->kategori;
            $data_berita->judul = $request->judul;
            $data_berita->id_penulis = $request->penulis;
            $data_berita->isi = $request->isi;
            $gambar = $request->gambar;
            $namafile = time().'.'.$gambar->
            getClientOriginalExtension();
            $gambar->move('public/assets/img/',$namafile);
            $data_berita->gambar = $namafile;
        }else{
            $data_berita->id_kategori = $request->kategori;
            $data_berita->judul = $request->judul;
            $data_berita->id_penulis = $request->penulis;
            $data_berita->isi = $request->isi;
        }
        $data_berita->update();
        return redirect('/berita')->with('status','Data berita berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_berita = Berita::find($id);
        $namafile = $data_berita->gambar;
        if(File::exists('public/assets/img/'.$namafile)) {
            File::delete('public/assets/img/'.$namafile);
        }
        $data_berita->delete();
        return redirect('/berita')->with('status', 
        'Data buku berhasil dihapus');
    }
    
    public function search(Request $request)
    {
        $batas = 2;
        $cari = $request->katakunci;
        $data_berita = Berita::where('judul','like',"%".$cari."%")->orderBy('judul')->paginate($batas);
        $jumlah_data = $data_berita->count("id");
        $no = ($batas * ($data_berita->currentpage()-1))+1;
        return view('admin.page.berita.cari',['DataBerita' => $data_berita,'JumlahDataBerita'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

}
