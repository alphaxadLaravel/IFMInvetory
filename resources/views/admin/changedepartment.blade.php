@extends('layouts.app')

@section('pages')
   {{-- navigation bread crumb here --}}
    <nav class="breadcrumb px-4 justify-content-between">
        <h5 class="text-ifm">Change Department</h5>
        <div class="d-none d-md-block d-sm-none">
            <a class="breadcrumb-item" href="/">Admin /</a>
            <a class="breadcrumb-item" href="{{url('users')}}">Users /</a>
            <span class="breadcrumb-item">Update</span>
            
        </div>
        <div class="d-block d-md-none d-lg-none">
            <span class="badge text-ifm mr-3" style="cursor: pointer" data-toggle="modal" data-target="#modelId"><i class="dripicons-search " style="font-size: 25px" ></i></span>
            <a href="/profile" class="text-ifm"><i class="mdi mdi-account-circle-outline" style="font-size: 25px" ></i></a>
        </div>
    </nav>

    {{-- end bread crumb --}}

    {{-- profile page contents here --}}
    <div class="container mt-5 mb-5">
        <div class="card border-0 shadow-sm ">
            <div class="card-body">
                <div class="row">
                    
                    {{-- user details here with chnage departent form --}}
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                            <i class="mdi mdi-account-edit text-muted" style="font-size: 150px"></i>
                        </div>
                        <div class="col-md-8 mt-4">
                            <div class="row d-flex justify-content-between">
                                <h3 class="mt-0 text-ifm mb-3">
                                    <i class="mdi mdi-account-check-outline "></i> {{$user->pfNumber}}
                                 </h3>
                                 <p class="text-sm text-muted pr-3"> Departement: <span class="text-ifm">{{$user->department}}</span></p>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="text-muted">Firstname</h6>
                                    <p class="text-sm text-ifm"><i class="mdi mdi-hand-pointing-right"></i> {{$user->firstname}}</p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="text-muted">Middlename</h6>
                                    <p class="text-sm text-ifm"><i class="mdi mdi-hand-pointing-right"></i> {{$user->middlename}}</p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="text-muted">Surname</h6>
                                    <p class="text-sm text-ifm"><i class="mdi mdi-hand-pointing-right"></i> {{$user->surname}}</p>
                                </div>
                            </div>

                            <p class="text-ifm"><i class="mdi mdi-account-edit"></i> Update User Department</p>
                            <form action="{{url("newdepartment/$user->id")}}" method="post" class="mt-4">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Enter New Department" value="" name="department">
                                       <small>
                                           @error('department')
                                              <small class="form-text text-danger">{{$message}}</small> 
                                           @enderror
                                       </small>
                                            
                        
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-outline-primary"> Change Department</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    {{-- end of chnage role --}}

                </div>
            </div>
        </div>
    </div>
    {{-- end of profile page content here --}}

@endsection