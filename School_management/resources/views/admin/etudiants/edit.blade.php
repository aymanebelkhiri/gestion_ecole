@extends('admin.header')
@section('adminContent')
<center><h1><i>Modifier un etudiant</i></h1></center>
<form action="{{ route('etudiants.update',$Etudiant->id_etudiant) }}" method='POST'>
   @csrf
   @method('PUT')
   <div class="mb-3">
    <label for="matricule" class="form-label">Matricule </label>
    <input type="number" class="form-control" id="matricule" name='matricule' value='{{$Etudiant->Matricule}}'>
  </div>
  <div class="mb-3">
    <label for="nom" class="form-label">Nom </label>
    <input type="text" class="form-control" id="nom" name='nom' value='{{$Etudiant->Nom}}'>
  </div>
  <div class="mb-3">
    <label for="prenom" class="form-label">Prenom </label>
    <input type="text" class="form-control" id="prenom" name='prenom' value='{{$Etudiant->Prenom}}'>
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Date de naissance </label>
    <input type="date" class="form-control" id="date" name='date' value='{{$Etudiant->DateNaissance}}'>
  </div>
  <div class="mb-3">
    <label for="Age" class="form-label">Age </label>
    <input type="number" class="form-control" id="Age" name='age' value='{{$Etudiant->Age}}'>
  </div>
  <div class="mb-3">
    <label for="sexe" class="form-label">Sexe </label>
    <input type="text" class="form-control" id="sexe" name='sexe' value='{{$Etudiant->Sexe}}'>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email </label>
    <input type="email" class="form-control" id="email" name='email' value='{{$Etudiant->Email}}'>
</div>

  <div class="mb-3">
    <label for="S" class="form-label">Groupes</label>
    <select  class="form-control" id="S" name='groupe' value='{{$Etudiant->Groupe}}'>
        @isset($Groupes)
        @foreach ($Groupes as $Groupe )
          <option value='{{$Groupe->Nom}}'>{{$Groupe->Nom}}</option>
        @endforeach
        @endisset
    </select>      
  </div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
@endsection