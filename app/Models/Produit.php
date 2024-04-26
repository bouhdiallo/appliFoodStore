<?php

namespace App\Models;

use App\Models\Facture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_produit',
        'prix',
        'image',
        'description',
        'qte_en_stock',
        'fournisseur_id'
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
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }
}
