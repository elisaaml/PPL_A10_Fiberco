<?php

namespace App\Http\Controllers;

use App\Models\ProfilCompany;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function photos(): View
    {
        $profilCompany = ProfilCompany::first();
        return view('profil.photos', compact('profilCompany'));
    }

    public function about(): View
    {
        $profilCompany = ProfilCompany::first();
        return view('profil.about-us', compact('profilCompany'));
    }

    public function update(Request $request, ProfilCompany $profilCompany): RedirectResponse
    {
        $request->validate([
            // 'struktur'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner1'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner2'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->only(['company_name', 'address', 'about1', 'about2']);

        // $input['struktur'] = $this->uploadFile($request, 'struktur', $profilCompany->struktur);
        $input['banner1']  = $this->uploadFile($request, 'banner1', $profilCompany->banner1);
        $input['banner2']  = $this->uploadFile($request, 'banner2', $profilCompany->banner2);

        $profilCompany->update($input);

        // $route = 'profilCompany.index';

        // if ($request->hasFile('struktur') || $request->hasFile('banner1') || $request->hasFile('banner2')) {
        //     $route = 'profilCompany.photos';
        // } elseif ($request->company_name || $request->address || $request->about1 || $request->about2) {
        //     $route = 'profilCompany.about-us';
        // }else{
        //     return redirect()->to(url()->previous());
        // }
        return redirect()->route('profilCompany.about-us')->with('success', 'Profile updated successfully');
    }

    private function uploadFile(Request $request, string $fieldName, ?string $oldFile): ?string
    {
        if ($request->hasFile($fieldName)) {
            if ($oldFile && file_exists(public_path('img/' . $oldFile))) {
                unlink(public_path('img/' . $oldFile));
            }

            $file = $request->file($fieldName);
            $fileName = time() . '_' . $fieldName . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $fileName);

            return $fileName;
        }

        return $oldFile;
    }
}
