<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'contact',
        'adress'
    ];



    public function produits(){
        return $this->hasMany(Produit::class, 'fournisseur_id');
    }

    public function facture()
    {
        return $this->hasOne(Facture::class);
    }
    
}
