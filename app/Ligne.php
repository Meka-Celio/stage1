<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ligne extends Model
{
    protected $fillable = ['libelle', 'montant', 'rubrique_id'];
}
