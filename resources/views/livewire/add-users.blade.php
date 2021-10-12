<div class="">
    {{-- navigation bread crumb here --}}
<nav class="breadcrumb px-4 justify-content-between">
  <h5 class="text-ifm">Add User</h5>
  <div class="d-none d-md-block d-sm-none">
      
      <a class="breadcrumb-item" href="/">Admin /</a>
      <span class="breadcrumb-item active ">Add User</span>
  </div>
  <div class="d-block d-md-none d-lg-none">
      <span class="badge text-ifm mr-3" style="cursor: pointer" data-toggle="modal" data-target="#modelId"><i class="dripicons-search " style="font-size: 25px" ></i></span>
      <a href="#" class="text-ifm"><i class="mdi mdi-account-circle-outline" style="font-size: 25px" ></i></a>
  </div>
</nav>
{{-- end bread crumb --}}

<div class="container">
  <div class="card border-0 shadow-sm p-3">
      <div class="card-body">
          <div class="row">
            <div class="col-md-4">
                <img src="images/man.jpg" width="100%" alt="">
            </div>
                <div class="col-md-8">
                    <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-ifm mb-3">ADD NEW USERS <i class="mdi mdi-account-plus-outline"></i></h5>
                    <a href="/users/import" class="btn text-ifm d-none d-md-block d-lg-block"><i class=" dripicons-cloud-download "></i> Import Excel Doc</a>
                    </div>
                    <form action="" wire:submit.prevent="Register" method="POST" >
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" wire:model="fname"   aria-describedby="helpId" placeholder="Enter Firstname..">
                                    <small id="helpId" class="form-text text-danger">
                                        @error('fname')
                                            {{$message}}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Middle Name</label>
                                    <input type="text" class="form-control" wire:model="mname"   aria-describedby="helpId" placeholder="Enter Middlename...">
                                    <small id="helpId" class="form-text text-danger">
                                        @error('mname')
                                            {{$message}}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Surname </label>
                                    <input type="text" class="form-control" wire:model="surname"   aria-describedby="helpId" placeholder="Enter Surname...">
                                    <small id="helpId" class="form-text text-danger">
                                        @error('surname')
                                            {{$message}}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">PF Number</label>
                                <input type="text" class="form-control" wire:model="pfNumber"   aria-describedby="helpId" placeholder="Staff PF Nnumber..">
                                <small id="helpId" class="form-text text-danger">
                                    @error('pfNumber')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Department</label>
                                <input type="text" class="form-control" wire:model="department"   aria-describedby="helpId" placeholder="Enter department..">
                                <small id="helpId" class="form-text text-danger">
                                    @error('department')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row justify-content-center pt-2 mt-4">
                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-database-plus"></i> Add User</button>
                                </div>
                        </div>
                    </div>
                        
                    </form>
                    
                </div>

          </div>
      </div>
  </div>
</div>
{{-- end of all devices here --}}
</div>