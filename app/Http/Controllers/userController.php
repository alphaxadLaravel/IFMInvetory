<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    // redirect to thr change role page here
    public function rolePage($id){
        $userRole = User::find($id);
        return view('admin.changeRole', ['userRole'=>$userRole]);
    }

    // change the role here
    public function changeRole($id){

            // validate the role request
            request()->validate([
                'role'=>'required',
            ]);

            // update the Users table on role column
            User::where('id',$id)->update([
                'status'=>request('role')
            ]);

            session()->flash('role','');

            return redirect('/users');
    }

    //Update Department
    public function department($id){
        $user = User::find($id);
        return view('admin.changedepartment')->with('user',$user);
    }

    // update department here
    public function updatedepartment($id){
        $user = User::find($id);

        request()->validate([
           'department'=>'required|string|min:3|max:50|regex:/^[a-zA-Z]+$/u'
        ]);

        User::where('id',$id)->update([
            'department'=>request('department')
        ]);
        
        return redirect('/users');
    }
}
