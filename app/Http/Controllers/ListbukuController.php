<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Kategoribuku;

class ListbukuController extends Controller
{
    public function index()
    {
        $Kategoribuku = Kategoribuku::all();
        $Buku = Buku::all();
        return view('RentBuku.index', compact('Kategoribuku', 'Buku'));
    }
}