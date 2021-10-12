<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Hash;
use App\Models\User;

class AddUsers extends Component
{
        // add user ..input variables here
        public $fname;
        public $mname;
        public $surname;
        public $pfNumber;
        public $department;

      //register the users here
      public function Register(){

        // validate data here before submitting
        $this->validate([
            'pfNumber'=>'required|unique:users|integer|min:100|max:9999',
            'fname'=>'required|string|min:4|max:20',
            'mname'=>'required|string|min:4|max:20',
            'surname'=>'required|string|min:4|max:20',
            'department'=>'required|string|min:3|max:20',
        ]); 

            // submit registered data in database here
            User::Create([
                'pfNumber'=>$this->pfNumber,
                'firstname'=>$this->fname,
                'middlename'=>$this->mname,
                'surname'=>$this->surname,
                'department'=>$this->department,
                'password'=>Hash::make($this->pfNumber)
            ]);

            $this->pfNumber = "";
            $this->fname = "";
            $this->mname = "";
            $this->surname = "";
            $this->department = "";

            session()->flash('addedUser','');

            // redirect to login here
            return redirect('/users');
    }

    public function render()
    {
        return view('livewire.add-users');
    }
}
