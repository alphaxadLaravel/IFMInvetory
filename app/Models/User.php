<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    // users table here
    protected $table = "users";

    // allow the fillable columns in users table
    protected $fillable = [
        'pfNumber',
        'firstname',
        'middlename',
        'surname',
        'department',
        'password',
    ];

    //One user can do  many re-allocations
    public function getAllocater(){
        return $this->hasMany(ReAllocations::class, 'userID','id');
        // return $this->hasManyThrough(HddChanges::class, Memory::class, 'deviceID', 'deviceID');
    }

    // the device of one user can have many re allocations 
    public function getOldOwner(){
        return $this->hasManyThrough(ReAllocations::class, Devices::class, 'oldOwner', 'ownerID');
    }

    // One User can add Many cartegories
    public function addCartegory(){
        return $this->hasMany(Cartegories::class, 'UserID','id');
    }

    // One user can add Many devices
    public function addDevice(){
        return $this->hasMany(Devices::class, 'UserID','id');
    }

    // One User can do many HDD changes
    public function changeHDD(){
        return $this->hasMany(HddChanges::class, 'UserID','id');
    }

    // One user can do many device updates
    public function updateDevice(){
        return $this->hasMany(Update::class, 'UserID','id');
    }

}
