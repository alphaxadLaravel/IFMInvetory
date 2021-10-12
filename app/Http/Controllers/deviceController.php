<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\Memory;
use App\Models\HddChanges;
use App\Models\ReAllocations;
use App\Models\Cartegories;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Session;


class deviceController extends Controller
{
    // show details of the item here
    public function showDevice($id){

        $items = Devices::find($id);

        return view('admin.single', ['items'=>$items]);
    }

    // allocating the device here
    public function allocate($id){

         request()->validate([
            'owner'=>'required',
            'location'=>'required|min:3|max:30|string',
            'date'=>'required|before_or_equal:'.date('m/d/y'),
            'description'=>'required|min:10|max:255|string'
         ]);

        $adminID = Session::get('user')['id'];

        $device = Devices::where('id', $id)->first();

        // allocting the device here
        ReAllocations::Create([
            'userID' => $adminID,
            'deviceID'=>$device->id,
            'oldLocation'=>$device->location,
            'newLocation'=>request('location'),
            'newOwner'=>request('owner'),
            'oldOwner'=>$device->ownerID,
            'deviceID'=>$id,
            'description'=>request('description'),
            'dateAllocated'=>request('date'),
        ]);

        // update the device table after allocating
        Devices::where('id',$id)->update([
            'location'=>request('location'),
            'ownerID'=>request('owner'),
        ]);

        session()->flash('update', 'Data added successfulyy!!');

        return redirect('/allocations');
    }

    // single allocated device here
    public function singleAllocated($id){
        $allocated = ReAllocations::find($id);

        // dd($allocated);
        return view('admin.allocatedDevice', ['allocated'=>$allocated]);
    }

    // delete the device here
    public function deleteDevice($id){
        $device = Devices::where('id',$id)->update([
            'status'=>'inactive'
        ]);

        session()->flash('deleted', 'Data deleted successfulyy!!');

        return redirect('/devices');
    }

    // delete the allocation history here
    public function deleteHistory($id){
        $device = ReAllocations::where('id',$id)->update([
            'status'=>'inactive'
        ]);

        session()->flash('deleted', 'Data deleted successfulyy!!');

        return redirect('/allocations');
    }

    // show the form with the selected Device to allocate
    public function showForm($id){

        $items = Devices::find($id);
        $user = $items->ownerID;
        $userList = User::where('id','!=',$user)->Where('available','present')->get();


         return view('admin.allocate', ['items'=>$items,'userList'=>$userList]);
    }

    // show the updating form here
    public function showUpdateForm($id){

        $update = Devices::find($id);
        $cartegories = Cartegories::all()->where('id','!=',$update->cartegoryID)->where('status','active');
        $userList = User::all()->where('id','!=',$id);

         return view('admin.deviceUpdates', ['update'=>$update, 'cartegories'=>$cartegories, 'userList'=>$userList]);
    }

    // show the change hdd form with the device ifm code
    public function showHDDForm($id){

        $device = Devices::find($id);

         return view('admin.hddUpdates', ['device'=>$device]);
    }

    // change the hdd here
    public function changeHDD($id){

        request()->validate([
            'hddType'=>'required|min:3|max:30|string',
            'serialNo'=>'required|min:3|max:30|string',
            'capacity'=>'required|min:3|max:20|string',
            'dateChanged'=>'required|before_or_equal:'.date('m/d/y'),
            'place'=>'required|min:3|max:30|string',
        ]);

        $adminID = Session::get('user')['id'];
        $device= Memory::where('deviceID',$id)->first();

        HddChanges::Create([
            'deviceID'=>$device->id,
            'userID'=>$adminID,
            'initialHDD'=>$device->HDDType,
            'newHDD'=>request('hddType'),
            'initialSerialNo'=>$device->serialNo,
            'newSerialNo'=>request('serialNo'),
            'initialCapacity'=>$device->HDDCapacity,
            'newCapacity'=>request('capacity'),
            'placeStored'=>request('place'),
            'dateChanged'=>request('dateChanged'),
        ]);

        Memory::where('deviceID',$id)->update([

            'HDDType'=>request('hddType'),
            'HDDCapacity'=>request('capacity'),
            'serialNo'=>request('serialNo'),
        ]);

        session()->flash('hddChange', 'Data added successfulyy!!');

        return redirect('/devices');
    }

    // updating the device details here
    public function updateDevice($id){

        $ifmCode = Devices::find($id);

        if($ifmCode->ifmCode == request('ifmCode')){

            request()->validate([
                'cartegory'=>'required',
                'model'=>'required|string|min:2|max:30',
                'date'=>'required|before_or_equal:'.date('m/d/y'),
                'serial'=>'required|string|min:3|max:30',
                'ifmCode'=>'required|string|min:5|max:30',
                'location'=>'required|string|min:3|max:30',
                'owner'=>'required',
            ]);

            Devices::where('id',$id)->update([
                'cartegoryID'=>request('cartegory'),
                'model'=>request('model'),
                'dateBought'=>request('date'),
                'serialNo'=>request('serial'),
                'ifmCode'=>request('ifmCode'),
                'location'=>request('location'),
                'ownerID'=>request('owner'),
            ]);
    
        }else{

            request()->validate([
                'cartegory'=>'required',
                'model'=>'required',
                'date'=>'required|before_or_equal:'.date('m/d/y'),
                'serial'=>'required',
                'ifmCode'=>'required|unique:devices',
                'location'=>'required',
                'owner'=>'required',
            ]);

            Devices::where('id',$id)->update([
                'cartegoryID'=>request('cartegory'),
                'model'=>request('model'),
                'dateBought'=>request('date'),
                'serialNo'=>request('serial'),
                'ifmCode'=>request('ifmCode'),
                'location'=>request('location'),
                'ownerID'=>request('owner'),
            ]);
        }
        
        session()->flash('hdd','');

        return redirect('/devices');
    }

    public function hddchange(){
        $hddChanges = devices::all();  
        return view('admin.hddchange')->with('hddChanges',$hddChanges);
    }

    //Search Method
    public function search(request $request){ 
        //Take the text written and put it into variable
        $search = $request->input('search');
        
        //Take cartegories id to compare it in device for search
        $name = Cartegories::where('cartegory','LIKE','%'.$search.'%')->first();

        if($name){
            $cartegoryID = $name->id;
             //Check database the name looks like that
            $devices = Devices::where('model','LIKE','%'.$search.'%')->orWhere('ifmCode','LIKE','%'.$search.'%')->orWhere('cartegoryID','LIKE','%'.$cartegoryID.'%')->get();
            $count = count($devices);
        }else{
            //Check database the name looks like that
            $devices = Devices::where('model','LIKE','%'.$search.'%')->orWhere('ifmCode','LIKE','%'.$search.'%')->get();
            $count = count($devices);
        }
                                              
        return view('admin.search')->with([
            'devices'=>$devices,
            'count'=>$count
        ]);
    }

    //Method of showing devices of a specific cartegory

    public function specific($id){
         $cartegories = Devices::where('cartegoryID',$id)->get();
          
        return view('admin.specific')->with('cartegories',$cartegories);
    }
   
}
