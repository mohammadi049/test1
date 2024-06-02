<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index()
    {
        $filieres = Filiere::all();
        return view('filieres.index',compact('filieres'));
    }
    public function create()
    {
        return view('filieres.create');
    }
    public function store(Request $request)
    {
        Filiere::create([
            'code' => $request->code,
            'name' => $request->name,

        ]);
        return redirect('/filiere');

    }
}
