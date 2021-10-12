<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartegories extends Model
{
    use HasFactory;
    
    protected $table = "cartegories";

    protected $fillable = [
        'cartegory',
        'devices',
        'userID',
    ];

    public function device(){
        return $this->hasMany('App\Models\Devices');
    }
  
}
