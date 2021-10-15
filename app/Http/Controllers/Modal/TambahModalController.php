<?php

namespace App\Http\Controllers\Modal;

use App\Http\Controllers\Controller;
use App\Models\PenambahanModal;
use Illuminate\Http\Request;

class TambahModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modals = PenambahanModal::latest()->get();
        return view('interface.modal.tambah-modal', compact('modals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interface.modal.add-tambah-modal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = [
            'penambahan'         => $request->penambahan,
            'tanggal_penambahan' => $request->tanggal_penambahan
        ];

        PenambahanModal::create($fields);
        return redirect()->route('tambah-modal.index')->with('success', 'Penambahan modal berhasil ditambahkan');
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
        $data = PenambahanModal::find($id);
        return view('interface.modal.edit-tambah-modal', compact('data'));
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
        $data = PenambahanModal::find($id);
        $fields = [
            'penambahan'         => $request->penambahan,
            'tanggal_penambahan' => $request->tanggal_penambahan
        ];
        $data->update($fields);

        return redirect()->route('tambah-modal.index')->with('success', 'Penambahan modal berhasil diupdate');
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
