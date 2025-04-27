<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class transaksicontroller extends Controller
{
    public function index()
    {
        $transaksi = transaksi::all();
        return view('Transaksi.index', compact('transaksi'));
    }
}
