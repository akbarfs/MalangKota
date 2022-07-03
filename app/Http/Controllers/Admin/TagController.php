<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Tag;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 2;
        $data_tag = Tag::orderBy('tag')->paginate($batas);
        $no = ($batas * ($data_tag->currentpage()-1))+1;
        return view('admin.page.tag.tampil',['DataTag' => $data_tag, 'no'=>$no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.tag.tambah');
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
            'tag' => 'tag',
        ])->validated();

        $tag = new Tag;
        $tag->tag = $request->tag;
        $tag->save();
        return redirect('/tag')->with('status', 'Data User berhasil ditambahkan');
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
        $data_tag = Tag::find($id);
        return view('admin.page.tag.edit',['DataTag' => $data_tag]);
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
            'tag' => 'required',
        ])->validated();

        $data_tag = Tag::find($id);
        $data_tag->tag = $request->tag;
        $data_tag->update();
        return redirect('/tag')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_tag = Tag::find($id);
        $data_tag->delete();
        return redirect('/tag')->with('status','Data Berhasil Dihapus');;
    }

    public function search(Request $request)
    {
        $batas = 2;
        $cari = $request->katakunci;
        $data_tag = Tag::where('tag','like',"%".$cari."%")->orderBy('tag')->paginate($batas);
        $jumlah_data = $data_tag->count("id");
        $no = ($batas * ($data_tag->currentpage()-1))+1;
        return view('admin.page.tag.cari',['DataTag' => $data_tag,'JumlahDataTag'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

}
