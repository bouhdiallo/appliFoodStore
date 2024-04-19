<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_produit',
        'prix',
        'description',
        'qte_en_stock',
    ];

    // public function factures()
    // {
    //     return $this->belongsToMany(Facture::class, 'produit_id');
    // }
    public function factures()
    {
        return $this->belongsToMany(Facture::class, 'facture_produit' );
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }
}

