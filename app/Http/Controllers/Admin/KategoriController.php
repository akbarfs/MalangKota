<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 2;
        $data_kategori = Kategori::orderBy('kategori')->paginate($batas);
        $no = ($batas * ($data_kategori->currentpage()-1))+1;
        return view('admin.page.kategori.tampil',['DataKategori' => $data_kategori, 'no'=>$no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.kategori.tambah');
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
        ])->validated();

        $kategori = new Kategori;
        $kategori->kategori = $request->kategori;
        $kategori->save();
        return redirect('/kategori')->with('status', 'Data User berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_kategori = Kategori::find($id);
        return view('admin.page.kategori.edit',['DataKategori' => $data_kategori]);
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
        ])->validated();

        $data_kategori = Kategori::find($id);
        $data_kategori->kategori = $request->kategori;
        $data_kategori->update();
        return redirect('/kategori')->with('status', 'Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_kategori = Kategori::find($id);
        $data_kategori->delete();
        return redirect('/kategori')->with('status','Data Berhasil Dihapus');;
    }

    public function search(Request $request)
    {
        $batas = 2;
        $cari = $request->katakunci;
        $data_kategori = Kategori::where('kategori','like',"%".$cari."%")->orderBy('kategori')->paginate($batas);
        $jumlah_data = $data_kategori->count("id");
        $no = ($batas * ($data_kategori->currentpage()-1))+1;
        return view('admin.page.kategori.cari',['DataKategori' => $data_kategori,'JumlahDataKategori'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

}
