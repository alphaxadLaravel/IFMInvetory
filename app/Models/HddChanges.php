<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HddChanges extends Model
{
    use HasFactory;
    
    protected $table = "hdd_changes";

    protected $fillable = [
        'deviceID',
        'userID',
        'initialHDD',
        'newHDD',
        'initialSerialNo',
        'newSerialNo',
        'initialCapacity',
        'newCapacity',
        'placeStored',
        'dateChanged',
    ];
}
