<div>

    <div class="container-fluid">



        <!-- Modal -->
        <div class="modal fade" wire:ignore.self id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select id="select_role" class="form-control" name="role_select">

                            @foreach($roles as $role)
                            <option  value="{{$role->id}}"> {{$role->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="selectedId(0)">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="updateUserRole(document.getElementById('select_role').value)">Save </button>
                    </div>
                </div>
            </div>
        </div>



        <div class="row mt-2">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="row p-3 text-danger">
                            <h3 class="theme-text-color"> Users </h3>
                        </div>

                               <div class="filter-wrapper  d-flex justify-content-between flex-lg-nowrap flex-sm-wrap mb-3">
                                   <input wire:model.debounce.300ms="search" type="text" class="form-control mr-lg-2" placeholder="Search users...">

                                   <select wire:model="orderBy" class="form-control ml-lg-2 mr-lg-2 mt-lg-0 mt-sm-2" id="grid-state">
                                       <option value="id">ID</option>
                                       <option value="name">Name</option>
                                       <option value="email">Email</option>
                                       <option value="created_at">Sign Up Date</option>
                                   </select>

                                   <select wire:model="role" class="form-control ml-lg-2 mr-lg-2  mt-lg-0 mt-sm-2" id="grid-state">
                                       <option value="0">all roles</option>
                                      @foreach($roles as $role)
                                       <option value="{{$role->id}}">{{$role->name}}</option>
                                      @endforeach
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
                                <th>Role</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Statue</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td  >{{ $user->id }}</td>
                                    <td  style="width: 6%;"><img width="30px" height="30px" src="{{asset($user->image)}}" alt=""> </td>
                                    <td >{{ $user->name }}</td>
                                    <td  class="text-role">{{ $user->role->name }}</td>
                                    <td  >{{ $user->email }}</td>
                                    <td  >@if($user->type == "delivery")<span class="theme-text-color font-weight-bold">@endif {{ $user->type }} @if($user->type == "delivery") </span>@endif</td>
                                    <td  >@if($user->block == 0) <p class="text-success p-0 m-0 font-weight-bold"> active </p> @else <p class="text-danger  p-0 m-0 font-weight-bold"> blocked </p>@endif </td>
                                    <td  >{{ $user->created_at->diffForHumans() }}</td>
                                    <td >
                                        <div class="btn-group">
                                            <button class="btn-rounded-shadow" type="button" data-toggle="dropdown" aria-expanded="false">
                                                <i class='bx bx-dots-vertical-rounded theme-text-color' ></i>
                                            </button>

                                            <div class="dropdown-menu">
                                                @if(auth()->user()->hasPermission('update user'))


                                                    @if($user->block=="0")
                                                        <button type="button" class="dropdown-item text-drop-down" wire:click="blockUser({{$user->id}})"> <i class='bx bx-block' ></i>&nbsp; block</button>
                                                    @else
                                                        <button type="button" class="dropdown-item text-drop-down" wire:click="unBlockUser({{$user->id}})"> <i class='bx bx-user-check' ></i>&nbsp; unblock</button>
                                                    @endif
                                                    @if($user->type=="delivery")
                                                            <button type="button" class="dropdown-item text-drop-down" wire:click="makeUser({{$user->id}})"> <i class='bx bxs-user' ></i>&nbsp; make user</button>
                                                    @else
                                                            <button type="button" class="dropdown-item text-drop-down" wire:click="makeDelivery({{$user->id}})"><i class='bx bxs-package' ></i>&nbsp; make delivery</button>
                                                    @endif

                                                    <button type="button" class="dropdown-item text-drop-down" data-toggle="modal" data-target="#exampleModal" wire:click="selectedId({{$user->id}})"> <i class='bx bxs-user-detail' ></i> &nbsp; change role</button>
                                                    <button type="button" class="dropdown-item text-drop-down" data-toggle="modal" data-target="#exampleModal" wire:click="selectedId({{$user->id}})"> <i class='bx bxs-bell-ring' ></i> &nbsp; send notification</button>

                                                @endif
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $users->links() !!}

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>


</div>
