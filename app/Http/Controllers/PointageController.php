<?php

namespace App\Http\Controllers;

use App\Models\Pointage;
use App\Models\Salarier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePointageRequest;
use App\Http\Requests\UpdatePointageRequest;

class PointageController extends Controller
{
    public function index()
    {
        return view('pointage.index', [
            'salariers' => Salarier::all()
        ]);
    }

    public function create()
    {
        return view('pointage.create');
    }

    public function store(StorePointageRequest $request)
    {
        $pointage = new Pointage();
        $pointage->sexe = $request->sexe;
        $pointage->nom = $request->nom;
        $pointage->prenom = $request->prenom;
        $pointage->cin = $request->cin;
        $pointage->tel = $request->tel;
        $pointage->adresse = $request->adresse;
        $pointage->salaire = $request->salaire;
        $pointage->dateEntree = $request->dateEntree;

        $pointage->save();
        return to_route('pointage.index');
    }

    public function show(Pointage $pointage)
    {
        return view('pointage.show', compact('pointage'));
    }

    public function edit(Pointage $pointage)
    {
        return view('pointage.edit', compact('pointage'));
    }

    public function update(UpdatePointageRequest $request, Pointage $pointage)
    {
        $pointage->update($request->all());
        return to_route('pointage.index');
    }

    public function destroy($id)
    {
        $pointage = Pointage::findOrFail($id);
        $pointage->delete();

        return redirect()->route('pointage.index')
            ->with('success', 'Le pointage a été supprimé avec succès.');
    }
}