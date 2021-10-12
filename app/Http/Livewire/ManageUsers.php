<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Devices;
class ManageUsers extends Component
{

    // capture the user role here
    public $userRole;
    public $adminRole;
    public $viewerRole;

    // paginating here
    use WithPagination;

    // allow pagination styles with bootstrap here
    protected $paginationTheme = 'bootstrap';

    // chnage the role of the user here
    public function changeRole($userID){

        $this->validate([
            'viewerRole'=>'required',
            'adminRole'=>'required',
            'userRole'=>'required'
        ]);

        

        User::where('id',$userID)->update([
            'status'=>$this->userRole
        ]);

    }

    // dlete the user here
    public function deleteUser($id){

        $check = Devices::where('ownerID',$id)->first();

        if($check){
            session()->flash('fail', '');

            return redirect('/users');
        }else{
            $user = User::where('id',$id)->update([
                'available'=>'absent'
            ]);

            session()->flash('deleted', 'Data deleted successfulyy!!');

            return redirect('/users');
        }

       
    }

    public $filter1 = 5;
    public $filter2;
    public $counter = 1;
    
    public function render()
    {
        return view('livewire.manage-users', [
            'users' => User::when($this->filter2, function($query, $filter2){
                return $query->where('status', 'LIKE', "%$filter2%");
            })->where('available','present')->latest()->paginate($this->filter1),
            'totalUser'=>User::count(),
            'counter'=>$this->counter,
        ]);


    }
}
