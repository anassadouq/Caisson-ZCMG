<?php

namespace App\Models;

use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reglement extends Model
{
    use HasFactory;
    protected $fillable = [
        'num',
        'montant',
        'date',
        'type',
        'reglement'
    ];
    
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'id_fournisseur');
    }
}