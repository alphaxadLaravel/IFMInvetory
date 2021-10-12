@extends('layouts.out')

@section('outside')
<div class="row">
  <div class="col-md-6 mt-5 offset-md-3">
      <div class="card mb-3 ">
          <div class="row g-0">
            <div class="col-md-6 d-none d-md-block d-lg-block">
              <img src="images/chuo.jpg" class="img-fluid rounded-start h-100" alt="...">
            </div>

             {{-- the login form here --}}
                <div class="col-md-6 ">
                  <div class="card-body">

                      <div class="row justify-content-center mb-2">
                          <img src="images/logo.png" width="100px" alt="">
                      </div>

                      <div class="row justify-content-center mb-3">
                          <h3 class="text-muted fw-bolder fs-1">IFM Invetory Login</h3>
                      </div>

                      @if (Session::has('none'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              <span class="sr-only">Close</span>
                          </button>
                          Check Username / Password!
                      </div>
                      @endif

                      <form action="/login" method="POST">
                          @csrf

                          <div class="form-group">
                              <label for="">PF-Number </label>
                              <input type="text" class="form-control" name="username" id="" aria-describedby="helpId" placeholder="Enter PF-Number">
                              <small class="text-danger">
                                  @error('username')
                                      {{$message}}
                                  @enderror
                              </small>
                        </div>
                          <div class="form-group">
                              <label class="d-flex justify-content-between" for="">Password </label>
                              {{-- <small class="float-end text-ifm" style="cursor: pointer" ><a href="/fogot">Forgot Password ?</a></small> --}}
                              <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Enter Password">
                              <small class="text-danger">
                                  @error('password')
                                      {{$message}}
                                  @enderror
                              </small>
                        </div>
                          <div class="row justify-content-center mb-3 mt-2">
                              <button class="btn btn-outline-primary w-75" type="submit"><i class="mdi mdi-login"></i> Login</button>
                          </div>

                      </form>
                  </div>
              </div>
            {{-- end of the login form here --}}

          </div>
        </div>
  </div>
</div>
@endsection