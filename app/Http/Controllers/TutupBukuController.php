<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutupBukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('interface.tutup-buku.index');
    }
}
