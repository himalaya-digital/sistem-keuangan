<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\AsetAktif;
use App\Models\DataProyek;
use App\Models\ModalAwal;
use App\Models\PengeluaranKas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LaporanNeracaController extends Controller
{
    public function index()
    {
        $is_search = false;
        return view('interface.laporan.neraca.index', compact('is_search'));
    }

    public function results(Request $request)
    {
        $this->validate($request, [
            'dari'   => 'required',
            'sampai' => 'required'
        ]);

        $is_search = true;
        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $kas = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');
        $beban = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->whereRelation('dataakun', 'tipe_akun', 'beban')->sum('total_pengeluaran');
        $modal = ModalAwal::whereBetween('created_at', [$dari, $sampai])->sum('jumlah');
        $assets = AsetAktif::whereBetween('tanggal_akuisisi', [$dari, $sampai])->get();
        $assets_sum = AsetAktif::whereBetween('tanggal_akuisisi', [$dari, $sampai])->sum('biaya_akuisisi');

        $aktiva = $kas + $assets_sum;
        $pasiva = $beban + $modal;

        return view('interface.laporan.neraca.index', compact('is_search', 'kas', 'beban', 'modal', 'assets', 'assets_sum', 'aktiva', 'pasiva', 'dari', 'sampai'));
    }

    public function export(Request $request)
    {
        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $kas = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');
        $beban = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->whereRelation('dataakun', 'tipe_akun', 'beban')->sum('total_pengeluaran');
        $modal = ModalAwal::whereBetween('created_at', [$dari, $sampai])->sum('jumlah');
        $assets = AsetAktif::whereBetween('tanggal_akuisisi', [$dari, $sampai])->get();
        $assets_sum = AsetAktif::whereBetween('tanggal_akuisisi', [$dari, $sampai])->sum('biaya_akuisisi');

        $aktiva = $kas + $assets_sum;
        $pasiva = $beban + $modal;

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('export.neraca', compact('kas', 'beban', 'modal', 'assets', 'assets_sum', 'aktiva', 'pasiva', 'dari', 'sampai'))->setPaper('a4', 'potrait')->setWarnings(false);
        return $pdf->stream('Laporan-Neraca', '.pdf');
    }
}
