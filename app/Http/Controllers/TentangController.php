<?php

namespace App\Http\Controllers;

use App\Models\tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    //
    public function index()
    {
        $data = tentang::first();
        return view('crud-tentang.tentang', compact('data'));
    }
}
