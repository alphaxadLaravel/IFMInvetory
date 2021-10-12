@extends('layouts.app')

@section('pages')
   {{-- navigation bread crumb here --}}
    <nav class="breadcrumb px-4 justify-content-between">
        <h4 class="text-ifm">Adminstartor</h4>
        <div class="d-none d-md-block d-sm-none">
            <a class="breadcrumb-item" href="/">Admin /</a>
            <span class="breadcrumb-item active ">Dashboard</span>
        </div>
        <div class="d-block d-md-none d-lg-none">
            <span class="badge text-ifm mr-3" style="cursor: pointer" data-toggle="modal" data-target="#modelId"><i class="dripicons-search " style="font-size: 25px" ></i></span>
            <a href="#" class="text-ifm"><i class="mdi mdi-account-circle-outline" style="font-size: 25px" ></i></a>
        </div>
    </nav>
    {{-- end bread crumb --}}

    {{-- dashboard content here --}}
    <div class="container">
        <div class="row">
            <div class="col-md-5">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <a href="/users"  style="text-decoration: none">
                        <div class="card text-left border-0 shadow-sm">
                            <div class="card-body">
                           <div class="row">
                               <div class="col-8">
                                <p class="card-text text-muted">Users</p>
                                <h4 class="card-title text-ifm">{{$users}}</h4>
                               </div>
                               <div class="col-4">
                                <i class="mdi mdi-account-multiple-outline text-ifm" style="font-size: 40px"></i>
                               </div>
                           </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="/devices"  style="text-decoration: none">
                        <div class="card text-left border-0 shadow-sm">
                            <div class="card-body">
                           <div class="row">
                               <div class="col-8">
                                <p class="card-text text-muted">Devices</p>
                                <h4 class="card-title text-ifm">{{$devices}}</h4>
                               </div>
                               <div class="col-4">
                                <i class="mdi mdi-database text-ifm" style="font-size: 40px"></i>
                               </div>
                           </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <a href="/cartegory"  style="text-decoration: none">
                    <div class="card text-left border-0 shadow-sm">
                        <div class="card-body">
                       <div class="row">
                           <div class="col-8">
                            <p class="card-text text-muted">Cartegories</p>
                            <h4 class="card-title text-ifm">{{$cartegory}}</h4>
                           </div>
                           <div class="col-4">
                            <i class="mdi mdi-format-list-bulleted text-ifm" style="font-size: 40px"></i>
                           </div>
                       </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="/allocations"  style="text-decoration: none">
                    <div class="card text-left border-0 shadow-sm">
                        <div class="card-body">
                       <div class="row">
                           <div class="col-8">
                            <p class="card-text text-muted">Re-Allocations</p>
                            <h4 class="card-title text-ifm">{{$allocation}}</h4>
                           </div>
                           <div class="col-4">
                            <i class="mdi mdi-history text-ifm" style="font-size: 40px"></i>
                           </div>
                       </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <a href="/devices"  style="text-decoration: none">
                    <div class="card text-left border-0 shadow-sm">
                        <div class="card-body">
                       <div class="row">
                           <div class="col-8">
                            <p class="card-text text-muted">With Memory</p>
                            <h4 class="card-title text-ifm">{{$memory}}</h4>
                           </div>
                           <div class="col-4">
                            <i class="mdi mdi-memory text-ifm" style="font-size: 40px"></i>
                           </div>
                       </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="/devices"  style="text-decoration: none">
                    <div class="card text-left border-0 shadow-sm">
                        <div class="card-body">
                       <div class="row">
                           <div class="col-8">
                            <p class="card-text text-muted">Non Memory</p>
                            <h4 class="card-title text-ifm">{{$nonMemo}}</h4>
                           </div>
                           <div class="col-4">
                            <i class="mdi mdi-select-off text-ifm" style="font-size: 40px"></i>
                           </div>
                       </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>

            <div class="col-md-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="text-ifm"><i class="mdi mdi-memory"></i> Available Devices</h5>
                              <a href="" style="text-decoration: none"> Total Devices <span class="badge badge-primary"> {{$devices}} </span></a>
                         </div>
                         <table class="table table-hover">
                             <thead class="table-light">
                                 <tr>
                                     <th>IFM Code</th>
                                     <th>Cartegory</th>
                                     <th  class="d-none d-md-table-cell">Model</th>
                                 </tr>
                             </thead>
                             <tbody>
                                
                                @foreach ($sample as $smp)
                                <tr>
                                    <td>{{$smp->ifmCode}}</td>
                                    <td >{{ucfirst($smp->getCartegory->cartegory)}}</td>
                                    <td class="d-none d-md-table-cell">{{ucfirst($smp->model)}}</td>
                                </tr>
                                @endforeach
                             </tbody>
                           </table>
                    </div>
                </div>
                
                  <div class="d-flex justify-content-end mt-4 mb-3">
                      <a href="/devices" class="btn btn-outline-primary">View All Devices</a>
                  </div>
                </div>
        </div>
    </div>
    {{-- end of dashboard content here --}}
@endsection