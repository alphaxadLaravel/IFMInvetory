@extends('layouts.app')

@section('pages')
   {{-- navigation bread crumb here --}}
    <nav class="breadcrumb px-4 justify-content-between">
        <h5 class="text-ifm">Allocate Device</h5>
        <div class="d-none d-md-block d-sm-none">
            @if (session()->get('user')['status'] == "admin")
            <a class="breadcrumb-item" href="/">Admin /</a>
            @else
            <a class="breadcrumb-item" href="/wellcome">Home /</a>
            @endif

            <a class="breadcrumb-item" href="/devices">Devices /</a>
            <span class="breadcrumb-item active ">Allocate</span>
        </div>
        <div class="d-block d-md-none d-lg-none">
            <span class="badge text-ifm mr-3" style="cursor: pointer" data-toggle="modal" data-target="#modelId"><i class="dripicons-search " style="font-size: 25px" ></i></span>
            <a href="#" class="text-ifm"><i class="mdi mdi-account-circle-outline" style="font-size: 25px" ></i></a>
        </div>
    </nav>
    {{-- end bread crumb --}}


    {{-- all devices here --}}
    <div class="container">
        <div class="card border-0 shadow-sm p-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 d-none d-md-block d-lg-block">
                        <div class="row justify-content-center">
                            <i class="mdi mdi-autorenew text-muted" style="font-size: 170px"></i>

                        </div>
                    </div>
                    {{-- form step1 here --}}
                        <div class="col-md-8 ">
                            <div class="row justify-content-between">
                               <h5 class="text-ifm mb-4">Allocate This Device <i class="mdi mdi-autorenew"></i></h5>
                               <h5 class="text-ifm mb-4">{{$items->ifmCode}} ( <span class="text-muted">{{$items->getCartegory->cartegory}}</span> ) </h5>
                            </div>
                            <form action={{"/newAllocation/".$items->id}} method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Current Owner</label>
                                        <select class="form-control" name="owner"  aria-describedby="helpId"  >
                                            <option value="">Choose device Owner...</option>
                                            @foreach ($userList as $list)
                                            <option value="{{$list->id}}">{{ucwords($list->firstname." ".$list->middlename." ".$list->surname)}}</option>
                                            @endforeach
                                        </select>
                                        <small id="helpId" class="form-text text-danger">
                                        @error('owner')
                                                {{$message}}
                                            @enderror
                                    </small>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="">New Location</label>
                                        <input type="text" class="form-control" name="location"  aria-describedby="helpId" placeholder="Enter new location">
                                        <small class="text-danger">
                                            @error('location')
                                                {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="">Date Allocated</label>
                                        <input type="date" class="form-control" name="date"  aria-describedby="helpId" >
                                        <small class="text-danger">
                                            @error('date')
                                                {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Allocation Description</label>
                                            <textarea class="form-control" name="description"  rows="3" placeholder="Describe the allocation here..."></textarea>
                                            <small class="text-danger">
                                                @error('description')
                                                    {{$message}}
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-autorenew"></i> Allocate Device</button>
                                </div>
                            </form>
                        </div>
                    {{-- end step 1 --}}
                    
                </div>
            </div>
        </div>
    </div>
    {{-- end of all devices here --}}
@endsection