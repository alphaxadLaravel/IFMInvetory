@extends('layouts.app')

@section('pages')
 <div class="container mt-5">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
           
            <div class="d-flex justify-content-between mb-5">
                <h5 class="text-ifm"><i class="mdi mdi-memory"></i> Available Devices </h5>
                {{-- <a href="/devices/export"><i class=" dripicons-cloud-download "></i> Export Excel Doc</a> --}}
            </div>
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>IFM Code</th>
                        <th class="d-none d-md-table-cell">Current Owner</th>
                        <th class="d-none d-md-table-cell">Cartegory</th>
                        <th  class="d-none d-md-table-cell">Model</th>
                        <th  class="d-none d-md-table-cell">SerialNo</th>
                        <th>View</th>
                    </tr>
                </thead>

              @foreach ($cartegories as $cartegory)
               <tr>
                   <td>{{$cartegory->ifmCode}}</td>
                   <td>{{$cartegory->getOwner->firstname}} {{$cartegory->getOwner->middlename}} {{$cartegory->getOwner->surname}}</td>
                   <td>{{$cartegory->getCartegory->cartegory}}</td>
                   <td>{{$cartegory->model}}</td>
                   <td>{{$cartegory->serialNo}}</td>
                   <td><a href="{{url("single/$cartegory->id")}}"><i class="mdi mdi-eye"></i></a></td>
               </tr>
                  
              @endforeach
               
            </table>
 </div>
       

@endsection