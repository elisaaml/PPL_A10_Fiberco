<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilCompanyController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DistributionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//landing page
Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/list-produk', [LandingPageController::class, 'listProduk'])->name('list-produk');
Route::get('/produk-detail/{produk}', [LandingPageController::class, 'detailProduk'])->name('produk-detail');
Route::get('/profile', [LandingPageController::class, 'profile'])->name('profile');
Route::get('/contact', [LandingPageController::class, 'contact'])->name('contact');
Route::post('/send-email', [LandingPageController::class, 'send'])->name('send.email');
Route::get('/faqs', [LandingPageController::class, 'faq'])->name('faqs');

//admin
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('faq', FaqController::class);
Route::resource('partner', PartnerController::class);
Route::resource('team', TeamController::class);
Route::resource('produk', ProdukController::class);
Route::resource('distribution', DistributionController::class);
Route::get('/history', [DistributionController::class, 'history'])->name('distribution.history');
Route::put('profilCompany/{profilCompany}', [ProfilCompanyController::class, 'update'])->name('profilCompany.update');
Route::get('profilCompany/photos', [ProfilCompanyController::class, 'photos'])->name('profilCompany.photos');
Route::get('profilCompany/about-us', [ProfilCompanyController::class, 'about'])->name('profilCompany.about-us');
