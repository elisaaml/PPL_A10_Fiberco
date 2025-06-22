<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TeamController extends Controller
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
        $team = Team::latest()->paginate(5);

        return view('team.index', compact('team'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'team_name' => 'required',
            'team_position' => 'required',
            'team_description' => 'required',
            'team_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($team_img = $request->file('team_img')) {
            $destinationPath = 'img/teams/';
            $profileImage = date('YmdHis') . "." . $team_img->getClientOriginalExtension();
            $team_img->move($destinationPath, $profileImage);
            $input['team_img'] = "$profileImage";
        }

        Team::create($input);

        return redirect()->route('team.index')
            ->with('success', 'Team created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team): View
    {
        return view('team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team): RedirectResponse
    {
        $request->validate([
            'team_name'        => 'required|string|max:255',
            'team_position' => 'required|string',
            'team_description' => 'required|string',
            'team_img'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $input = $request->only(['team_name', 'team_position', 'team_description']);
    
        if ($request->hasFile('team_img')) {
            if ($team->team_img && file_exists(public_path('img/teams/' . $team->team_img))) {
                unlink(public_path('img/teams/' . $team->team_img));
            }
            
            $file = $request->file('team_img');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/teams'), $fileName);
            $input['team_img'] = $fileName;
        }
    
        $team->update($input);
    
        return redirect()->route('team.index')
                         ->with('success', 'Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team): RedirectResponse
    {
        $team->delete();

        return redirect()->route('team.index')
            ->with('success', 'Team deleted successfully');
    }
}
