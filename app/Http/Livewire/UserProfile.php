<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Hash;

class UserProfile extends Component
{
    // variables to alter the profile page here
    public $changePassword = false;
    public $ProfileDetails = true;

    // the pasword chnged here
    public $pass1;
    public $pass2;
    public $hashed;

    // show the chnange password form here
    public function gotoChange(){
        $this->changePassword = true;
        $this->ProfileDetails = false;
    }

    // show the profile detils here
    public function goProfile(){
        $this->changePassword = false;
        $this->ProfileDetails = true;
    }

    // chnage the passwords here now
    public function changePWD($id){
        $this->validate([
            'pass1'=>'required',
            'pass2'=>'required|string|min:4|max:8',
        ]);

        $data = User::where('id',$id)->first();
        
            if(Hash::check($this->pass1, $data->password)){
                // hash the password and store it
              $this->hashed = Hash::make($this->pass2); 
                User::where('id',$id)->update([
                    'password'=>$this->hashed
                ]);

                session()->flash('changed','');

                $this->goProfile();
                return redirect('/profile');

            }else{
                session()->flash('changeError', '');
                $this->gotoChange();
                return redirect('/profile');
            }
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
