<?php

namespace App\Models;

use App\Models\Article;
use App\Models\CartItem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_commande',
        'adresse',
        'ville',
        'modepaiement',
        'num_momo',
        'montant',
        'statut',
        'user_id',
        'article_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
