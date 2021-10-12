@extends('layouts.app')

@section('pages')
<div>
    <div class="">
            {{-- navigation bread crumb here --}}
        <nav class="breadcrumb px-4 justify-content-between">
        <h5 class="text-ifm">Change HDD</h5>
        <div class="d-none d-md-block d-sm-none">
            @if (session()->get('user')['status'] == "admin")
            <a class="breadcrumb-item" href="/">Admin /</a>
            @else
            <a class="breadcrumb-item" href="/wellcome">Home /</a>
            @endif
            <a class="breadcrumb-item" href="/devices">Devices /</a>
            <span class="breadcrumb-item active ">Hdd changes</span>
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
                    <div class="col-md-4 d-flex justify-content-center">
                        <i class="mdi mdi-memory text-muted" style="font-size: 150px"></i>
                    </div>

                    <div class="col-md-8">
                        <div class="d-flex justify-content-between">
                        <h5 class="text-ifm mb-3">CHANGE DEVICE HDD <i class="mdi mdi-memory"></i></h5>
                        <h5 class="text-ifm mb-3">{{strToUpper($device->ifmCode)}} ( {{ucfirst($device->getCartegory->cartegory)}} ) </h5>
                        </div>
                        <form action={{"/devices/single/hdd_changed/".$device->id}} method="POST">
                            @csrf
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">New HDD Type</label>
                                        <input  type="text" class="form-control" name="hddType"  placeholder="Enter HDD Type..">
                                        <small class="text-danger">
                                            @error('hddType')
                                                {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">New HDD Serial No</label>
                                        <input  type="text" class="form-control" name="serialNo"  placeholder="Enter HDD serail...">
                                        <small class="text-danger">
                                            @error('serialNo')
                                                {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">New HDD Capacity</label>
                                        <input  type="text" class="form-control" name="capacity" placeholder="Enter HDD Capacit..">
                                        <small class="text-danger">
                                            @error('capacity')
                                                {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Date Changed</label>
                                        <input  type="date" class="form-control" name="dateChanged"  placeholder="Enter HDD Type..">
                                        <small class="text-danger">
                                            @error('dateChanged')
                                                {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Initial HDD Place stored</label>
                                    <input  type="text" class="form-control" name="place" placeholder="Enter place stored...">
                                    <small class="text-danger">
                                        @error('place')
                                            {{$message}}
                                        @enderror
                                    </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end mb-0 text-center mt-3">
                                <button class="btn btn-primary mx-2" type="submit"><i class="mdi mdi-database-sync"></i> Change HDD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of all devices here --}}
  </div>
</div>
@endsection