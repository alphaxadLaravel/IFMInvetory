<div>
 {{-- navigation bread crumb here --}}
 <nav class="breadcrumb px-4 justify-content-between">
    <h5 class="text-ifm">Users</h5>
    <div class="d-none d-md-block d-sm-none">
        <a class="breadcrumb-item" href="/">Admin /</a>
        <span class="breadcrumb-item active ">Users</span>
    </div>
    <div class="d-block d-md-none d-lg-none">
        <span class="badge text-ifm mr-3" style="cursor: pointer" data-toggle="modal" data-target="#modelId"><i class="dripicons-search " style="font-size: 25px" ></i></span>
        <a href="#" class="text-ifm"><i class="mdi mdi-account-circle-outline" style="font-size: 25px" ></i></a>
    </div>
</nav>
{{-- end bread crumb --}}

{{-- users list here --}}
<div class="container mt-4">
    @if (Session::has('deleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>User Deleted  Successfully!!!...</strong> 
    </div>
    @endif
    @if (Session::has('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>The User has Device(s), Hence can't be Deleted!!!...</strong> 
    </div>
    @endif
    <div class="card border-0 shadow-sm">
        @if (Session::has('role'))
        <div class="alert alert-success alert-dismissible fade show " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>User Role changed Successfully!!!...</strong> 
        </div>
        @endif

        @if (Session::has('addedUser'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>New User Added successfully!!!...</strong> 
        </div>
        @endif
        @if (Session::has('imported'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong> {{session()->get('total')}} Users Imported successfully!!!...</strong> 
        </div>
        @endif
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="text-ifm"><i class="mdi mdi-account-multiple"></i> Available Users</h5>
                <a href="" style="text-decoration: none"> Total Users <span class="badge badge-primary">{{$totalUser}}</span></a>
             </div>
             <div class="d-flex justify-content-between mt-3">
                <div class="form-group">
                    <select class="form-control" wire:model="filter1" id="">
                    <option value="5">Display 5</option>
                    <option value="10">Display 10</option>
                    <option value="20">Display 20</option>
                    <option value="50">Display 50</option>
                    <option value="100">Display 100</option>
                    <option value="100">Display 200</option>
                    <option value="100">Display 500</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" wire:model="filter2" id="">
                    <option value="">All Roles</option>
                    <option value="user">User</option>
                    <option value="manager">Manager</option>
                    <option value="admin">Admin</option>
                    <option value="viewer">Viewer</option>
                    
                    </select>
                </div>
            </div>
             <table class="table table-hover text-center">
                <thead class="table-light">
                    <tr>
                        <th>No:</th>
                        <th>PF-Number</th>
                        <th class="d-none d-md-table-cell">Firstname</th>
                        <th class="d-none d-md-table-cell">Middlename</th>
                        <th class="d-none d-md-table-cell">Surname</th>
                        <th class="d-none d-md-table-cell">Department</th>
                        <th>Role</th>
                        <th class="d-none d-md-table-cell">Change Role</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>{{$user->pfNumber}}</td>
                            <td class="d-none d-md-table-cell">{{ucfirst($user->firstname)}}</td>
                            <td class="d-none d-md-table-cell">{{ucfirst($user->middlename)}}</td>
                            <td class="d-none d-md-table-cell">{{ucfirst($user->surname)}}</td>
                            <td class="d-none d-md-table-cell row">{{ucwords($user->department)}}</td>
                             <td>{{ucfirst($user->status)}}</td>
                            @if ($user->available != "superAdmin")
                              <td class="d-none d-md-table-cell"><a href={{"/users/change_role/".$user->id}} class="btn btn-sm btn-outline-primary">Change Role</a></td>
                            @else
                               <td class="d-none d-md-table-cell text-muted"> Super Admin</td>
                            @endif
                          
                            <td>
                                <a href="{{url("department/$user->id")}}" class="btn btn-sm btn-outline-primary"><i class="mdi mdi-account-edit "></i></a>
                                @if($user->status != "admin")
                                <button class="btn btn-sm btn-outline-danger" wire:click="deleteUser({{$user->id}})"><i class="mdi mdi-delete text-danger"></button></i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="d-flex justify-content-end mt-3">
                {{ $users->links() }}
            </div>

            
        </div>
       
    </div>
    @if(session()->get('user')['status'] == "admin")

    <div class="row justify-content-center mt-3 mb-4">
        <a href="/newUser" class="btn btn-outline-primary"><i class="mdi mdi-account-plus-outline"></i> ADD NEW USER</a>
    </div>
    @endif
    </div>

</div>
{{-- end of users list here --}}
</div>
