<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pegawai;

use App\Models\Kategori;

use App\Models\Kebutuhan;

use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'pegawai'=>Pegawai::join('kebutuhans','kebutuhans.id_kebutuhan', '=','pegawais.id_kebutuhan')
            ->join('kategoris','kategoris.id_kategori', '=' , 'pegawais.id_kategori')->get(),
            'kategori'=>Kategori::all(),
            'kebutuhan'=>Kebutuhan::all(),
    ];
    return view('layout.pegawai', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.pegawai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'Nama_pegawai' => 'required|string|max:255',
            'No' => 'required|string|max:255',
            'Bagian' =>'required|string|max:255',
        ]);
        Pegawai::insert([
            'nama_pegawai' => $request->Nama_pegawai,
            'no_whatsapp' => $request->No,
            'bagian' => $request->Bagian,
            'id_kategori' => $request->kategori,
            'id_kebutuhan' => $request->kebutuhan,
        ]); 
        return redirect('pegawai');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model= Pegawai::find($id);
        $model->delete();
        return redirect('pegawai');
    }
}
