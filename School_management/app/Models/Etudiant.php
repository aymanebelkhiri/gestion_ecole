<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_etudiant",
        'Matricule',
        'Nom',
        'Prenom',
        'DateNaissance',
        'Age',
        'Sexe',
        'Email',
        'Password',
        'Groupe'
    ];
}
