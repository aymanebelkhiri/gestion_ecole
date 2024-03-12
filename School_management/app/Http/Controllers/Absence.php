<?php

namespace App\Http\Controllers;

use App\Models\Absence_etudiant;
use Illuminate\Http\Request;

class Absence extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Création d'une nouvelle note avec les données validées
        $Absence = new Absence_etudiant();
        $Absence->MasseHoraire= strip_tags($request->input("heures"));
        $Absence->module= strip_tags($request->input("module"));
        $Absence->Etudiant= strip_tags($request->input("etudiant"));
        // Enregistrement de la note dans la base de données
        $Absence->save();
    
        // Redirection de l'utilisateur avec un message de succès et la requête
        return view('prof.EtudiantAbsence',[
            'success' => 'Note added successfully.',
            'data' => $request->all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $array = explode('*', $id);
    
        $id_abs = $array[0];  // Note ID
        $grp = $array[1];   // Module

        return view("prof.edit_absence",[
            "Absence"=>Absence_etudiant::findOrFail($id_abs),
            "grp"=>$grp
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Absence=Absence_etudiant::findOrFail($id);
        $Absence->MasseHoraire=strip_tags($request->input("MasseHoraire"));
        $Absence->save();
        return view('prof.EtudiantAbsence',[
            'success' => 'Note edited successfully.',
            'data' => $request->all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $array = explode('*', $id);
    
        $id_abs = $array[0];  // Note ID
        $grp = $array[1];   // Module
        $data=array();
        $data["grp"]=$grp;
    
        $Absence=Absence_etudiant::findOrFail($id_abs);
        $Absence->delete();
    
        return view('prof.EtudiantAbsence',[
            'success' => 'Note deleted successfully.',
            'data' => $data
        ]);
    }
}
