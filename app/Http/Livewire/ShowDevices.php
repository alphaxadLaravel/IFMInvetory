<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Devices;
use App\Models\Cartegories;
use Livewire\WithPagination;

use Illuminate\Http\Request;

use App\Exports\devicesExport;
use Maatwebsite\Excel\Facades\Excel;

class ShowDevices extends Component
{
    // paginating here
    use WithPagination;

    // allow pagination styles with bootstrap here
    protected $paginationTheme = 'bootstrap';
    
    // public $devices;
    public $filter1 = 5;
    public $filter2;

     // function to export all the devices here
     public function exportDevices(){
        // dd($this->filter2);
        return (new devicesExport($this->filter2))->download('devices.xlsx');
        // return (new devicesExport)->download('devices.xlsx');
        // return Excel::download(new devicesExport, 'devices.xlsx');
    } 

    public $counter=1;
    
    // render the device list with pagination
    public function render()
    {
        return view('livewire.show-devices', [
            'devices' => Devices::when($this->filter2, function($query, $filter2){
                return $query->where('cartegoryID', 'LIKE', "%$filter2%");
            })->where('status','new')->latest()->paginate($this->filter1),
            'counter'=>$this->counter,

            'cartegories'=>Cartegories::all()->where('status','active'),
            ]);
    }
}
