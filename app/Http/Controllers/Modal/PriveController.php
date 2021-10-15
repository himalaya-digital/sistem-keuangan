<?php

namespace App\Http\Controllers\Modal;

use App\Http\Controllers\Controller;
use App\Models\Prive;
use Illuminate\Http\Request;

class PriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Prive::latest()->get();
        return view('interface.modal.prive.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interface.modal.prive.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $field = [
            'jumlah'        => $request->jumlah,
            'tanggal_prive' => $request->tanggal_prive
        ];

        Prive::create($field);
        return redirect()->route('prive.index')->with('success', 'Penambahan data prive berhasil ditambahkan');
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
        $datas = Prive::find($id);
        return view('interface.modal.prive.edit', compact('datas'));
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
        $data = Prive::find($id);
        $field = [
            'jumlah'        => $request->jumlah,
            'tanggal_prive' => $request->tanggal_prive
        ];
        $data->update($field);
        return redirect()->route('prive.index')->with('success', 'Penambahan data prive berhasil diupdate');
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
