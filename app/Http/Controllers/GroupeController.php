<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    public function index()
    {
        $groupes = Groupe::all();
        return view('groupes.index', compact('groupes'));
    }
    public function create()
    {
        $filieres = Filiere::all();
        return view('groupes.create', compact('filieres'));
    }
    public function store(Request $request)
    {
        Groupe::create([
            'code' => $request->code,
            'name' => $request->name,
            'filiere_id' => $request->filiere_id,


        ]);
        return redirect('/groupe');
    }
    public function getGroupe(Request $request)
    {
        $filiere_id = $request->input('filiere_id');
        $groupes = Groupe::where('filiere_id', $filiere_id)->get();
        return response()->json($groupes);
    }
}
