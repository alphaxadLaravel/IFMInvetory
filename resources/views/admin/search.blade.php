@extends('layouts.app')

@section('pages')
   {{-- navigation bread crumb here --}}
    <nav class="breadcrumb px-4 justify-content-between">
        <h5 class="text-ifm">All Devices</h5>
        <div class="d-none d-md-block d-sm-none">
            <a class="breadcrumb-item" href="/">Admin /</a>
            <span class="breadcrumb-item active ">Devices</span>
        </div>
        <div class="d-block d-md-none d-lg-none">
            <span class="badge text-ifm mr-3" style="cursor: pointer" data-toggle="modal" data-target="#modelId"><i class="dripicons-search " style="font-size: 25px" ></i></span>
            <a href="#" class="text-ifm"><i class="mdi mdi-account-circle-outline" style="font-size: 25px" ></i></a>
        </div>
    </nav>
    {{-- end bread crumb --}}

    {{-- all devices here --}}
    <div class="container mt-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between b-3">
                    <h5 class="text-ifm"><i class="dripicons-search " ></i> Search Results </h5>
                    <span>Total found <span class="badge badge-primary">{{$count}}</span></span>

                 </div>
                 @if(count($devices)==0)
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Device Not Found!!!</strong>

                    </div>
                  @else 
                  <table class="table table-hover">
                    <thead class="table-success">
                        <tr>
                            <th>IFM Code</th>
                            <th>Cartegory</th>
                            <th>Model</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($devices as $device)
                        <tr>
                            <td>{{$device->ifmCode}}</td>
                            <td>{{$device->getCartegory->cartegory}}</td>
                            <td>{{$device->model}}</td>
                            <td><a href="{{url("/single/$device->id")}}"><i class="mdi mdi-eye"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                 @endif
                 
              
            </div>
        </div>
        </div>
    </div>
    {{-- end of all devices here --}}
@endsection