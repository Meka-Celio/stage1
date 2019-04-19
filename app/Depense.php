<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
	protected $fillable = ['nom', 'cout', 'activite_id', 'ligne_id'];   
}