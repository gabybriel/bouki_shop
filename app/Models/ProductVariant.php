<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable = ['color', 'size', 'quantity','product_id'];

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    protected static function booted()
    {
        static::saved(function ($variant) {
            $variant->article->recalculateTotalQuantity();
        });

        static::deleted(function ($variant) {
            $variant->article->recalculateTotalQuantity();
        });
    }
}
