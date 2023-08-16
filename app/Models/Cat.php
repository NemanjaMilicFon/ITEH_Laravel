<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'color',
        'price',
        'age',
        'breed_id',
        'owner_id'
    ];


    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
    
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }



}
