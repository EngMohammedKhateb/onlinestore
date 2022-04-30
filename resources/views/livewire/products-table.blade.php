<div>

    <div class="container-fluid">


        <!--delete Modal -->
        <div class="modal fade" wire:ignore.self id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group m-0">
                        <p class="m-0 p-3 text-danger">Are You Sure ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="selectedId(0)">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="delete()">delete </button>
                    </div>
                </div>
            </div>
        </div>



        <div class="row mt-2">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="row p-3 text-danger">
                            <h3 class="theme-text-color"> <i class='bx bxs-category-alt' ></i> Products in market {{$category->market->name}} in category {{$category->name}} </h3>
                        </div>

                        <div class="filter-wrapper  d-flex justify-content-between flex-lg-nowrap flex-sm-wrap mb-3">
                            <input wire:model.debounce.300ms="search" type="text" class="form-control mr-lg-2" placeholder="Search Products...">

                            <select wire:model="orderBy" class="form-control ml-lg-2 mr-lg-2 mt-lg-0 mt-sm-2" id="grid-state">
                                <option value="id">ID</option>
                                <option value="name">Name</option>
                                <option value="is_active">Active</option>
                                <option value="priority">Priority</option>
                            </select>

                            <select wire:model="orderAsc" class="form-control ml-lg-2 mr-lg-2  mt-lg-0 mt-sm-2" id="grid-state">
                                <option value="1">Ascending</option>
                                <option value="0">Descending</option>
                            </select>


                            <select wire:model="perPage" class="form-control ml-lg-2  mt-lg-0 mt-sm-2" id="grid-state">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                            </select>

                        </div>







                        </div>
                    </div>

                </div>

            <div class="col-lg-12 col-md--12 col-sm-12 mt-2">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-12 mb-2">

                            <div class="card" style="width: 18rem;">
                                <img src="{{asset($product->image)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <p class="card-text">
                                        {{substr($product->description, 0, 55).'...'  }}
                                    </p>
                                    <p class="d-flex justify-content-between">
                                    <span>priority : {{ $product->priority }}</span>
                                    <span class="d-flex">
                                    <span class="decrease-box" wire:click="decreasePriority({{ $product->id}})">
                                        <i class='bx bx-chevron-left' ></i>
                                    </span>
                                    &nbsp
                                    <span class="box-count">{{ $product->priority }}</span>
                                    &nbsp
                                    <span class="increase-box" wire:click="increasePriority({{ $product->id}})">
                                        <i class='bx bx-chevron-right' ></i>
                                    </span></span>
                                    </p>
                                    <p class="mb-0 d-flex justify-content-between"> @if($product->is_active == "1") <span class="text-success p-0 m-0 font-weight-bold"> active </span> @else <span class="text-danger  p-0 m-0 font-weight-bold"> hidden </span>@endif <small> {{ $product->created_at->diffForHumans() }} </small> </p>

                                    <p class="mb-0 d-flex justify-content-between">
                                    <span>Price : @if($product->discount!=0) <del>  @endif {{$product->price}} @if($product->discount!=0) </del>@endif </span>
                                    <span> discount {{ $product->discount }}% </span>
                                    </p>
                                    <p class="mb-0 d-flex justify-content-between"><small>the price after discount is  </small>  @if($product->discount==0) <b> {{$product->price}} </b> @else<b> {{ $product->price - ($product->price * $product->discount/100) }} </b>@endif </p>

                                    <div class="btn-group btn-over">
                                        <button class="btn-rounded-shadow" type="button" data-toggle="dropdown" aria-expanded="false">
                                            <i class='bx bx-dots-vertical-rounded theme-text-color' ></i>
                                        </button>

                                        <div class="dropdown-menu">
                                             @if(auth()->user()->hasPermission('update category'))

                                                <a href="{{route('admin.products.show',['id'=>$product->id])}}" class="dropdown-item text-drop-down"  > <i class='bx bx-show'></i> &nbsp; show  </a>
                                                <a href="{{route('admin.products.edit',['id'=>$product->id])}}" class="dropdown-item text-drop-down"  > <i class='bx bxs-edit-alt' ></i> &nbsp; edit  </a>
                                                @if($product->is_active == "0" )
                                                    <button type="button" class="dropdown-item text-drop-down" wire:click="active({{$product->id}})"><i class='bx bx-check-double' ></i> &nbsp;  active</button>
                                                @else
                                                    <button type="button" class="dropdown-item text-drop-down" wire:click="hide({{$product->id}})"> <i class='bx bx-block' ></i>&nbsp;&nbsp; hide</button>
                                                @endif
                                                <button type="button" class="dropdown-item text-drop-down" data-toggle="modal" data-target="#deleteModal" wire:click="selectedId({{$product->id}})"> <i class='bx bxs-trash' ></i> &nbsp;&nbsp; delete</button>
                                            @endif
                                        </div>
                                    </div>

                                  </div>
                            </div>

                        </div>
                    @endforeach

                </div>




            </div>
            <div class="col-lg-12 col-md--12 col-sm-12 mt-2">
                {!! $products->links() !!}
            </div>


            </div>

        </div>
    </div>


</div>
