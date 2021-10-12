<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    use HasFactory;

    protected $table = "memories";

    protected $fillable = [
        'deviceID',
        'HDDType',
        'HDDCapacity',
        'serialNo',
    ];

    //a device with memory can have several hdd changes
    public function hddChanges(){
        return $this->hasMany(HddChanges::class, 'deviceID', 'id');
    }

}
