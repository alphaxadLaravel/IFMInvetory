<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cartegories;
use App\Models\Devices;

class AdminCartegories extends Component
{

    public $data;
    public $confirm = false;
    // deleteing the cartegory here
    public function deleteCartegory(Cartegories $id){
        $data = Cartegories::find($id)->first();
        $check = Devices::where('cartegoryID', $data->id)->first();
        // dd($check);

        if($check){
            session()->flash('failed', '');
        }else{
           $check2 = Cartegories::where('id',$data->id)->update([
                'status'=>'inactive'
            ]);
            session()->flash('deleted', 'data deleted');
        }

    }

    // feth all the cartegories here
    public function render()
    {
        return view('livewire.admin-cartegories', [
            'carts' => Cartegories::all()->where('status','active')
            
            
        ] );
    }
}
