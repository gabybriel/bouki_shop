<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Categorie;
use App\Models\Article;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'subcategoryname',
        'categorie_id',
        'image',
    ];

    public function getImageAttribute()
    {
        return asset('storage/' . $this->attributes['image']);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
}
