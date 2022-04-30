<div>

    <div class="container-fluid">



        <!-- Modal -->
        <div class="modal fade" wire:ignore.self id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Market Name</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Market Name </label>
                        <input class="form-control" name="market_name" id="market_name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="selectedId(0)">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="updateMarketName(document.getElementById('market_name').value)">Save </button>
                    </div>
                </div>
            </div>
        </div>

        <!--delete Modal -->
        <div class="modal fade" wire:ignore.self id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Market</h5>
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
                            <h3 class="theme-text-color"><i class='bx bx-store-alt' ></i> Markets </h3>
                        </div>

                        <div class="filter-wrapper  d-flex justify-content-between flex-lg-nowrap flex-sm-wrap mb-3">
                            <input wire:model.debounce.300ms="search" type="text" class="form-control mr-lg-2" placeholder="Search markets...">

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




                        <div class="table-responsive text-nowrap">


                            <table class="table table-borderless table-sm ">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Categories</th>
                                    <th>Priority</th>
                                    <th>Active</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($markets as $market)
                                    <tr>
                                        <td  >{{ $market->id }}</td>
                                        <td  style="width: 6%;"><img width="30px" height="30px" src="{{asset($market->image)}}" alt=""> </td>
                                        <td >{{ $market->name }}</td>
                                        <td  class="text-role">{{ $market->categories->count() }}</td>
                                        <td  class="text-role d-flex">
                                            <div class="decrease-box" wire:click="decreasePriority({{ $market->id}})">
                                                <i class='bx bx-chevron-left' ></i>
                                            </div>
                                            &nbsp
                                             <div class="box-count">{{ $market->priority }}</div>
                                            &nbsp
                                            <div class="increase-box" wire:click="increasePriority({{ $market->id}})">
                                                <i class='bx bx-chevron-right' ></i>
                                            </div>

                                        </td>
                                        <td  >@if($market->is_active == "1") <p class="text-success p-0 m-0 font-weight-bold"> active </p> @else <p class="text-danger  p-0 m-0 font-weight-bold"> hidden </p>@endif </td>
                                        <td  >{{ $market->created_at->diffForHumans() }}</td>
                                        <td >
                                            <div class="btn-group">
                                                <button class="btn-rounded-shadow" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bx-dots-vertical-rounded theme-text-color' ></i>
                                                </button>

                                                <div class="dropdown-menu">
                                                    @if(auth()->user()->hasPermission('update market'))

                                                        <button type="button" class="dropdown-item text-drop-down"  data-toggle="modal" data-target="#exampleModal" wire:click="selectedId({{$market->id}});"> <i class='bx bx-store-alt' ></i>  &nbsp; change name  </button>
                                                        <a href="{{route('admin.markets.edit',['id'=>$market->id])}}" class="dropdown-item text-drop-down"  > <i class='bx bx-image-add' ></i>  &nbsp; change image  </a>
                                                        <a href="{{route('admin.categories.create',['id'=>$market->id])}}" class="dropdown-item text-drop-down"  > <i class='bx bxs-category' ></i> &nbsp; create category</a>
                                                        <a href="{{route('admin.categories.index',['id'=>$market->id])}}" class="dropdown-item text-drop-down"  > <i class='bx bx-category-alt'></i> &nbsp; explore categories</a>
                                                        @if($market->is_active == "0" )
                                                            <button type="button" class="dropdown-item text-drop-down" wire:click="active({{$market->id}})"><i class='bx bx-check-double' ></i> &nbsp;  active</button>
                                                        @else
                                                            <button type="button" class="dropdown-item text-drop-down" wire:click="hide({{$market->id}})"> <i class='bx bx-block' ></i>&nbsp;&nbsp; hide</button>
                                                        @endif
                                                        <button type="button" class="dropdown-item text-drop-down" data-toggle="modal" data-target="#deleteModal" wire:click="selectedId({{$market->id}})"> <i class='bx bxs-trash' ></i> &nbsp;&nbsp; delete</button>
                                                    @endif
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $markets->links() !!}

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>


</div>
