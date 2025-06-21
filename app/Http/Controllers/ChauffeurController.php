<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chauffeurs = Chauffeur::paginate(10);
        return view('chauffeurs.index', compact('chauffeurs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chauffeurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'contact' => 'required',
            'disponibilite' => 'required'

        ]);
        Chauffeur::create($request->all());
        return redirect()->route('chauffeurs.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Chauffeur $chauffeur)
    {
        return view('chauffeurs.show', compact('chauffeur'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chauffeur $chauffeur)
    {
        return view('chauffeurs.edit', compact('chauffeur'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chauffeur $chauffeur)
    {
        $request->validate([
            'nom' => 'required',
            'contact' => 'required',
            'disponibilite' => 'required'
        ]);
        $chauffeur->update($request->all());
        return redirect()->route('chauffeurs.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(chauffeur $chauffeur)
    {
        $chauffeur->delete();
        return redirect()->route('chauffeurs.index');
    }
}
