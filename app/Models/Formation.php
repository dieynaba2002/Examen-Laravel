<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'duree', 'description', 'isStarted','dateDebut','referentiel_id'];

    public function candidat(){
        return $this->belongsToMany(Candidat::class, 'candidat_formations');
    }

    public function referentiel()
    {
        return $this->belongsTo(Referentiel::class);
    }

}
