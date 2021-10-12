<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Devices;

class HddUpdates extends Component
{
    // the variables to capture hddchanges from form
    public $hddType;
    public $serialNo;
    public $capacity;
    public $dateChanged;
    public $place;


    // the function to save the chnages here
    public function hddChange(){
        $this->validate([
            'hddType'=>'required',
            'serialNo'=>'required',
            'capacity'=>'required',
            'dateChanged'=>'required',
            'place'=>'required',
        ]);

    }

    public function render()
    {
        
        return view('livewire.hdd-updates',[
            'device'=>Devices::find($id)
        ]);
    }
}
