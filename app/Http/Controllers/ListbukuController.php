<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class ListbukuController extends Controller
{
    public function index()
    {
        $Listbuku = Buku::all();

        return view('RentBuku.index', compact('Listbuku'));
    }
}
