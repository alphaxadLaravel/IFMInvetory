<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\User;
use App\Models\Cartegories;
use App\Models\ReAllocations;


class DashboardController extends Controller
{

    //function to create counts here
    public function dashCounts(){
        
        // count the devices available
        $devices = Devices::all()->count();

        // count the devices with memory
        $memory = Devices::all()->where('hasMemory', '=', 'Yes')->count();

        // count the non memory devices here
        $nonMemo = Devices::all()->where('hasMemory', '=', 'No')->count();

        // count the re allocations done
        $allocation = ReAllocations::all()->count();
        
        // counting the cartegories
        $cartegory = Cartegories::all()->where('status','=','active')->count();

        // counting the usrs available
        $users = User::all()->count();

        // fetching the saple devices
        $sample = Devices::offset(0)->limit(5)->get();

        // returning the counts and devices 
        return view('admin.dashboard', [
            'devices'=>$devices, 
            'allocation'=>$allocation,
            'cartegory'=>$cartegory,
            'sample'=>$sample,
            'users'=>$users,
            'memory'=>$memory,
            'nonMemo'=>$nonMemo,
            ]);
    }

    // the user dashboard counters here
    public function userDashboard(){
            
        // count the devices available
        $devices = Devices::all()->count();

        // count the devices with memory
        $memory = Devices::all()->where('hasMemory', '=', 'Yes')->count();

        // count the non memory devices here
        $nonMemo = Devices::all()->where('hasMemory', '=', 'No')->count();
        
        // counting the cartegories
        $cartegory = Cartegories::all()->where('status','=','active')->count();

        // get the available cartegories
        $carts = Cartegories::offset(0)->limit(4)->get();

        // fetching the sample devices
        $sample = Devices::offset(0)->limit(5)->get();

        return view('users.home', [
            'devices'=>$devices, 
            'cartegory'=>$cartegory,
            'sample'=>$sample,
            'memory'=>$memory,
            'nonMemo'=>$nonMemo,
            'carts'=>$carts,
            ]);
    }
    
}
