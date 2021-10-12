@extends('layouts.app')

@section('pages')
   {{-- navigation bread crumb here --}}
    <nav class="breadcrumb px-4 justify-content-between">
        <h5 class="text-ifm">Device</h5>
        <div class="d-none d-md-block d-sm-none">
            @if(session()->get('user')['status']=="admin")
            <a class="breadcrumb-item" href="/">Admin /</a>
            @else
            <a class="breadcrumb-item" href="{{url('wellcome')}}">Home /</a>
            @endif
            <a href="{{url('/devices')}}" class="breadcrumb-item">Devices /</a>
            <span class="breadcrumb-item active ">Device</span>
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
                    <div class="col-md-4">
                        <div class="d-flex justify-content-center">
                            @if ($items->hddDetails)
                            <i class="mdi mdi-database text-muted" style="font-size: 140px"></i>
                            @else
                            <i class="mdi mdi-database-off text-muted" style="font-size: 140px"></i>
                            @endif
                        </div>
                        @if (session()->get('user')['status'] == "admin" || session()->get('user')['status'] == "manager")
                        <div class="row justify-content-center sticky-bottom mb-5">
                            @if ($items->hddDetails)
                            <div class="mt-2 mx-1 mb-2">
                                <a href={{"/devices/single/hdd_changes/".$items->id}}  class="btn btn-sm btn-outline-primary"><i class="mdi mdi-memory"></i> Change HDD</a>
                            </div>
                            @endif
                           
                            <div class="mt-2 mx-1 mb-2">
                                <a href={{"/allocate/".$items->id}}  class="btn btn-sm btn-outline-secondary "><i class="mdi mdi-recycle"></i> Re-Allocate</a>
                            </div>
                            <div class="mt-2 mx-1 mb-2">
                                <a href={{"/delete/".$items->id}} class="btn btn-sm btn-outline-danger"><i class="mdi mdi-delete"></i> Delete</a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h3 class="mt-0 text-ifm d-flex justify-content-between">
                            {{strToUpper($items->ifmCode)}} ({{$items->getCartegory->cartegory}}) 
                        
                            @if (session()->get('user')['status'] == "admin" || session()->get('user')['status'] == "manager")
                            <a href="/devices/single/update_device/{{$items->id}}" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a>
                            @endif
                        </h3>
                        <p class="mb-1 text-muted">Date Bought: <span class="text-ifm">{{$items->dateBought}}</span> </p>
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Attribute</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Model</td>
                                    <td scope="row" class="text-ifm"><i class="mdi mdi-hand-pointing-right"></i>  {{$items->model}}</td>
                                </tr>
                                <tr>
                                    <td>Serial No:</td>
                                    <td scope="row" class="text-ifm"><i class="mdi mdi-hand-pointing-right"></i>  {{$items->serialNo}}</td>
                                </tr>
                                <tr>
                                    <td>Place Located:</td>
                                    <td scope="row" class="text-ifm"><i class="mdi mdi-hand-pointing-right"></i>  {{$items->location}}</td>
                                </tr>
                                <tr>
                                    <td>Current Owner:</td>
                                    <td scope="row" class="text-ifm"><i class="mdi mdi-hand-pointing-right"></i>  {{ucwords($items->getOwner->firstname." ".$items->getOwner->middlename." ".$items->getOwner->surname)}}</td>
                                </tr>
                                <tr>
                                    <td>Has Memory:</td>
                                    <td scope="row" class="text-ifm"><i class="mdi mdi-hand-pointing-right"></i>  {{$items->hasMemory}}</td>
                                </tr>
                                @if ($items->hasMemory == "Yes")
                                <tr>
                                    <td>HDD Type:</td>
                                    <td scope="row" class="text-ifm"><i class="mdi mdi-hand-pointing-right"></i>  {{$items->hddDetails->HDDType}}</td>
                                </tr>
                                <tr>
                                    <td>HDD SeialNo:</td>
                                    <td scope="row" class="text-ifm"><i class="mdi mdi-hand-pointing-right"></i>  {{$items->hddDetails->serialNo}}</td>
                                </tr>
                                <tr>
                                    <td>HDD Capacity:</td>
                                    <td scope="row" class="text-ifm"><i class="mdi mdi-hand-pointing-right"></i>  {{$items->hddDetails->HDDCapacity}}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                        <div id="accordianId" role="tablist"  class="mt-3 mb-4" aria-multiselectable="true">
                            @if ($items->allocateddevice)
                                <div class="card border-0">
                                    <div class="card-header" role="tab" id="allocates">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordianId" href="#allocated" aria-expanded="true" aria-controls="allocated">
                                                <i class="mdi mdi-history"></i> 
                                                Allocations History
                                                <i class="mdi mdi-chevron-down"></i>
                                            </a>
                                        </h6>
                                    </div>
                                    <div id="allocated" class="collapse in" role="tabpanel" aria-labelledby="allocates">
                                        <div class="card-body">
                                            
                                            @if ($items->allocateddevice)
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Previous Owner</th>
                                                        <th>New Owner</th>
                                                        <th>Date Allocated</th>
                                                        <th>View</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($items->allocateddevice as $change)
                                                        @if ($change->status == "active")
                                                            <tr>
                                                                <td scope="row">{{ucwords($change->getOldUser->firstname." ".$change->getOldUser->middlename)}}</td>
                                                                <td>{{ucwords($change->getUser->firstname." ".$change->getUser->middlename)}}</td>
                                                                <td>{{$change->dateAllocated}}</td>
                                                                <td><a href={{"/allocated/".$change->id}}><i class="mdi mdi-eye" aria-hidden="true"></i>View Details </a></td>
                                                            </tr>
                                                        @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                            @else
                                              <p class="text-muted d-flex justify-content-center">No Any Re-Allocation By Now....</p>
                                            @endif
                                           
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($items->hasMemory == "Yes")
                            <div class="card border-0">
                                <div class="card-header" role="tab" id="section4HeaderId">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" data-parent="#accordianId" href="#section4ContentId" aria-expanded="true" aria-controls="section4ContentId">
                                            <i class="mdi mdi-recycle"></i> 
                                            HDD Changes History
                                            <i class="mdi mdi-chevron-down"></i>
                                        </a>
                                    </h6>
                                </div>
                                <div id="section4ContentId" class="collapse in" role="tabpanel" aria-labelledby="section4HeaderId">
                                    <div class="card-body">
                                        @if ($items->hddChange)
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Initial Capacity</th>
                                                    <th>New Capacity</th>
                                                    <th>New HDD Type</th>
                                                    <th>Date Changed</th>
                                                    <th>Place Stored</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($items->hddChange as $change)
                                                <tr>
                                                    <td scope="row">{{$change->initialCapacity}}</td>
                                                    <td>{{$change->newCapacity}}</td>
                                                    <td>{{$change->newHDD}}</td>
                                                    <td>{{$change->dateChanged}}</td>
                                                    <td>{{$change->placeStored}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                         <p class="text-muted d-flex justify-content-center">No Any Hard Disk Changes By Now....</p>
                                        @endif
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <p class=" text-muted">Registered By: <span class="text-ifm">{{ucwords($items->getRegist->firstname." ".$items->getRegist->middlename." ".$items->getRegist->surname)}}</span> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of single device here --}}
@endsection

