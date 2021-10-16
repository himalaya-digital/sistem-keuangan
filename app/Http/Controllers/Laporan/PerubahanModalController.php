<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\DataAkun;
use App\Models\DataProyek;
use App\Models\ModalAwal;
use App\Models\PenambahanModal;
use App\Models\PengeluaranKas;
use App\Models\Prive;
use Illuminate\Http\Request;
use PDF;

class PerubahanModalController extends Controller
{
    public function index()
    {
        return view('interface.laporan.perubahan-modal.index');
    }

    public function result(Request $request)
    {
        $this->validate($request, [
            'dari'   => 'required',
            'sampai' => 'required'
        ]);

        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $modalawal = ModalAwal::sum('jumlah');

        $totalpemasukan = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');
        $getAkun = DataAkun::where('tipe_akun', 'beban')->get();

        $prive = Prive::whereBetween('tanggal_prive', [$dari, $sampai])->sum('jumlah');
        $tambahanmodal = PenambahanModal::whereBetween('tanggal_penambahan', [$dari, $sampai])->sum('penambahan');

        foreach ($getAkun as $key) {
            $total = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->where('id_akun', $key->id)->sum('total_pengeluaran');
        }

        return view('interface.laporan.perubahan-modal.index', compact('dari', 'sampai', 'totalpemasukan', 'total', 'prive', 'tambahanmodal', 'modalawal'));
    }

    public function pdf(Request $request)
    {
        $dari   = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $modalawal = ModalAwal::sum('jumlah');

        $totalpemasukan = DataProyek::whereBetween('tanggal_bayar', [$dari, $sampai])->sum('total_bayar');
        $getAkun = DataAkun::where('tipe_akun', 'beban')->get();

        $prive = Prive::whereBetween('tanggal_prive', [$dari, $sampai])->sum('jumlah');
        $tambahanmodal = PenambahanModal::whereBetween('tanggal_penambahan', [$dari, $sampai])->sum('penambahan');

        foreach ($getAkun as $key) {
            $total = PengeluaranKas::whereBetween('tanggal_pengeluaran', [$dari, $sampai])->where('id_akun', $key->id)->sum('total_pengeluaran');
        }

        $pdf = PDF::loadView('export.perubahan', compact('dari', 'sampai', 'totalpemasukan', 'total', 'prive', 'tambahanmodal', 'modalawal'))->setPaper('a4', 'potrait')->setWarnings(false);
        return $pdf->stream('Laporan-Perubahan-Modal' . '.pdf');
    }
}
