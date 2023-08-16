<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Breed extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'originCity',
        'characteristics',
    ];

    // public function cats()
    // {
    //     return $this->hasMany(Gutiar::class);
    // }

}
