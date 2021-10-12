<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartegories;
use App\Models\Devices;
use Session;

class cartegoryController extends Controller
{
    // function to register new cartegory here
        public function newCartegory(){

            request()->validate([
                'cartegory'=>'required|min:3|max:15|unique:cartegories'
            ]);

            Cartegories::Create([
                'cartegory'=>request('cartegory'),
                'userID'=>Session::get('user')['id'],
            ]);
            
            return redirect('/cartegory')->with('success', '');
        }
}
