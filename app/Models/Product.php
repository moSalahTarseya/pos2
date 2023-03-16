<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'img',
        'price',
        'language_id',
    ];

    public function language(){
        return $this->belongsTo(Language::class);
    }
}
