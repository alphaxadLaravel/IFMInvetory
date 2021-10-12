<?php

namespace App\Http\Livewire;
use App\Models\Devices;
use App\Models\Memory;
use App\Models\HddChanges;
use App\Models\Cartegories;
use App\Models\User;
use Session;

use Livewire\Component;

class StepForm extends Component
{

  // mount the cartegories in the form here
  public $cartegories;
  // mount the users list in the form here
  public $userList;

  public function mount(){
    $this->cartegories = Cartegories::all()->where('status','active');

    $this->userList = User::where('available','present')->get();
    
  }

    // Add device forms steps here
    public $step1 = true;
    public $step2 = false;

//  --------------------------------------------

    // Form 1 variables here
    public $cartegory;
    public $model;
    public $date;
    public $serial;
    public $ifmCode;
    public $memo;
    public $location;
    public $owner;

// --------------------------------------------

    // validating the step1 form function here
    public function validateStep1(){
      $this->validate([
        'cartegory'=>'required',
        'model'=>'required|string|min:2|max:20',
        'date'=>'required|before_or_equal:'.date('m/d/y'),
        'serial'=>'required|string|min:3|max:30',
        'ifmCode'=>'required|unique:devices|string|min:5|max:30',
        'memo'=>'required',
        'location'=>'required|string|min:3|max:30',
        'owner'=>'required',
      ]);
    }

// --------------------------------------------

    // submiting step one function here
    public function submitStep1(){

       Devices::Create([
        'cartegoryID'=> $this->cartegory,
        'model'=> $this->model,
        'dateBought'=> $this->date,
        'serialNo'=>$this->serial,
        'ifmCode'=>$this->ifmCode,
        'hasMemory'=>$this->memo,
        'registID'=>Session::get('user')['id'],
        'location'=>$this->location,
        'ownerID'=>$this->owner,
      ]);

      //Find the value of devices
       $value_of_device = Cartegories::find($this->cartegory);
       $value = $value_of_device->devices + 1;
     
      //  update table cartegory counts
      Cartegories::where('id',$this->cartegory)->update([
        'devices' => $value
      ]);
    }

// --------------------------------------------

    // claering the inputs here
    public function clearInputs(){
      $this->location = "";
      $this->model = "";
      $this->ifmCode = "";
      $this->date = "";
      $this->cartegory = "";
      $this->serial = "";
      $this->owner = "";
      $this->hddType = "";
      $this->serialNo= "";
      $this->capacity= "";
    }

// --------------------------------------------

    // submitting form one here
    public function newDevice(){
    
        // validating function
        $this->validateStep1();

        // submiting function
        $this->submitStep1();

        // claer inputs function here
        $this->clearInputs();

        session()->flash('data', 'Data added successfulyy!!');

          return redirect('/devices');
    }

// --------------------------------------------
    // goin to step two for here
    public function goStep2(){
       
      // validate before mooving next
       $this->validateStep1();
    
        // switch the form display to form two here
        $this->step1 = false;
        $this->step2 = true;
      }
// --------------------------------------------
      // go back to step 1 here
      public function goStep1(){
        $this->step1 = true;
        $this->step2 = false;
      }
// --------------------------------------------
        // the step 2 form is here
        public $hddType;
        public $serialNo;
        public $capacity ;

//  --------------------------------------------

      // function to valoidate the step 2 form
      public function validateStep2(){
        $this->validate([
          'hddType'=>'required|string|min:3|max:20',
          'serialNo'=>'required|string|min:3|max:30',
          'capacity'=>'required|string|min:2|max:15',
        ]);
      }

//  --------------------------------------------
      // submitting the step two data function
      public function submitStep2(){
           // fetch the ID of the device in form one
            $data = Devices::latest('id')->first();
            $ID =  $data->id;

            // use the ID as the foreign key
            // register in memory table as foreign key
            Memory::Create([
              'deviceID'=> $ID,
              'HDDType'=> $this->hddType,
              'serialNo'=> $this->serialNo,
              'HDDCapacity'=>$this->capacity
            ]); 
      }

//  --------------------------------------------
  
      // adding device with memory here
  public function memoDetails(){
       
    // validating the inputs before subitting
    $this->validateStep2();

    // subitting the devices form step 1
     $this->submitStep1();

  //  submitting the step 2 form here
    $this->submitStep2();
         
    // clear all the inputs here
    // clear for step one and two here
    $this->clearInputs();
    
    session()->flash('data', 'Data added successfulyy!!');

    return redirect('/devices');
  }

//  --------------------------------------------

  // rendering the page to be displayed
    public function render()
    {
        return view('livewire.step-form');
    }
}
