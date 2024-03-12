@extends('admin.header')
@section('adminContent')
<br><br><br><br><br><br>
<center><h1><i>Ajouter un prof</i></h1></center><br><br>

    
     <form action="{{ route('profs.store') }}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="nom" class="form-label">Nom </label>
    <input type="text" class="form-control" id="nom" name='nom'>
  </div>
  <div class="mb-3">
    <label for="prenom" class="form-label">Prenom </label>
    <input type="text" class="form-control" id="prenom" name='prenom'>
  </div>
  <div class="mb-3">
    <label for="sexe" class="form-label">Sexe </label>
    <input type="text" class="form-control" id="sexe" name='sexe'>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email </label>
    <input type="email" class="form-control" id="email" name='email'>
</div>
<div class="mb-3">
    <label for="Password" class="form-label">Password </label>
    <input type="password" class="form-control" id="Password" name='password'>
</div>
  <div class="mb-3">
    <label for="S" class="form-label">Modules</label>
    <select  class="form-control" id="S" name='module'>
        @isset($Modules)
        @foreach ($Modules as $Module )
          <option value='{{$Module->Nom}}'>{{$Module->Nom}}</option>
        @endforeach
        @endisset
    </select>      
  </div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>