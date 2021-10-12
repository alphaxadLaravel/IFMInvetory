@extends('layouts.out')

@section('outside')
<div class="row">
  <div class="col-md-6 mt-5 offset-md-3">
      <div class="card mb-3 ">
          <div class="row g-0">
            <div class="col-md-6 d-none d-md-block d-lg-block">
              <img src="images/chuo.jpg" class="img-fluid rounded-start h-100" alt="...">
            </div>

             {{-- forgot password here --}}
             <div class="col-md-6 ">
                <div class="card-body">
                
                    <div class="row justify-content-center mb-2">
                        <img src="images/logo.png" width="100px" alt="">
                    </div>

                    <div class="row justify-content-center mb-3 mt-3">
                        <h3 class="text-muted fw-bolder fs-1">Password Recovery</h3>
                    </div>

                    <form action=" ">
                        <div class="form-group">
                        <label for="">PF-Number</label>
                        <input type="text" class="form-control" name="pf-no" id=""  placeholder="Enter Your PF-Number To Recover..">
                        </div>
                        <div class="row justify-content-center mb-3 mt-2">
                            <button class="btn btn-outline-primary w-75" type="submit"><i class="mdi mdi-login"></i> Recover Password</button>
                        </div>
                        <div class="row justify-content-center mt-4 ">
                        <p class="text-muted"><i class="mdi mdi-hand-pointing-left"   ></i> Back To <span class="text-primary" style="cursor: pointer"><a href="/log">Login Here!</a></span></p>
                    </div>
                    </form>
                </div>
            </div>
        {{-- forgot password end --}}

          </div>
        </div>
  </div>
</div>
@endsection