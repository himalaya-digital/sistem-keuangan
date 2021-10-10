<?php

namespace App\Http\Controllers;

use App\Models\DataProyek;
use App\Models\PelunasanProyek;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PelunasanProyekController extends Controller
{
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
    public function create($id_proyek)
    {
        $project = DataProyek::find($id_proyek);
        $settlements = PelunasanProyek::where('id_proyek', $id_proyek)->get();
        return view('interface.data-proyek.create-pelunasan-proyek', compact('project', 'settlements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_proyek)
    {
        DB::beginTransaction();
        try {
            Validator::make($request->all(), [
                'id_pelunasan_proyek' => 'required',
                'id_proyek' => 'required',
                'tanggal_pembayaran' => 'required',
                'jumlah_bayar_piutang' => 'required',
            ])->validate();

            $project = DataProyek::find($request->id_proyek);
            $sisa_piutang = (int) $project->sisa_bayar - (int) $request->jumlah_bayar_piutang;
            $update_fields = [
                'sisa_bayar' => $project->sisa_bayar < 0 ? 0 : $sisa_piutang,
                'bayar' => (int) $project->bayar + (int) $request->jumlah_bayar_piutang,
                'status' => $sisa_piutang > 0 ? 'belum lunas' : 'lunas',
            ];
            $project->update($update_fields);

            $fields = [
                'id_pelunasan_proyek' => $request->id_pelunasan_proyek,
                'id_proyek' => $request->id_proyek,
                'tanggal_pembayaran' => $request->tanggal_pembayaran,
                'jumlah_bayar' => (int) $request->jumlah_bayar_piutang,
                'sisa_piutang' => $sisa_piutang
            ];
            PelunasanProyek::create($fields);

            DB::commit();
            return redirect()->route('pelunasan-proyek.create', ['id_proyek' => $id_proyek])->with('success', 'Data pelunasan proyek berhasil ditambahkan');
        } catch (Exception $error) {
            DB::rollBack();
            return redirect()->route('pelunasan-proyek.create', ['id_proyek' => $id_proyek])->with('failed', $error->getMessage());
        }
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
        //
    }
}
