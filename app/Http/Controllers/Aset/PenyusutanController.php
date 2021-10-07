<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\AsetAktif;
use Illuminate\Http\Request;

class PenyusutanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = AsetAktif::with('dataakun')->latest()->get();
        return view('interface.aset.penyusutan', compact('datas'));
    }
}
