<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\Models\Prof;
use App\Models\Module;
class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Profs = DB::table('profs')
        ->join('modules','modules.id_module','=','profs.Module')
        ->select('profs.id_prof','profs.Nom','profs.Prenom','profs.Email','profs.Sexe','modules.Nom as Module')
        ->get();
        return view('admin.profs.index',compact('Profs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Modules = Module::all();
        return view('admin.profs.create',compact('Modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required',
            'sexe'=>'required',
            'module'=>'required',
            'password'=>'required'
        ]);
    
        $Module = Module::where('Nom',$request->module)->value('id_module');
        
        $NewProf = Prof::create([
            'Nom'=>$request->nom,
            'Prenom'=>$request->prenom,
            'Email'=>$request->email,
            'Sexe'=>$request->sexe,
            'Module'=>$Module,
            'Password'=>$request->password
        ]);

        if($NewProf){
            return redirect()->route('profs.index')->with('success', 'Étudiant ajouté avec succès');
        }else{
            return view('admin.profs.create');
        }
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
        $Prof = Prof::find($id);
        $Modules= Module::all();
        return view('admin.profs.edit',compact('Prof','Modules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $Prof = Prof::findOrFail($id);

    $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required',
        'sexe' => 'required',
        'Module' => 'required',
    ]);
    $Module = Module::where('Nom', $request->Module)->value('id_module');
    // dd($request->all());
    $Prof->update([
        'Nom' => $request->nom,
        'Prenom' => $request->prenom,
        'Email' => $request->email,
        'Sexe' => $request->sexe,
        'Module' => $Module,
    ]);

    if ($Prof) {
        return redirect()->route('profs.index')->with('MessageSucces', 'Professeur mis à jour avec succès');
    } else {
        return redirect()->route('profs.edit', $id)->with('MessageEchec', 'Échec de la mise à jour du professeur');
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $DeleteProf = Prof::find($id)->delete();
        return redirect()->route('profs.index');
    }
}
