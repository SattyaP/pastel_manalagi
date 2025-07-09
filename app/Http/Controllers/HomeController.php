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
        $produk = Produk::findOrFail($id);
        return view('show_product', compact('produk'));
    }
}
