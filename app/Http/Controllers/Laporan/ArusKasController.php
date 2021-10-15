<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\AsetAktif;
use App\Models\DataAkun;
use App\Models\DataProyek;
use App\Models\PenambahanModal;
use App\Models\PengeluaranKas;
use App\Models\Prive;
use PDF;
use Illuminate\Http\Request;

class ArusKasController extends Controller
{
    public function index()
    {
        return view('interface.laporan.arus-kas.index');
    }

    public function result(Request $request)
    {
        $this->validate($request, [
            'dari'   => 'required',
            'sampai' => 'required'
        ]);

        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $pemasukan   = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');
        $pengeluaran = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->sum('total_pengeluaran');

        $dariPast   = date('m', strtotime($request->dari)) - 1;
        $sampaiPast = date('m', strtotime($request->sampai)) - 1;
        $kas        = AsetAktif::whereBetween('tanggal_akuisisi', [$dariPast, $sampaiPast])->sum('penyusutan');

        $tambahanmodal = PenambahanModal::whereBetween('tanggal_penambahan', [$dari, $sampai])->sum('penambahan');
        $prive = Prive::whereBetween('tanggal_prive', [$dari, $sampai])->sum('jumlah');

        $getAkun  = DataAkun::where('tipe_akun', 'beban')->get();
        $getInves = DataAkun::where('tipe_akun', 'investasi')->get();
        foreach ($getAkun as $key) {
            $beban = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->where('id_akun', $key->id)->sum('total_pengeluaran');
        }
        foreach ($getInves as $inves) {
            $investasis     = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->where('id_akun', $inves->id)->get();
            $investasitotal = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->where('id_akun', $inves->id)->sum('total_pengeluaran');
        }



        return view('interface.laporan.arus-kas.index', compact('dari', 'sampai', 'pemasukan', 'pengeluaran', 'beban', 'investasis', 'investasitotal', 'kas', 'tambahanmodal', 'prive'));
    }

    public function pdf(Request $request)
    {
        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $pemasukan   = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');
        $pengeluaran = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->sum('total_pengeluaran');

        $dariPast   = date('m', strtotime($request->dari)) - 1;
        $sampaiPast = date('m', strtotime($request->sampai)) - 1;
        $kas        = AsetAktif::whereBetween('tanggal_akuisisi', [$dariPast, $sampaiPast])->sum('penyusutan');

        $tambahanmodal = PenambahanModal::whereBetween('tanggal_penambahan', [$dari, $sampai])->sum('penambahan');
        $prive = Prive::whereBetween('tanggal_prive', [$dari, $sampai])->sum('jumlah');

        $getAkun  = DataAkun::where('tipe_akun', 'beban')->get();
        $getInves = DataAkun::where('tipe_akun', 'investasi')->get();
        foreach ($getAkun as $key) {
            $beban = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->where('id_akun', $key->id)->sum('total_pengeluaran');
        }
        foreach ($getInves as $inves) {
            $investasis     = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->where('id_akun', $inves->id)->get();
            $investasitotal = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->where('id_akun', $inves->id)->sum('total_pengeluaran');
        }

        $pdf = PDF::loadView('export.arus-kas', compact('dari', 'sampai', 'pemasukan', 'pengeluaran', 'beban', 'investasis', 'investasitotal', 'kas', 'tambahanmodal', 'prive'))->setPaper('a4', 'potrait')->setWarnings(false);
        return $pdf->stream('Laporan-Arus-Kas' . '.pdf');
    }
}
