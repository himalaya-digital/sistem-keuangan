<?php

namespace App\Http\Controllers;

use App\Models\DataBahan;
use App\Models\DataCustomer;
use App\Models\DataKategori;
use App\Models\DataProyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DataProyek::with(['customer'])->get();
        return view('interface.data-proyek.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = DataCustomer::all();
        $categories = DataKategori::all();
        return view('interface.data-proyek.add', compact('customers', 'categories'));
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
            'id_proyek' => 'required',
            'id_customer' => 'required',
            'nama_proyek' => 'required',
            'total_bayar' => 'required',
            'bayar' => 'required',
            'sisa_bayar' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'tanggal_bayar' => 'required',
            'keterangan_bayar' => 'required',
            'harga_total_bahan' => 'required',
            'harga_jasa' => 'required',
        ])->validate();

        $bayar = $request->bayar;
        $total_bayar = $request->total_bayar;
        $fields = [
            'id_proyek' => $request->id_proyek,
            'id_customer' => (int) $request->id_customer,
            'nama_proyek' => $request->nama_proyek,
            'total_bayar' => (int) $request->total_bayar,
            'bayar' => (int) $request->bayar,
            'sisa_bayar' => (int) $request->sisa_bayar,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'tanggal_bayar' => $request->tanggal_bayar,
            'status' => $bayar < $total_bayar ? 'belum lunas' : 'lunas',
            'keterangan_bayar' => $request->keterangan_bayar,
            'harga_total_bahan' => (int) $request->harga_total_bahan,
            'harga_jasa' => (int) $request->harga_jasa,
        ];

        $data = DataProyek::create($fields);

        foreach ($request->kategori as $kategori) {
            $bahan_fields = [
                'id_proyek' => $data->id,
                'jumlah' => $kategori['jumlah'],
                'harga_satuan' => $kategori['harga_satuan'],
                'total' => $kategori['total'],
            ];
            DataBahan::create($bahan_fields);
        }

        return redirect()->route('data-proyek.index')->with('success', 'Data proyek berhasil ditambahkan');
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
