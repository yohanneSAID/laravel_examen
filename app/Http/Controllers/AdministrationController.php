<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'adresse' => 'required'
        ]);
        Administration::create($request->all());
        return redirect()->route('administrations.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Administration $administration)
    {
        return view('administrations.show', compact('administration'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administration $administration)
    {
        return view('administrations.edit', compact('administration'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administration $administration)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'adresse' => 'required'
        ]);
        $administration->update($request->all());
        return redirect()->route('administrations.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(administration $administration)
    {
        $administration->delete();
        return redirect()->route('administrations.index');
    }
}
