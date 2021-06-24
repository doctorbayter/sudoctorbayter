<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relacion uno a muchos
    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    //Relacion uno a muchos
    public function clients()
    {
        return $this->belongsToMany('\App\Models\User', 'user_id');
    }

    public function plan()
    {
        return $this->belongsTo('\App\Models\Plan');
    }

}
