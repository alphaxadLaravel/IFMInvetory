<div>

     {{-- navigation bread crumb here --}}
        <nav class="breadcrumb px-4 justify-content-between">
            <h5 class="text-ifm">My Profile</h5>
            <div class="d-none d-md-block d-sm-none">
                <a class="breadcrumb-item" href="/">Admin /</a>
                <span class="breadcrumb-item active ">Profile</span>
            </div>
            <div class="d-block d-md-none d-lg-none">
                <span class="badge text-ifm mr-3" style="cursor: pointer" data-toggle="modal" data-target="#modelId"><i class="dripicons-search " style="font-size: 25px" ></i></span>
                <a href="#" class="text-ifm"><i class="mdi mdi-account-circle-outline" style="font-size: 25px" ></i></a>
            </div>
        </nav>

    {{-- end bread crumb --}}

    {{-- profile page contents here --}}
    <div class="container mt-4 mb-5">
        @if (Session::has('changeError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>The Old password does not Exist!!</strong>

            </div>
        @endif
        @if (Session::has('changed'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Password changed Successfully!!!</strong>

            </div>
        @endif
        <div class="card border-0 shadow-sm ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        {{-- <img src="images/man.jpg" width="100%" alt=""> --}}
                        <div class="d-flex justify-content-center">
                        <i class="mdi mdi-account-outline text-muted" style="font-size: 160px"></i>
                        </div>
                    </div>
                    
                    @if ($changePassword)
                    {{-- cahnge password here --}}
                        <div class="col-md-7 mt-4">
                           <div class="row d-flex justify-content-between mb-3">
                            <h3 class="mt-0 text-ifm mb-3 ">
                                <span><i class="mdi mdi-lock-check-outline "></i> Change Password </span>    

                            </h3>
                            <p class="text-ifm pr-4 " style="cursor: pointer" wire:click="goProfile"><i class="mdi mdi-hand-pointing-left"></i> Back To Profile</p>
                           </div>

                            <form action="" wire:submit.prevent="changePWD( {{Session::get('user')['id']}})" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Old Password</label>
                                        <input type="text" class="form-control" wire:model="pass1" placeholder="Enter Old Password">
                                        <small class="text-danger">
                                            @error('pass1')
                                                {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">New Password</label>
                                        <input type="text" class="form-control" wire:model="pass2" placeholder="Enter new Password">
                                      <small class="text-danger">
                                          @error('pass2')
                                              {{$message}}
                                          @enderror
                                      </small>
                                    </div>

                                </div>
                                <div class="row mt-4 justify-content-around">
                                    <button class="btn btn-outline-primary" type="submit"><i class="mdi mdi-lock-check-outline ms-2"></i> Change Now</button>
                                </div>
                            </form>
                        </div>
                    {{-- end change password --}}
                    @elseif($ProfileDetails)
                    {{-- show profile details here --}}
                        <div class="col-md-7 mt-4">
                            
                                <div class="row d-flex justify-content-between">
                                    <h3 class="mt-0 text-ifm mb-3">
                                        <i class="mdi mdi-account-check-outline "></i> {{ucwords(Session::get('user')['pfNumber'])}} <span class="text-muted">({{ucwords(Session::get('user')['status'])}})</span>
                                     </h3>
                                     <p class="text-sm text-muted pr-3"> Departement: <span class="text-ifm">{{ucwords(Session::get('user')['department'])}} </span></p>
                                </div>
                           
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6 class="text-muted">Firstname</h6>
                                        <p class="text-sm text-ifm"><i class="mdi mdi-hand-pointing-right"></i> {{Session::get('user')['firstname']}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="text-muted">Middlename</h6>
                                        <p class="text-sm text-ifm"><i class="mdi mdi-hand-pointing-right"></i>{{Session::get('user')['middlename']}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="text-muted">Surname</h6>
                                        <p class="text-sm text-ifm"><i class="mdi mdi-hand-pointing-right"></i> {{Session::get('user')['surname']}}</p>
                                    </div>
                                </div>

                            <div class="row mt-4 justify-content-around">
                                <button class="btn btn-outline-secondary" wire:click="gotoChange"><i class="mdi mdi-lock-check-outline ms-2"></i> Change Password</button>
                            </div>
                        </div>
                   {{-- end of thr rdit profile here --}}
                   @endif

                </div>
            </div>
        </div>
    </div>
    {{-- end of profile page content here --}}
</div>
