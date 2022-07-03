<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use File;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.profil.tampil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('admin.page.profil.edit');
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
            'nama' => 'required',
            'email' => 'required|email',
            'foto' => 'required|image|mimes:jpeg,jpg,png,gif'
        ])->validated();

        $user = User::find($id);
        if($request->has('foto')){
            $namafileold = $user->foto;
            if(File::exists('public/foto/'.$namafileold)){
                File::delete('public/foto/'.$namafileold);
            }
            $user->name = $request->nama;
            $user->email = $request->email;
            $foto = $request->foto;
            $namafile = time().'.'.$foto->getClientOriginalExtension();
            $foto->move('public/foto/',$namafile);
            $user->foto = $namafile;    
        }else{
            $user->name = $request->nama;
            $user->email = $request->email;
        }
        $user->update();

        return redirect('/profil')->with('status', 'Profil berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
