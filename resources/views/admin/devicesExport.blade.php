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
                <img src="images/errors.gif" width="100%" alt="">
            </div>
              {{-- form step2 here --}}
                  <div class="col-md-8">
                           <div class="d-flex justify-content-between mb-4">
                            <h5 class="text-ifm mb-3">EXPORT DEVICES TO EXCEL FORMAT <i class="dripicons-cloud-download"></i></h5>
                            <a href="/devices/export" class="text-ifm"><i class=" mdi mdi-hand-pointing-left
                                "></i> Back To Devices</a>
                           </div>
                           <form action="/devices/export" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                 <div class="form-group">
                                   <label for="">Select devices To Export</label>
                                   <select class="form-control" name="" id="">
                                     <option value="">Choose devices To Export</option>
                                     
                                     <option value="">CPU</option>
                                     <option value="">CPU</option>
                                     <option value="">CPU</option>
                                     <option value="">CPU</option>
                                     <option value="">CPU</option>
                                     <option value="">CPU</option>
                                     <option value="alls">Export All devices</option>
                                   </select>
                                 </div>
                            </div>
                            <div class="d-flex justify-content-center mb-0 text-center mt-4">
                                <button class="btn btn-primary" type="submit"  > <i class="dripicons-cloud-download"></i> Export Excel</button>
                            </div>
                      </form>
                  </div>
              {{-- end of form step2 here --}}

          </div>
      </div>
  </div>
</div>
{{-- end of all devices here --}}
</div>

@endsection
