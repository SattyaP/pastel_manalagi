<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->get();

        return view('Home', compact('produks'));
    }

    public function showProduct($id)
    {
        return view('show_product');
    }
}
