<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class UpdateEtudiant extends Controller
{
    public function update(Request $request, string $id)
    {
        $Etudiant=Etudiant::where("id_etudiant",$id)->first();
        $Etudiant->Nom=strip_tags($request->input("name"));
        $Etudiant->DateNaissance=strip_tags($request->input("date"));
        $Etudiant->Email=strip_tags($request->input("email"));
        $Etudiant->Matricule=strip_tags($request->input("matricule"));
        $Etudiant->save();
        return view("admin.etudiants.liste",['data' => $request->input(),"success"=>"Student Edided Successfuly."]);
    }
}
