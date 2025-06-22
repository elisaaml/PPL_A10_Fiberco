<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $produk = Produk::latest()->paginate(5);

        return view('produk.index', compact('produk'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'produk_name' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|numeric',
            'produk_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($produk_img = $request->file('produk_img')) {
            $destinationPath = 'img/produk/';
            $profileImage = date('YmdHis') . "." . $produk_img->getClientOriginalExtension();
            $produk_img->move($destinationPath, $profileImage);
            $input['produk_img'] = "$profileImage";
        }

        Produk::create($input);

        return redirect()->route('produk.index')
            ->with('success_create', 'The product has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk): View
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk): RedirectResponse
    {
        $request->validate([
            'produk_name'   => 'required|string|max:255',
            'deskripsi'     => 'required|string',
            'stok'          => 'required|numeric',
            'produk_img'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = $request->only(['produk_name', 'deskripsi']);

        if ($request->hasFile('produk_img')) {
            if ($produk->produk_img && file_exists(public_path('img/produk/' . $produk->produk_img))) {
                unlink(public_path('img/produk/' . $produk->produk_img));
            }

            $file = $request->file('produk_img');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/produk'), $fileName);
            $input['produk_img'] = $fileName;
        }

        $produk->update($input);

        return redirect()->route('produk.index')->with('success_update', 'The product has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk): RedirectResponse
    {
        $produk->delete();

        return redirect()->route('produk.index')
            ->with('success_delete', 'The product has been successfully deleted.');
    }
}
