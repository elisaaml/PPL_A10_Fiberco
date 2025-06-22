<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PartnerController extends Controller
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
        $partner = Partner::latest()->paginate(5);

        return view('partner.index', compact('partner'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'partner_name' => 'required',
            // 'partner_description' => 'required',
            'partner_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($partner_img = $request->file('partner_img')) {
            $destinationPath = 'img/partners/';
            $profileImage = date('YmdHis') . "." . $partner_img->getClientOriginalExtension();
            $partner_img->move($destinationPath, $profileImage);
            $input['partner_img'] = "$profileImage";
        }

        Partner::create($input);

        return redirect()->route('partner.index')
            ->with('success', 'Partner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner): View
    {
        return view('partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner): RedirectResponse
    {
        $request->validate([
            'partner_name'        => 'required|string|max:255',
            // 'partner_description' => 'required|string',
            'partner_img'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // $input = $request->only(['partner_name', 'partner_description']);
        $input = $request->only(['partner_name']);

        if ($request->hasFile('partner_img')) {
            if ($partner->partner_img && file_exists(public_path('img/partners/' . $partner->partner_img))) {
                unlink(public_path('img/partners/' . $partner->partner_img));
            }

            $file = $request->file('partner_img');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/partners'), $fileName);
            $input['partner_img'] = $fileName;
        }

        $partner->update($input);

        return redirect()->route('partner.index')
                         ->with('success', 'Partner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner): RedirectResponse
    {
        $partner->delete();

        return redirect()->route('partner.index')
            ->with('success', 'Produk deleted successfully');
    }
}
