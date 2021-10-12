@extends('layouts.app')
@section('pages')
<div>
    {{-- navigation bread crumb here --}}
       <nav class="breadcrumb px-4 justify-content-between">
           <h5 class="text-ifm">HDD CHANGES</h5>
           <div class="d-none d-md-block d-sm-none">
               @if(session()->get('user')['status']=="admin")
               <a class="breadcrumb-item" href="/">Admin /</a>
               <span class="breadcrumb-item active ">History</span>
               @else
               <a class="breadcrumb-item" href="/wellcome">Home /</a>
               <span class="breadcrumb-item active ">History</span> 
               @endif

           </div>
           <div class="d-block d-md-none d-lg-none">
               <span class="badge text-ifm mr-3" style="cursor: pointer" data-toggle="modal" data-target="#modelId"><i class="dripicons-search " style="font-size: 25px" ></i></span>
               <a href="#" class="text-ifm"><i class="mdi mdi-account-circle-outline" style="font-size: 25px" ></i></a>
           </div>
       </nav>
   {{-- end bread crumb --}}

   {{-- users list here --}}
           <div class="container">
               @if (Session::has('deleted'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                   </button>
                   <strong>Allocation History Deleted Successfully!!!...</strong> 
               </div>
               @endif
               <div class="card border-0 shadow-sm">
                   <div class="card-body">
                       <div class="d-flex justify-content-between mb-3">
                           <h5 class="text-ifm"><i class="mdi mdi-history"></i> HDD Changes History</h5>
                           <a href="" style="text-decoration: none"> Total Changes <span class="badge badge-primary"></span></a>
                       </div>
                       <table class="table table-hover">
                           <thead class="table-secondary">
                               <tr>
                                   <th>Device Code</th>
                                   <th>Device Cartegory</th>
                                   <th>Previous HDD Type</th>
                                   <th>New Hdd Type</th>
                                   <th class="d-none d-md-table-cell">Previous HDD storage</th>
                                   <th class="d-none d-md-table-cell">New HDD storage</th>
                                   <th class="d-none d-md-table-cell">View</th>
                               </tr>
                           </thead>
                           <tbody>
                              @foreach ($hddChanges as $changes)
                              <tr>
                                <td>{{$changes->ifmCode}}</td>
                                <td>{{$changes->getCartegory->cartegory}}</td>
                                <td>{{$changes->hddChange->initialHDD}}</td>
                                {{-- <td>{{$changes->getHDD->newHDD}}</td>
                                <td>{{$changes->getHDD->initialCapacity}}</td>
                                <td>{{$changes->getHDD->newCapacity}}</td>   --}}
                                <td><i class="mdi mdi-eye text-ifm"></i></a></td>
                             </tr>
                              @endforeach
                               
                            
                           </tbody>
                       </table>
                       <div class="d-flex justify-content-end mt-3">
                           

                           {{-- <nav>
                               <ul class="pagination pagination-rounded mb-0">
                                   <li class="page-item">
                                       <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                           <span aria-hidden="true">&laquo;</span>
                                       </a>
                                   </li>
                                   <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a></li>
                                   <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                   <li class="page-item active"><a class="page-link" href="javascript: void(0);">3</a></li>
                                   <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                                   <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                                   <li class="page-item">
                                       <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                           <span aria-hidden="true">&raquo;</span>
                                       </a>
                                   </li>
                               </ul>
                           </nav> --}}
                       </div>
                   </div>
               </div>
               </div>

           </div>
   {{-- end of users list here --}}
</div>
@endsection