<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'commande_id',
        'quantity',
        'price',
    ];

    public function article(): BelongsTo
    {
        // Spécifiez les colonnes que vous souhaitez récupérer
        return $this->belongsTo(Article::class)->select(['image', 'taille', 'numero']);
    }

    public function commande(): BelongsTo
    {
        return $this->belongsTo(Commande::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    

}
