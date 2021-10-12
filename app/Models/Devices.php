<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    use HasFactory;
      
    protected $table = "devices";

    protected $fillable = [
        'cartegoryID',
        'serialNo',
        'model',
        'location',
        'ownerID',
        'registID',
        'ifmCode',
        'dateBought',
        'hasMemory',
    ];

    // device can have only one memory detail
    public function hddDetails(){
        return $this->hasOne(Memory::class, 'deviceID','id');
    }
    //Get HDD
    public function getHDD(){
        return $this->hasOne(HddChanges::class,'deviceID','id');
    }

    // device can have many hdd changes if it has memory details
    public function hddChange(){
        return $this->hasManyThrough(HddChanges::class, Memory::class, 'deviceID', 'deviceID');
    }
    
    //device can have many re-allocations
    public function allocateddevice(){
        return $this->hasMany(ReAllocations::class,'deviceID');
    }

      // every device must have one cartegory
      public function getCartegory(){
        return $this->hasOne(Cartegories::class, 'id', 'cartegoryID');
    }

    // device can be updated many times
    public function updateDevice(){
        return $this->hasOne(Update::class, 'deviceID', 'id');
    }

    // device has one user that owns it
    public function getOwner(){
        return $this->hasOne(User::class, 'id', 'ownerID');
    }

    // device has one user the registered it
    public function getRegist(){
        return $this->hasOne(User::class, 'id', 'registID');
    }
}
