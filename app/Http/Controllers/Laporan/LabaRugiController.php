<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\DataAkun;
use App\Models\DataProyek;
use App\Models\PengeluaranKas;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabaRugiController extends Controller
{
    public function index()
    {
        return view('interface.laporan.laba-rugi.index');
    }

    public function result(Request $request)
    {
        $this->validate($request, [
            'dari'   => 'required',
            'sampai' => 'required'
        ]);

        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $totalpemasukan = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');

        $pengeluarans = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 3)
            ->get();

        $totalpengeluaran = DB::table('pengeluaran_kas')
            ->whereBetween('tanggal_pengeluaran', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 3)
            ->SUM('total_pengeluaran');


        return view('interface.laporan.laba-rugi.index', compact('totalpemasukan', 'dari', 'sampai', 'pengeluarans', 'totalpengeluaran'));
    }

    public function pdf(Request $request)
    {
        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $totalpemasukan = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');

        $pengeluarans = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 3)
            ->get();

        $totalpengeluaran = DB::table('pengeluaran_kas')
            ->whereBetween('tanggal_pengeluaran', [$dari, $sampai])
            ->where('id_tipe_akun', '=', 3)
            ->SUM('total_pengeluaran');

        $pdf = PDF::loadView('export.laba-rugi', compact('totalpemasukan', 'dari', 'sampai', 'pengeluarans', 'totalpengeluaran'))->setPaper('a4', 'potrait')->setWarnings(false);
        return $pdf->stream('Laporan-Laba-Rugi' . '.pdf');
    }
}
