<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReAllocations extends Model
{
    use HasFactory;
     
    protected $table = "re_allocations";

    protected $fillable = [
        'userID',
        'newLocation',
        'oldLocation',
        'oldOwner',
        'newOwner',
        'deviceID',
        'description',
        'dateAllocated'
    ];

    // each re allocation has one user
    public function getUser(){
        return $this->hasOne(User::class, 'id','newOwner');
    }

    // each allocated device has the previous owner
    public function getOldUser(){
        return $this->hasOne(User::class, 'id','oldOwner');
    }

    public function getAdmin(){
        return $this->hasOne(User::class, 'id','userID');
    }

    // each allocation can have one device
    public function getDevice(){
        return $this->hasOne(Devices::class, 'id','deviceID');
    }
}
