<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\PengeluaranKas;
use PDF;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        return view('interface.laporan.pengeluaran.index');
    }

    public function result(Request $request)
    {
        $this->validate($request, [
            'dari'   => 'required',
            'sampai' => 'required'
        ]);

        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $pengeluarans = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->get();
        $total = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->sum('total_pengeluaran');

        return view('interface.laporan.pengeluaran.index', compact('pengeluarans', 'total', 'dari', 'sampai'));
    }

    public function pdf(Request $request)
    {
        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $pengeluarans = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->get();
        $total = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->sum('total_pengeluaran');

        $pdf = PDF::loadView('export.pengeluaran', compact('pengeluarans', 'total'))->setPaper('a4', 'potrait')->setWarnings(false);
        return $pdf->stream('Laporan-Pengeluaran-Kas' . '.pdf');
    }
}
