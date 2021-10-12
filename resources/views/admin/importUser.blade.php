
    @extends('layouts.app')
    @section('pages')
    <div class="">
        {{-- navigation bread crumb here --}}
    <nav class="breadcrumb px-4 justify-content-between">
      <h5 class="text-ifm">Add User</h5>
      <div class="d-none d-md-block d-sm-none">
          <a class="breadcrumb-item" href="/">Admin /</a>
          <span class="breadcrumb-item active ">Add New</span>
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
                    <div class="col-md-4">
                        <img src="../images/errors.gif" width="100%" alt="">
                    </div>
                    {{-- form step2 here --}}
                        <div class="col-md-8">
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="text-ifm mb-3">IMPORT USERS LIST FROM EXCEL <i class="dripicons-cloud-download"></i></h5>
                                    <a href="/newUser" class="btn text-ifm d-none d-md-block d-lg-block"><i class=" mdi mdi-account-plus-outline "></i> Add Single User</a>
                                </div>
                                @if (isset($errors) && $errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        @foreach ($errors->all() as $error)
                                           <strong>{{$error}}</strong>
                                        @endforeach
                                    </div>
                                @endif
                                <form action="/import" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" >Select The Excel File</label>
                                        <input type="file" name="file" class="form-control">
                                        @error('file')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-center mb-0 text-center mt-4">
                                        <button class="btn btn-primary" type="submit"> <i class="dripicons-cloud-download"></i> Submit Excel</button>
                                    </div>
                            </form>
                            <h6 class="text-danger mt-4 px-3">NB: Please Follow The Format Below:</h6>
                            <div class="row mt-2 d-flex justify-content-center">
                                <img src="/images/excel.png" alt="">
                            </div>
                        </div>
                    {{-- end of form step2 here --}}
              </div>
          </div>
      </div>
    </div>
    {{-- end of all devices here --}}
    </div>    
    @endsection