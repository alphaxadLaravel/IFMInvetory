@extends('layouts.app')

@section('pages')
<div>
    <div class="">
        {{-- navigation bread crumb here --}}
        <nav class="breadcrumb px-4 justify-content-between">
            <h5 class="text-ifm">Change HDD</h5>
            <div class="d-none d-md-block d-sm-none">
                    @if(session()->get('user')['status'] == "admin")
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
                      <i class="mdi mdi-database-edit text-muted" style="font-size: 160px"></i>
                  </div>

                  <div class="col-md-8">
                      <div class="d-flex justify-content-between mb-3">
                    <h5 class="text-ifm mb-3">UPDATE THIS DEVICE <i class="mdi mdi-square-edit-outline"></i></h5>
                    <h5 class="text-ifm mb-3 text-muted">{{strToUpper($update->ifmCode)}} ( {{$update->getCartegory->cartegory}} ) </h5>
                      </div>
                    <form action={{"/devices/single/update/".$update->id}} method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-4">
                                    <label for="" class="d-flex justify-content-between">Device Cartegory <a href="/cartegory"><i class="mdi mdi-database-plus text-success" style="font-size: 16px"></i></a></label>
                                    <select class="form-control"  name="cartegory"   aria-describedby="helpId" >
                                        <option value="{{$update->getCartegory->id}}">{{$update->getCartegory->cartegory}}</option>
                                        @foreach ($cartegories as $cart)
                                        <option value="{{$cart->id}}">{{ucfirst($cart->cartegory)}}</option>
                                        @endforeach
                                    </select>
                                    <small id="helpId" class="form-text text-danger">
                                        @error('cartegory')
                                            {{$message}}
                                        @enderror
                                </small>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Model Type</label>
                                    <input type="text" class="form-control" name="model" value="{{$update->model}}"  aria-describedby="helpId" placeholder="Model type e.g Hp, Dell..">
                                    <small id="helpId" class="form-text text-danger">
                                        @error('model')
                                            {{$message}}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">IFM Code</label>
                                    <input type="text" class="form-control" name="ifmCode" value="{{$update->ifmCode}}"  aria-describedby="helpId" placeholder="Enter IFM code...">
                                    <small id="helpId" class="form-text text-danger">
                                        @error('ifmCode')
                                            {{$message}}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="">Date Bought</label>
                                <input type="date" class="form-control" name="date" value="{{$update->dateBought}}"  aria-describedby="helpId" placeholder="Enter IFM code...">
                                <small id="helpId" class="form-text text-danger">
                                @error('date')
                                        {{$message}}
                                    @enderror
                            </small>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Current Owner</label>
                                <select class="form-control" name="owner"  aria-describedby="helpId"  >
                                    <option value="{{$update->getOwner->id}}">{{ucwords($update->getOwner->firstname." ".$update->getOwner->middlename." ".$update->getOwner->surname)}}</option>
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
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Serial Number</label>
                                    <input type="text" class="form-control" name="serial" value="{{$update->serialNo}}"  aria-describedby="helpId" placeholder="Enter serial No..">
                                        <small id="helpId" class="form-text text-danger">
                                                @error('serial')
                                                    {{$message}}
                                                @enderror
                                        </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="">Device Location</label>
                                <input type="text" class="form-control" name="location" value="{{$update->location}}"   aria-describedby="helpId" placeholder="Enter device Location">
                                <small id="helpId" class="form-text text-danger">
                                    @error('location')
                                        {{$message}}
                                    @enderror
                            </small>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end mb-0 text-center mt-3">
                            <button class="btn btn-primary mx-2" type="submit"><i class="mdi mdi-square-edit-outline"></i> Update Now</button>
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