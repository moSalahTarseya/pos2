<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory;
    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
        'language_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




}
