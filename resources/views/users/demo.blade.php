<div class="col-md-7">
    <h3 class="mt-0 text-ifm d-flex justify-content-between">
        {{strToUpper($items->ifmCode)}} ({{$items->getCartegory->cartegory}}) 
    
        @if (session()->get('user')['status'] == "admin" || session()->get('user')['status'] == "manager")
        <a href="/devices/single/update_device/{{$items->id}}" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a>
        @endif
    </h3>
    <p class="mb-1 text-muted">Date Bought: <span class="text-ifm">{{$items->dateBought}}</span> </p>
       
    <div id="accordianId" role="tablist"  class="mt-3 mb-4" aria-multiselectable="true">
        <div class="card border-0">
            <div class="card-header " role="tab" id="section1HeaderId">
                <h6 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                        <i class="mdi mdi-devices"></i> 
                        Device Informations
                        <i class="mdi mdi-chevron-down"></i>
                    </a>
                </h6>
            </div>
            <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="font-14 text-muted">Model:</h6>
                            <p class="text-sm lh-150 text-ifm">{{$items->model}}</p>
                        </div>
                        <div class="col-md-3">
                            <h6 class="font-14 text-muted">Serial No:</h6>
                            <p class="text-sm lh-150 text-ifm">{{$items->serialNo}}</p>
                        </div>
                        <div class="col-md-3">
                            <h6 class="font-14 text-muted">Has Memory:</h6>
                            <p class="text-sm lh-150 text-ifm">{{$items->hasMemory}}</p>
                        </div>
                        <div class="col-md-3">
                            <h6 class="font-14 text-muted">Status: </h6>
                            <p class="text-sm lh-150 text-ifm">{{$items->status}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-0">
            <div class="card-header" role="tab" id="section2HeaderId">
                <h6 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#section2ContentId" aria-expanded="true" aria-controls="section2ContentId">
                        <i class="mdi mdi-map-marker-radius-outline"></i> 
                         Location Informations
                        <i class="mdi mdi-chevron-down"></i>
                     </a>
                </h6>
            </div>
            <div id="section2ContentId" class="collapse in" role="tabpanel" aria-labelledby="section2HeaderId">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="font-14 text-muted">Place Located:</h6>
                            <p class="text-sm lh-150 text-ifm">{{$items->location}}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="font-14 text-muted" >Current Owner:</h6>
                            <p class="text-sm lh-150 text-ifm">{{ucwords($items->getOwner->firstname." ".$items->getOwner->middlename." ".$items->getOwner->surname)}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($items->hasMemory == "Yes")
            @if ($items->hddDetails)
            <div class="card border-0">
                <div class="card-header" role="tab" id="section3HeaderId">
                    <h6 class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordianId" href="#section3ContentId" aria-expanded="true" aria-controls="section3ContentId">
                            <i class="mdi mdi-memory"></i> 
                            Memory Informations
                            <i class="mdi mdi-chevron-down"></i>
                        </a>
                    </h6>
                </div>
                <div id="section3ContentId" class="collapse in" role="tabpanel" aria-labelledby="section3HeaderId">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="font-14 text-muted">HDD Type:</h6>
                                <p class="text-sm lh-150 text-ifm">{{$items->hddDetails->HDDType}}</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="font-14 text-muted">HDD SeialNo:</h6>
                                <p class="text-sm lh-150 text-ifm">{{$items->hddDetails->serialNo}}</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="font-14 text-muted">HDD Capacity:</h6>
                                <p class="text-sm lh-150 text-ifm">{{$items->hddDetails->HDDCapacity}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if ($items->hddChange)
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
                        @forelse ($items->hddChange as $change)
                        <div class="row justify-content-around">
                            <div class="col-md-4">
                                <h6 class="font-14 text-muted">Initial Capacity :</h6>
                                <p class="text-sm lh-150 text-ifm">{{$change->initialCapacity}}</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="font-14 text-muted">New Capacity</h6>
                                <p class="text-sm lh-150 text-ifm">{{$change->newCapacity}}</p>
                            </div>

                            <div class="col-md-4">
                                <h6 class="font-14 text-muted">New HDD Type:</h6>
                                <p class="text-sm lh-150 text-ifm">{{$change->newHDD}}</p>
                            </div>
                            
                        </div>
                        <hr>
                        @empty
                        <p class="text-muted d-flex justify-content-center">No Any Hard Disk Changes By Now....</p>
                        @endforelse
                        
                    </div>
                </div>
            </div>
            @endif

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
                            @forelse ($items->allocateddevice as $change)
                            <div class="row justify-content-around">
                                <div class="col-md-3">
                                    <h6 class="font-14 text-muted">New Owner :</h6>
                                    <p class="text-sm lh-150 text-ifm">{{ucwords($change->getUser->firstname." ".$change->getUser->middlename)}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="font-14 text-muted">Previous Owner</h6>
                                    <p class="text-sm lh-150 text-ifm">{{ucwords($change->getOldUser->firstname." ".$change->getOldUser->middlename)}}</p>
                                </div>

                                <div class="col-md-3">
                                    <h6 class="font-14 text-muted">Date Alocated:</h6>
                                    <p class="text-sm lh-150 text-ifm">{{$change->dateAllocated}}</p>
                                </div>
                                <div class="col-md-3">
                                        <div class="row justify-content-center align-items-center mt-4">
                                <a href={{"/allocated/".$change->id}}><i class="mdi mdi-eye" aria-hidden="true"></i>View Details </a>

                                        </div>
                                </div>
                            </div>
                            <hr>
                            @empty
                                <p class="text-muted d-flex justify-content-center">No Any Re-Allocation By Now....</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endif
        @else
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
                            @forelse ($items->allocateddevice as $change)
                            <div class="row justify-content-around">
                                <div class="col-md-3">
                                    <h6 class="font-14 text-muted">New Owner :</h6>
                                    <p class="text-sm lh-150 text-ifm">{{ucwords($change->getUser->firstname." ".$change->getUser->middlename)}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="font-14 text-muted">Previous Owner</h6>
                                    <p class="text-sm lh-150 text-ifm">{{ucwords($change->getOldUser->firstname." ".$change->getOldUser->middlename)}}</p>
                                </div>

                                <div class="col-md-3">
                                    <h6 class="font-14 text-muted">Date Alocated:</h6>
                                    <p class="text-sm lh-150 text-ifm">{{$change->dateAllocated}}</p>
                                </div>
                                <div class="col-md-3">
                                        <div class="row justify-content-center align-items-center mt-4">
                                <a href={{"/allocated/".$change->id}}><i class="mdi mdi-eye" aria-hidden="true"></i>View Details </a>

                                        </div>
                                </div>
                            </div>
                            <hr>
                            @empty
                                <p class="text-muted d-flex justify-content-center">No Any Re-Allocation By Now....</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endif
        @endif
      
    </div>
    <p class=" text-muted">Registered By: <span class="text-ifm">{{ucwords($items->getRegist->firstname." ".$items->getRegist->middlename." ".$items->getRegist->surname)}}</span> </p>
</div>