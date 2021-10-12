 {{-- form step3 here --}}
 <div class="col-md-8">
    <h5 class="text-ifm mb-3">HARD DISK CHANGES <i class="mdi mdi-memory"></i></h5>
<form action="" wire:submit.prevent="changedDetails">
  <div class="row mt-3">
      <div class="col-md-4">
          <div class="form-group">
              <label for="">Initial HDD Type</label>
              <input type="text" class="form-control" wire:model="initial"   aria-describedby="helpId" placeholder="Enter Initial HDD..">
              <small class="text-danger">
                  @error('initial')
                  {{$message}}
              @enderror
              </small>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label for="">Serial Number</label>
              <input type="text" class="form-control" wire:model="serialNo"   aria-describedby="helpId" placeholder="Enter serial num...">
              <small class="text-danger">
                  @error('serialNo')
                  {{$message}}
              @enderror
              </small>
          </div>
      </div>
      
      <div class="col-md-4">
          <div class="form-group">
          <label for="">Place Stored</label>
          <input type="text" class="form-control" wire:model="place"   aria-describedby="helpId" placeholder="Enter place stored..">
          <small class="text-danger">
              @error('place')
                  {{$message}}
              @enderror
          </small>
      </div>
      </div>
  </div>
  <div class="row justify-content-between mt-4 px-3">
      <button type="button" wire:click="goStep3" class="btn btn-primary"><i class="mdi mdi-hand-pointing-left"></i> Back</button>
      <button type="submit" class="btn btn-primary"><i class="mdi mdi-database-plus"></i> Submit</button>
  </div>
</form>
</div>
{{-- end form step3 here --}}







  // add the final form for changed details
  public function changedDetails(){
    $this->validate([
        'initial'=>'required',
        'place'=>'required',
        'serialNo'=>'required',
      ]);

      // submitting the step1 form
      $this->submitStep1();
  
      // submitting the step two form here
      $this->submitStep2();  

      // get the device memory details ID frrom memory table here
      $memo = Memory::latest('id')->first();
      $memoID =  $memo->id;

       
      // submit the hard disk changes here
      HddChanges::Create([
        'memoDeviceID' => $memoID,
        'initialHDD'=> $this->initial,
        'serialNo' => $this->serialNo,
        'placeStored' => $this->place,
      ]);

      // clear all the inputs here
      $this->clearInputs();

      return redirect('/devices');
  }
//  --------------------------------------------

// the variables for the 3rd form here
    public $initial;
    public $serialNo;
    public $place;

//  --------------------------------------------
