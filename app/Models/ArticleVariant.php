<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleVariant extends Model
{
    use HasFactory;

    protected $table = 'article_variants';

    protected $fillable = ['color', 'size', 'quantity','article_id'];


    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function product()
    {
        return $this->belongsTo(Article::class);
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
