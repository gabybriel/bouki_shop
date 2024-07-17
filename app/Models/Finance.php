<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    protected $fillable = [
        'somme',
        'user_id',
        'mode',
        'statut'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
