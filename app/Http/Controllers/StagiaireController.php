<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Groupe;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    public function index()
    {
        $filieres = Filiere::all();
        return view('stagiaires.index', compact('filieres'));

        // $stagiaires = Stagiaire::all();
        // return view('stagiaires.index', compact('stagiaires'));
    }
    public function show(Request $request)
    {
        $groupe_id = $request->input('groupe_id');
        $stagiaires = Stagiaire::where('groupe_id', $groupe_id)->get();
        return response()->json($stagiaires);


        // $stagiaires = Stagiaire::all();
        // return view('stagiaires.index', compact('stagiaires'));
    }

    public function showStagiaire(Stagiaire $stagiaire)
    {


        return view('stagiaires.show', ['stagiaire' => $stagiaire]);
    }


    public function create()
    {
        $filieres = Filiere::all();
        return view('stagiaires.create', compact('filieres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'gsm' => 'required|string|max:20',
            'cin_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'releve_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bac_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'groupe_id' => 'required|integer|exists:groupes,id',
        ]);
        $cinImagePath = $request->file('cin_image')->store('cin_images', 'public');
        $releveImagePath = $request->file('releve_image')->store('releve_images', 'public');
        $bacImagePath = $request->file('bac_image')->store('bac_images', 'public');



        Stagiaire::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'cin' => $request->cin,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'gsm' => $request->gsm,
            'cin_image' => $cinImagePath,
            'releve_image' => $releveImagePath,
            'bac_image' => $bacImagePath,
            'groupe_id' => $request->groupe_id,
        ]);
        return redirect('/stagiaire');
    }
    public function edit(Stagiaire $stagiaire)
    {
        $filieres = Filiere::all();
        // Fetch all groupes
        $groupes = Groupe::all();

        // You may want to eager load the groupe relationship to avoid N+1 queries
        $stagiaire->load('groupe');

        return view('stagiaires.edit', compact('stagiaire', 'filieres', 'groupes'));
    }

    public function update(Request $request, Stagiaire $stagiaire)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'gsm' => 'required|string|max:20',
            'cin_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'releve_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bac_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'groupe_id' => 'required|integer|exists:groupes,id',
        ]);

        if ($request->hasFile('cin_image')) {
            $cinImagePath = $request->file('cin_image')->store('cin_images', 'public');
            $stagiaire->cin_image = $cinImagePath;
        }

        if ($request->hasFile('releve_image')) {
            $releveImagePath = $request->file('releve_image')->store('releve_images', 'public');
            $stagiaire->releve_image = $releveImagePath;
        }

        if ($request->hasFile('bac_image')) {
            $bacImagePath = $request->file('bac_image')->store('bac_images', 'public');
            $stagiaire->bac_image = $bacImagePath;
        }

        $stagiaire->update($request->except(['cin_image', 'releve_image', 'bac_image']));

        return redirect('/stagiaire')->with('success', 'Stagiaire updated successfully');
    }

    public function delete(Stagiaire $stagiaire)
    {
        $stagiaire->delete();
        return redirect('/stagiaire')->with('success', 'Stagiaire deleted successfully');
    }

    public function list(Request $request)
    {
        $groupe_id = $request->input('groupe_id');
        $filiere_id = $request->input('filiere_id');

        // Assuming you have a relationship between Groupe and Stagiaire, and Filiere and Stagiaire
        $stagiaires = Stagiaire::where('groupe_id', $groupe_id)
            ->whereHas('groupe', function ($query) use ($filiere_id) {
                $query->where('filiere_id', $filiere_id);
            })
            ->get();
            return view('stagiaires.list', compact('stagiaires'));
    }
}
