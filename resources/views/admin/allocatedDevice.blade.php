@extends('layouts.app')

@section('pages')
   {{-- navigation bread crumb here --}}
    <nav class="breadcrumb px-4 justify-content-between">
        <h5 class="text-ifm">Allocated Device</h5>
        <div class="d-none d-md-block d-sm-none">
            @if(session()->get('user')['status']=='admin')
            <a class="breadcrumb-item" href="/">Admin /</a>
            @else
            <a class="breadcrumb-item" href="{{url('wellcome')}}">Home /</a>
            @endif 
            <a class="breadcrumb-item" href="{{url('allocations')}}">Allocations /</a>
            <span class="breadcrumb-item active ">Allocated</span>
        </div>
        <div class="d-block d-md-none d-lg-none">
            <span class="badge text-ifm mr-3" style="cursor: pointer" data-toggle="modal" data-target="#modelId"><i class="dripicons-search " style="font-size: 25px" ></i></span>
            <a href="#" class="text-ifm"><i class="mdi mdi-account-circle-outline" style="font-size: 25px" ></i></a>
        </div>
    </nav>
    {{-- end bread crumb --}}

    {{-- single device here --}}
    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="d-flex justify-content-around ">
                            <i class="mdi mdi-history text-muted" style="font-size: 170px"></i>
                        </div>
                        
                        <div class="row justify-content-center mb-4">
                            @if (session()->get('user')['status']=="admin" || session()->get('user')['status']=="manager")
                            <div class="mt-2 mx-1 mb-2">
                                <a href={{"/allocate/".$allocated->getDevice->id}}  class="btn btn-outline-primary "><i class="mdi mdi-recycle"></i> Re-Allocate </a>
                            </div>
                            <div class="mt-2 mx-1 mb-2">
                                <a href={{"/deleteHistory/".$allocated->id}} class="btn btn-outline-danger"><i class="mdi mdi-delete"></i> Delete History</a>
                            </div>
                            @endif
                          
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h3 class="mt-0 text-ifm">{{$allocated->getDevice->ifmCode}} ( {{$allocated->getDevice->getCartegory->cartegory}} ) </h3>
                        <p class="mb-1 text-muted">Date Allocated: <span class="text-ifm">{{$allocated->dateAllocated}}</span> </p>
                           
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <h6 class="font-14 text-muted">Model:</h6>
                                <p class="text-sm lh-150 text-ifm">{{$allocated->getDevice->model}}</p>
                            </div>
                            <div class="col-md-3">
                                <h6 class="font-14 text-muted">Serial No:</h6>
                                <p class="text-sm lh-150 text-ifm">{{$allocated->getDevice->serialNo}}</p>
                            </div>
                            <div class="col-md-3">
                                <h6 class="font-14 text-muted">has Memory:</h6>
                                <p class="text-sm lh-150 text-ifm">{{$allocated->getDevice->hasMemory}}</p>
                            </div>
                            <div class="col-md-3">
                                <h6 class="font-14 text-muted">Status: </h6>
                                <p class="text-sm lh-150 text-ifm">{{$allocated->getDevice->status}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-14 text-muted">Previous location:</h6>
                                <p class="text-sm lh-150 text-ifm">{{$allocated->oldLocation}}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-14 text-muted">New Location:</h6>
                                <p class="text-sm lh-150 text-ifm">{{$allocated->newLocation}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-14 text-muted text-muted">Previous Owner:</h6>
                                <p class="text-sm lh-150 text-ifm">{{ucwords($allocated->getOldUser->firstname." ".$allocated->getOldUser->middlename." ".$allocated->getOldUser->surname)}}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-14 text-muted">New Owner:</h6>
                                <p class="text-sm lh-150 text-ifm">{{ucwords($allocated->getUser->firstname." ".$allocated->getUser->middlename." ".$allocated->getUser->surname)}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="font-14 text-ifm">Allocation Description:</h6>
                                <p class="text-sm lh-150 text-muted">{{$allocated->description}}</p>
                            </div>
                        </div>
                        <p class="mb-1 text-muted mt-4">Allocated By: <span class="text-ifm">{{ucwords($allocated->getAdmin->firstname." ".$allocated->getAdmin->middlename." ".$allocated->getAdmin->surname)}}</span> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of single device here --}}
@endsection