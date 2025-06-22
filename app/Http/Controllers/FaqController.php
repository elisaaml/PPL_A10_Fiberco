<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\Request;

class FaqController extends Controller
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
        $faq = Faq::latest()->paginate(5);

        return view('faq.index', compact('faq'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Faq::create([
            'faq_quest' => $request->faq_quest,
            'faq_answ' => $request->faq_answ,
        ]);

        return redirect()->route('faq.index')
                         ->with('success_create', 'FAQ has been successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq): View
    {
        return view('faq.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $faq->update([
            'faq_quest' => $request->faq_quest,
            'faq_answ' => $request->faq_answ,
        ]);

        return redirect()->route('faq.index')
                        ->with('success_update','FAQ entry has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('faq.index')
                        ->with('success_delete','FAQ has been successfully deleted.');
    }
}
