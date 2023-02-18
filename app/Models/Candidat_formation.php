<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat_formation extends Model
{
    use HasFactory;

    protected $fillable = ['candidat_id', 'formation_id'];
    
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
