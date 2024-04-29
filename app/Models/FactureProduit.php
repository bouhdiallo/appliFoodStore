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
}
