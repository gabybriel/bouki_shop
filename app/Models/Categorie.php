<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Article;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'categoriename',
        'image'
    ];

    public function getImageAttribute()
    {
        return asset('storage/' . $this->attributes['image']);
    }


    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
