<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //URL's Amigables
    public function getRouteKeyName(){
        return "slug";
    }

    public function getFinalPriceAttribute(){
        
        if ($this->discount && \Carbon\Carbon::createFromTimeStamp(strtotime($this->discount->expires_at))->gt(\Carbon\Carbon::now()) ) {
            if ($this->discount->type == 1) {
                return number_format($this->discount->value, 2);
            }
            else{
                return number_format($this->price->value - ($this->discount->value * ($this->price->value /100)), 2);
            }    
        }
        else{
            return number_format($this->price->value, 2);
        }       
        
    }


    //Relaciones uno a muchos
    public function price()
    {
        return $this->belongsTo('App\Models\Price');
    }

    //Relacion uno a muchos
    public function subscription()
    {
        return $this->belongsTo('\App\Models\Subscription');
    }

    //Relaciones uno a muschos inversa
    public function discount(){
        return $this->belongsTo('App\Models\Discount');
    }

    //Relacion muchos a muchos
    public function fases()
    {
        return $this->belongsToMany('\App\Models\Fase');
    }
    
}
