<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $table = 'languages';

    protected $fillable = [
        'title',
        'img',
        'slogan',
    ];

    protected $appends = ['img_url'];

    public function getImgUrlAttribute() {
        return $this->img? url($this->img) : null;
    }
}
