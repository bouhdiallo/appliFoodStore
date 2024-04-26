<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactureProduit extends Model
{
    protected $table = 'facture_produit';

    protected $fillable = [
        'facture_id',
        'produit_id',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Vous pouvez ajouter d'autres relations ou méthodes ici si nécessaire
    public function produits()
    {
        return $this->belongsToMany(Produit::class);
    }
     public function factures()
    {
        return $this->belongsToMany(Facture::class);
    }
}
