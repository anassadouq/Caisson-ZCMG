<?php

namespace App\Http\Controllers;

use App\Models\Pointage;
use App\Models\Salarier;
use Illuminate\Http\Request;
use App\Http\Requests\StorePointageRequest;
use App\Http\Requests\UpdatePointageRequest;

class DetailPointageController extends Controller
{
    public function index()
    {
        return view('detail_pointage.index', [
            'detail_pointages' => Pointage::all()
        ]);
    }   

    public function create(Request $request)
    {
        $salarierId = $request->input('salarierId');
        $salarier = Salarier::find($salarierId);
        return view('detail_pointage.create', compact('salarier'));
    }    

    public function store(StorePointageRequest $request)
    {
        $detail_pointage = new Pointage();
        $detail_pointage->id_salarier = $request->id_salarier;
        $detail_pointage->date = $request->date;
        $detail_pointage->presentAbsent = $request->presentAbsent;
        $detail_pointage->heureSupp = $request->heureSupp;
        $detail_pointage->heureMoin = $request->heureMoin;
        $detail_pointage->avance = $request->avance;
        $detail_pointage->montantAjouter = $request->montantAjouter;
        $detail_pointage->remarque = $request->remarque;

        $detail_pointage->save();
        return redirect()->route('pointage.index');
    }

    public function edit(Pointage $detail_pointage)
    {
        return view('detail_pointage.edit', compact('detail_pointage'));
    }

    public function update(UpdatePointageRequest $request, Pointage $detail_pointage)
    {
        $detail_pointage->update($request->all());
        return to_route('pointage.index');
    }

    public function show($salarierId)
    {
        $salarier = Salarier::find($salarierId);
        $detail_pointages = Pointage::where('id_salarier', $salarierId)->get();
        return view('detail_pointage.show', compact('detail_pointages', 'salarier'));
    }    

    public function destroy($id)
    {
        $detail_pointage = Pointage::findOrFail($id);
        $detail_pointage->delete();

        return redirect()->route('pointage.index')
            ->with('success', 'Le detail_pointage a été supprimé avec succès.');
    }

    public function liste_pointage()
    {
        $pointages = Pointage::all();
        $salariers = Salarier::all();
        return view('detail_pointage.liste_pointage', [
            'pointages' => $pointages,
            'salariers' => $salariers
        ]);
    }
}