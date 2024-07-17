<?php

namespace App\Models;

use App\Models\Commande;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Categorie;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'taille',
        'numero',
        'prix',
        'quantity',
        'statut',
        'image',
        'images',
        'description',
        'commission',
        'user_id',
        'categorie_id',
        'subcategorie_id',
        'is_promo',
    ];

    public function getImageAttribute()
    {
        return asset('storage/' . $this->attributes['image']);
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subcategorie(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'subcategorie_id');
    }

    public function commandes(): HasMany
    {
        return $this->hasMany(Commande::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function variants()
    {
        return $this->hasMany(ArticleVariant::class);
    }

    // Méthode pour obtenir la somme des quantités des variantes
    public function recalculateTotalQuantity()
    {
        $this->quantity = $this->variants->sum('quantity');
        $this->save();
    }
}
