<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCode extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relaciones uno a uno inversa
    public function profile()
    {
        return $this->belongsTo('App\Models\Profile');
    }
}
