<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\DataKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataKategoriController extends Controller
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
        $datas = DataKategori::all();
        return view('interface.master-data.data-kategori', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interface.master-data.add-data-kategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'id_kategori'   => 'required|unique:data_kategoris',
            'nama_kategori' => 'required|max:15',
            'harga_satuan'  => 'required',
            'harga_beli'    => 'required',
        ])->validate();

        $fields = [
            'id_kategori'   => strtolower($request->id_kategori),
            'nama_kategori' => strtolower($request->nama_kategori),
            'harga_satuan'  => (int) $request->harga_satuan,
            'harga_beli'    => $request->harga_beli,
        ];

        DataKategori::create($fields);
        return redirect()->route('data-kategori.index')->with('success', 'Data kategori berhasil ditambahkan');
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
        $datas = DataKategori::find($id);
        return view('interface.master-data.edit-data-kategori', compact('datas'));
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
        $datas = DataKategori::find($id);

        Validator::make($request->all(), [
            'nama_kategori' => 'required|max:15',
            'harga_satuan' => 'required'
        ])->validate();

        $fields = [
            'id_kategori'   => $datas->id_kategori,
            'nama_kategori' => strtolower($request->nama_kategori),
            'harga_satuan'  => $request->harga_satuan,
            'harga_beli'    => $request->harga_beli,
        ];

        $datas->update($fields);
        return redirect()->route('data-kategori.index')->with('success', 'Data kategori berhasil diubah');
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
