@extends('layouts.app')

@section('pages')
   {{-- navigation bread crumb here --}}
    <nav class="breadcrumb px-4 justify-content-between">
        <h5 class="text-ifm">Change Role</h5>
        <div class="d-none d-md-block d-sm-none">
            <a class="breadcrumb-item" href="/">Admin /</a>
            <a class="breadcrumb-item" href="{{url('users')}}">Users /</a>
            <span class="breadcrumb-item">Change Role</span>
            
        </div>
        <div class="d-block d-md-none d-lg-none">
            <span class="badge text-ifm mr-3" style="cursor: pointer" data-toggle="modal" data-target="#modelId"><i class="dripicons-search " style="font-size: 25px" ></i></span>
            <a href="#" class="text-ifm"><i class="mdi mdi-account-circle-outline" style="font-size: 25px" ></i></a>
        </div>
    </nav>
    {{-- end bread crumb --}}

    {{-- profile page contents here --}}
    <div class="container mt-4 mb-5">
        <div class="row">
            {{-- descriptions --}}
            <div class="col-md-5 mb-4">
                <div class="card border-0 shadow-sm ">
                    <div class="card-body">
                        <h5 class="text-ifm"><i class="mdi mdi-shield-outline"></i> Role Descriptions</h5>
                        <table class="table table-hover">
                            <thead class="table-light">
                               <tr>
                                   <th>Role</th>
                                   <th>Responsbility</th>
                               </tr>
                            </thead>
                            <tr>
                                <td>Admin</td>
                                <td><i class="mdi mdi-hand-pointing-right"></i> Can view Devices, Add Devices , Add Users and Allocate Devices</td>
                            </tr>
                            <tr>
                                <td>Manager</td>
                                <td><i class="mdi mdi-hand-pointing-right"></i> Can view Devices, Add Devices and Allocate Devices</td>
                            </tr>
                            <tr>
                                <td>Viewer</td>
                                <td><i class="mdi mdi-hand-pointing-right"></i> Can View Devices Only In the System</td>
                            </tr>
                            <tr>
                                <td>User</td>
                                <td><i class="mdi mdi-hand-pointing-right"></i> Can not Access System</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            {{-- end of descriptions --}}

            {{-- change the user roles --}}
            <div class="col-md-7">
                <div class="card border-0 px-3 shadow-sm ">
                    <div class="card-body">
                        <h5 class="text-ifm mb-4"><i class="mdi mdi-account-edit"></i> Change User Role</h5>
                            <hr class="my-3">
                        <div class="row d-flex justify-content-between mt-4">
                            <h3 class="mt-0 text-ifm mb-3">
                                <i class="mdi mdi-account-check-outline "></i> {{$userRole->pfNumber}}
                             </h3>
                             <p class="text-sm text-muted pr-3"> Departement: <span class="text-ifm">{{$userRole->department}}</span></p>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <h6 class="text-muted">Firstname</h6>
                                <p class="text-sm text-ifm"><i class="mdi mdi-hand-pointing-right"></i> {{$userRole->firstname}}</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="text-muted">Middlename</h6>
                                <p class="text-sm text-ifm"><i class="mdi mdi-hand-pointing-right"></i> {{$userRole->middlename}}</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="text-muted">Surname</h6>
                                <p class="text-sm text-ifm"><i class="mdi mdi-hand-pointing-right"></i> {{$userRole->surname}}</p>
                            </div>
                        </div>
                            <spna class="mt-5">Current Role: <span class="text-ifm">{{ucfirst($userRole->status)}}</span></spna>
                            <form action="/users/role/{{$userRole->id}}" method="post">
                                @csrf
                                <div class="row pl-3">
                                    <div class="col-md-6 mt-3">
                                        <select class="form-control" name="role" id="">
                                            @if ($userRole->status == 'user')
                                                <option value="">Change User Role...</option>
                                                <option value="admin">Admin</option>
                                                <option value="manager">manager</option>
                                                <option value="viewer">Viewer</option>
                                            @elseif($userRole->status == 'admin')
                                                <option value="">Change User Role...</option>
                                                <option value="user">User</option>
                                                <option value="viewer">Viewer</option>
                                                <option value="manager">manager</option>
                                            @elseif($userRole->status == 'viewer')
                                                <option value="">Change User Role...</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                                <option value="manager">manager</option>
                                            @elseif($userRole->status == 'manager')
                                                <option value="">Change User Role...</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                                <option value="viewer">Viewer</option>
                                            @endif
                                        </select>
                                        <small class="text-danger">
                                            @error('role')
                                                {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <button type="submit" class="btn btn-outline-primary"> Change Role</button>
                                    </div>
                                </div>
                            </form>
                       
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    {{-- end of profile page content here --}}

@endsection