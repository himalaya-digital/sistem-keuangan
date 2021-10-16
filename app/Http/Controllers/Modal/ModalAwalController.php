<?php

namespace App\Http\Controllers\Modal;

use App\Http\Controllers\Controller;
use App\Models\ModalAwal;
use Illuminate\Http\Request;

class ModalAwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $initial_capital = ModalAwal::all();
        return view('interface.modal.modal-awal.index', compact('initial_capital'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("interface.modal.modal-awal.create");
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
            'jumlah' => $request->jumlah,
        ];

        ModalAwal::create($fields);
        return redirect()->route('modal-awal.index')->with('success', 'Modal awal berhasil ditambahkan');
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
        $data = ModalAwal::find($id);
        return view('interface.modal.modal-awal.edit', compact('data'));
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
        $data = ModalAwal::find($id);
        $fields = [
            'jumlah' => $request->jumlah,
        ];
        $data->update($fields);

        return redirect()->route('modal-awal.index')->with('success', 'Modal awal berhasil diupdate');
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
