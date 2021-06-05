<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relaciones uno a uno 
    
    public function country()
    {
        return $this->hasOne('App\Models\CountryCode', 'country_code_id');
    }

    //Relaciones uno a uno inversa

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
