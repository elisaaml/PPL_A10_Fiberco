<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Partner;
use App\Models\Faq;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Produk::all()->count();
        $partners = Partner::all()->count();
        $faqs = Faq::all()->count();
        return view('dashboard', compact('products', 'partners', 'faqs'));
    }
}
