<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\DataCustomer;
use App\Models\DataProyek;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LaporanDataProyekController extends Controller
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
    public function index(Request $request)
    {
        $customers = DataCustomer::all();
        $projects = DataProyek::all();
        $selected = DataProyek::where('id', (int) $request->nama_proyek)->whereRelation('customer', 'id', (int) $request->nama_customer)->first();
        return view('interface.laporan.data-proyek.index', compact('customers', 'projects', 'selected'));
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

    public function print(Request $request)
    {
        $project = DataProyek::where('id', (int) $request->nama_proyek)->whereRelation('customer', 'id', (int) $request->nama_customer)->first();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('interface.data-proyek.print', compact('project'))->setPaper('a4', 'potrait')->setWarnings(false);
        return $pdf->stream('Laporan-Data-Proyek', '.pdf');
    }
}
