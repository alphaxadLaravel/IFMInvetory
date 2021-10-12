@extends('layouts.out')

@section('outside')
<div class="row">
  <div class="col-md-6 mt-5 offset-md-3">
      <div class="card mb-3 ">
          <div class="row g-0">
            <div class="col-md-6 d-none d-md-block d-lg-block">
              <img src="images/chuo.jpg" class="img-fluid rounded-start h-100" alt="...">
            </div>

                {{-- signup form here --}}
                    <div class="col-md-6  ">
                        <div class="card-body">
                            <div class="row justify-content-center mb-2">
                                <img src="images/logo.png" width="100px" alt="">
                            </div>
                            <div class="row justify-content-center mb-2">
                                <h3 class="text-muted fw-bolder fs-1">IFM Invetory Signup</h3>
                            </div>
                            <form action="/signup" method="POST">
                                @csrf
                                <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" name="username"  id="" aria-describedby="helpId" placeholder="Enter Username..">
                                    <small class="text-danger">
                                        @error('username')
                                            {{$message}}
                                        @enderror
                                    </small>
                            </div>
                                <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Enter email">
                                <small class="text-danger">
                                    @error('email')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                                <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Enter Password.">
                                <small class="text-danger">
                                    @error('password')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                                <div class="row justify-content-center mb-3 mt-2">
                                    <button class="btn btn-outline-primary w-75" type="submit"><i class="mdi mdi-login"></i> Signup</button>
                                </div>
                                <div class="row justify-content-center mt-4 ">
                                <p class="text-muted">Have an Account ? <span class="text-primary" style="cursor: pointer" ><a href="/log">Login Here!</a></span></p>
                            </div>

                            </form>
                        </div>
                    </div>
                {{-- end of signup here --}}

          </div>
        </div>
  </div>
</div>
@endsection