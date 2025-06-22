<?php

namespace App\Http\Controllers;

use App\Models\Distribution;
use App\Models\Produk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DistributionController extends Controller
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
        $distribution = Distribution::where('status', '!=', 'Complete')->latest()->paginate(5);

        return view('distribution.index', compact('distribution'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $produk = Produk::all();
        return view('distribution.create', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'cust_name' => 'required|string',
        //     'produk_id' => 'required|exists:produk,id',
        //     'qty' => 'required|integer|min:1',
        //     'address' => 'required|string',
        //     'status' => 'required|in:On Process,Delivered,Complete,On Hold',
        // ]);
        $request->validate([
            'cust_name' => 'required|string',
            'produk_id' => 'required|exists:produk,id',
            'qty' => 'required|integer|min:1',
            'address' => 'required|string',
            'shipping_date' => 'required|date',
            'status' => 'required|in:On Process,Delivered,Complete,On Hold',
        ], [
            '*.required' => 'Data harap diisi semua.',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        if ($produk->stok < $request->qty) {
            return back()->withErrors(['qty' => 'Stok tidak mencukupi.'])->withInput();
        }
        $produk->stok -= $request->qty;
        $produk->save();

        $completeDate = $request->status === 'Complete' ? now() : $request->completed_at;

        Distribution::create([
            'cust_name' => $request->cust_name,
            'produk_id' => $request->produk_id,
            'qty' => $request->qty,
            'address' => $request->address,
            'shipping_date' => $request->shipping_date,
            'completed_at' => $completeDate,
            'status' => $request->status,
        ]);

        return redirect()->route('distribution.index')
            ->with('success_create', 'Distribution has been successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Distribution $distribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distribution $distribution): View
    {
        $produk = Produk::all();
        return view('distribution.edit',compact('distribution', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distribution $distribution): RedirectResponse
    {
        // $request->validate([
        //     'cust_name' => 'required|string',
        //     'produk_id' => 'required|exists:produk,id',
        //     'qty' => 'required|integer|min:1',
        //     'address' => 'required|string',
        //     'status' => 'required|in:On Process,Delivered,Complete,On Hold',
        // ]);
        $request->validate([
            'cust_name' => 'required|string',
            'produk_id' => 'required|exists:produk,id',
            'qty' => 'required|integer|min:1',
            'address' => 'required|string',
            'shipping_date' => 'required|date',
            'status' => 'required|in:On Process,Delivered,Complete,On Hold',
        ], [
            '*.required' => 'Data harap diisi semua.',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        if ($distribution->produk_id == $request->produk_id) {
            $selisihQty = $request->qty - $distribution->qty;

            if ($produk->stok < $selisihQty) {
                return back()->withErrors(['qty' => 'Stok tidak mencukupi untuk update.'])->withInput();
            }

            $produk->stok -= $selisihQty;
            $produk->save();
        } else {
            // Kalau produk diubah, kembalikan stok lama, lalu kurangi stok baru
            $produkLama = Produk::findOrFail($distribution->produk_id);
            $produkLama->stok += $distribution->qty;
            $produkLama->save();

            if ($produk->stok < $request->qty) {
                return back()->withErrors(['qty' => 'Stok tidak mencukupi untuk produk baru.'])->withInput();
            }

            $produk->stok -= $request->qty;
            $produk->save();
        }

        $completeDate = $request->status === 'Complete' ? now() : $request->completed_at;

        $distribution->update([
            'cust_name' => $request->cust_name,
            'produk_id' => $request->produk_id,
            'qty' => $request->qty,
            'address' => $request->address,
            'shipping_date' => $request->shipping_date,
            'completed_at' => $completeDate,
            'status' => $request->status,
        ]);

        return redirect()->route('distribution.index')
            ->with('success_update', 'Distribution entry has been successfully updated');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distribution $distribution): RedirectResponse
    {
        $distribution->delete();

        return redirect()->route('distribution.index')
                        ->with('success_delete','Distribution has been successfully deleted.');
    }

    public function history()
    {
        $distribution = Distribution::where('status', 'Complete')->latest()->paginate(5);

        return view('distribution.history', compact('distribution'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
