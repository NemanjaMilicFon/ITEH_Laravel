<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'birth_year',
        'is_male',
        'nationality',
        'height'
    ];

    // public function cats()
    // {
    //     return $this->hasMany(Gutiar::class);
    // }

}
