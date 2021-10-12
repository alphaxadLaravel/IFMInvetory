<div>

    {{-- navigation bread crumb here --}}
    <nav class="breadcrumb px-4 justify-content-between">
        <h5 class="text-ifm">All Devices</h5>
        <div class="d-none d-md-block d-sm-none">
            @if (session()->get('user')['status'] == "admin")
            <a class="breadcrumb-item" href="/">Admin /</a>
            @else
            <a class="breadcrumb-item" href="/wellcome">Home /</a>
            @endif
            <span class="breadcrumb-item active ">devices</span>
        </div>
        <div class="d-block d-md-none d-lg-none">
            <span class="badge text-ifm mr-3" style="cursor: pointer" data-toggle="modal" data-target="#modelId"><i class="dripicons-search " style="font-size: 25px" ></i></span>
            <a href="#" class="text-ifm"><i class="mdi mdi-account-circle-outline" style="font-size: 25px" ></i></a>
        </div>
    </nav>
    {{-- end bread crumb --}}

    {{-- all devices here --}}
    <div class="container">
        @if (Session::has('data'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Devices have been Added Successfully!!!...</strong> 
        </div>
        @endif
        @if (Session::has('hddChange'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Device Hard Disk Changed Successfully!!!...</strong> 
        </div>
        @endif
        @if (Session::has('hdd'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Device Details Updated Successfully!!!...</strong> 
        </div>
        @endif
        @if (Session::has('deleted'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Device Deleted successfully!!...</strong> 
        </div>
        @endif
        <div class="card border-0 shadow-sm">
            <div class="card-body">
               
                <div class="d-flex justify-content-between">
                    <h5 class="text-ifm"><i class="mdi mdi-memory"></i> Available Devices </h5>

                         @if ($filter2 != "")
                             <button wire:click="exportDevices" class="btn text-primary" ><i class=" dripicons-cloud-download "></i> Export Excel Doc</button>
                        @endif

                        @if ($filter2 == "")
                             <a href="/devices/export" style="text-decoration: none"><i class=" dripicons-cloud-download "></i> Export Excel Doc</a>
                        @endif

                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div class="form-group">
                        <select class="form-control" wire:model="filter1" id="">
                        <option value="5">Display 5</option>
                        <option value="10">Display 10</option>
                        <option value="20">Display 20</option>
                        <option value="50">Display 50</option>
                        <option value="100">Display 100</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" wire:model="filter2" id="">
                        <option value="">All Devices</option>
                        @foreach ($cartegories as $cart)
                        <option value="{{$cart->id}}">{{$cart->cartegory}} </option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No:</th>
                            <th>Cartegory</th>
                            <th class="d-none d-md-table-cell">Model</th>
                            <th class="d-none d-md-table-cell">Serial Number</th>
                            <th  class="d-none d-md-table-cell">Ifm Code</th>
                            <th  class="d-none d-md-table-cell">Owner</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($devices as $dvc)
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>{{$dvc->getCartegory->cartegory}}</td>
                            <td  class="d-none d-md-table-cell">{{$dvc->model}}</td>
                            <td class="d-none d-md-table-cell">{{$dvc->serialNo}}</td>
                            <td  class="d-none d-md-table-cell">{{$dvc->ifmCode}}</td>
                            <td  class="d-none d-md-table-cell">{{ucwords($dvc->getOwner->firstname." ".$dvc->getOwner->middlename." ".$dvc->getOwner->surname)}}</td>
                            <td><a href={{"single/".$dvc->id}} ><i class="mdi mdi-eye"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-end mt-3">
                    {{ $devices->links() }}
                </div>
            </div>
        </div>
        </div>

        @if(session()->get('user')['status'] == "admin" || session()->get('user')['status'] == "manager")

        <div class="row justify-content-center mt-3 mb-4">
            <a href="/addItem" class="btn btn-outline-primary"><i class="mdi mdi-database-plus"></i> ADD NEW DEVICE</a>
        </div>
        @endif
    </div>
    {{-- end of all devices here --}}

</div>
