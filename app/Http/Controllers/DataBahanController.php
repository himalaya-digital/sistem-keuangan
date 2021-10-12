<?php

namespace App\Http\Controllers;

use App\Models\DataBahan;
use App\Models\DataProyek;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        DB::beginTransaction();
        try {
            $proyek = DataProyek::find($id_proyek);

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

            $harga_total_bahan = $proyek->harga_total_bahan + $request->total;
            $total_bayar = $harga_total_bahan + $proyek->harga_jasa;
            $sisa_bayar = $total_bayar - $proyek->bayar;
            $update_proyek_fields = [
                'harga_total_bahan' => $harga_total_bahan,
                'total_bayar' => $total_bayar,
                'sisa_bayar' => $sisa_bayar,
            ];
            $proyek->update($update_proyek_fields);

            DB::commit();
            return redirect()->route('data-proyek.edit', $id_proyek)->with('success', 'Data bahan berhasil ditambahkan');
        } catch (Exception $error) {
            DB::rollBack();
            return redirect()->route('data-proyek.edit', $id_proyek)->with('failed', $error->getMessage());
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
    public function destroy($id_bahan, $id_proyek)
    {
        DB::beginTransaction();
        try {
            $bahan = DataBahan::find($id_bahan);
            $proyek = DataProyek::find($id_proyek);
            $harga_total_bahan = $proyek->harga_total_bahan - $bahan->total;
            $total_bayar = $harga_total_bahan + $proyek->harga_jasa;
            $sisa_bayar = $total_bayar - $proyek->bayar;
            $update_proyek_fields = [
                'harga_total_bahan' => $harga_total_bahan,
                'total_bayar' => $total_bayar,
                'sisa_bayar' => $sisa_bayar,
            ];
            $proyek->update($update_proyek_fields);
            $bahan->delete();
            DB::commit();
            return redirect()->route('data-proyek.edit', $id_proyek)->with('success', 'Data bahan berhasil dihapus');
        } catch (Exception $error) {
            DB::rollBack();
            return redirect()->route('data-proyek.edit', $id_proyek)->with('failed', 'Data bahan gagal dihapus');
        }
    }
}
