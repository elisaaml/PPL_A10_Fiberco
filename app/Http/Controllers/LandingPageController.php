<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Partner;
use App\Models\ProfilCompany;
use App\Models\Faq;
use App\Models\Team;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingPageController extends Controller
{
    public function index(): View
    {
        $produk = Produk::take(5)->get();
        $faq = Faq::all();
        $profilCompany = ProfilCompany::first();
        return view('welcome', compact('produk','faq', 'profilCompany'));
    }

    public function listProduk(): View
    {
        $listProduk = Produk::all();
        $profilCompany = ProfilCompany::first();
        return view('landing-page.list-product', compact('listProduk', 'profilCompany'));
    }

    public function detailProduk(Produk $produk): View
    {
        $profilCompany = ProfilCompany::first();
        return view('landing-page.produk-detail', ['produkDetail' => $produk], compact('profilCompany'));
    }

    public function profile(): View
    {
        $partner = Partner::all();
        $team = Team::all();
        $profilCompany = ProfilCompany::first();
        return view('landing-page.profile', compact('partner', 'profilCompany', 'team'));
    }

    public function contact(): View
    {
        $profilCompany = ProfilCompany::first();
        return view('landing-page.contact', compact('profilCompany'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $details = [
            'email' => $request->email,
            'subject' => $request->subject,
            'body' => $request->message,
        ];

        Mail::to('sumbersarijbr@gmail.com')->send(new \App\Mail\ContactMail($details));

        return back()->with('success', 'Email berhasil dikirim!');
    }

    public function faq(): View
    {
        $faq = Faq::all();
        $profilCompany = ProfilCompany::first();
        return view('landing-page.faq', compact('faq', 'profilCompany'));
    }

}
