<?php

namespace App\Http\Controllers;

use App\Models\DataBahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataBahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($id_proyek, Request $request)
    {
        Validator::make($request->all(), [
            'nama_kategori' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
            'total' => 'required',
        ])->validate();

        $id_kategori = explode(',', $request->nama_kategori)[0];
        $fields = [
            'id_proyek' => (int) $id_proyek,
            'id_kategori' => (int) $id_kategori,
            'jumlah' => (int) $request->jumlah,
            'harga_satuan' => (int) $request->harga_satuan,
            'total' => (int) $request->total,
        ];
        DataBahan::create($fields);
        return redirect()->route('data-proyek.edit', $id_proyek)->with('success', 'Data bahan berhasil ditambahkan');
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
    public function destroy($id_bahan, $id_proyek)
    {
        $bahan = DataBahan::find($id_bahan);
        $bahan->delete();
        return redirect()->route('data-proyek.edit', $id_proyek)->with('success', 'Data bahan berhasil dihapus');
    }
}
