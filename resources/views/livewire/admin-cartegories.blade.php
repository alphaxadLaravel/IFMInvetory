<div>

      {{-- navigation bread crumb here --}}
      <nav class="breadcrumb px-4 justify-content-between">
        <h4 class="text-ifm">Add Cartegory</h4>
        <div class="d-none d-md-block d-sm-none">
            @if(session()->get('user')['status']=='admin')
            <a class="breadcrumb-item" href="/">Admin /</a>
            @else 
            <a class="breadcrumb-item" href="/">Admin /</a>
            @endif
             
            <span class="breadcrumb-item active ">Add Cartegory</span>
        </div>
        <div class="d-block d-md-none d-lg-none">
            <span class="badge text-ifm mr-3" style="cursor: pointer" data-toggle="modal" data-target="#modelId"><i class="dripicons-search " style="font-size: 25px" ></i></span>
            <a href="#" class="text-ifm"><i class="mdi mdi-account-circle-outline" style="font-size: 25px" ></i></a>
        </div>
    </nav>
    {{-- end bread crumb --}}

    {{-- dashboard content here --}}
    <div class="container">
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>New Cartegory Added successfully!!!..</strong>
        </div>
        @endif

        @if (Session::has('deleted'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Cartegory Deleted successfully!!!</strong>
        </div>
        @endif
        @if (Session::has('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>The Cartegory has Device(s), Hence Can't be deleted!!!</strong>
        </div>
        @endif
        <div class="row">
            @foreach ($carts as $cart)
                <div class="col-md-3 mb-3">
                    <a href="#"  style="text-decoration: none">
                    <div class="card text-left border-0 shadow-lg">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-between">
                            <div class="">
                                <p class="card-text text-muted"><a href="{{url("specific/$cart->id")}}">{{$cart->cartegory}}</a></p>
                            <h4 class="card-title text-ifm">{{$cart->devices}}</h4>
                            </div>
                            <div class="d-flex justify-content-end">
                            <a href="javascript: void(0);" wire:click="deleteCartegory({{$cart->id}})" class="float-right"><i class="mdi mdi-delete text-muted" style="font-size: 20px; "></i></a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center mt-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cartegory"> <i class="mdi mdi-format-list-bulleted" ></i> Add Cartegory</button>
        </div>
    </div>
    {{-- end of dashboard content here --}}

    {{-- cartegory add modal here --}}

     <div class="modal fade" id="cartegory" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="mdi mdi-format-list-bulleted" ></i> Add New Cartegory</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body p-3">
                    <form action="/addCartegory" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="">Cartegory Name</label>
                          <input type="text" class="form-control" name="cartegory" placeholder="Enter Cartegory Name here...">
                            <small class="text-danger">
                                @error('cartegory')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>
                        <div class="row justify-content-end p-3">
                            <button class="btn btn-outline-primary" type="submit"><i class="mdi mdi-database-plus"></i> Add cartegory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    {{-- end of cartegory add modal here --}}
                             
</div>
