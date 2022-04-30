@extends('layouts.admin')

@section('content')
    <div class="container-fluid  scrolable-page">

        <div class="row mt-3" >

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-danger mb-3 theme-text-color"> Create New User </h4>

                        <form action="{{route('admin.users.store')}}" method="post">
                            @csrf




                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12"><div class="form-group">
                                        <label>User Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="User Name">
                                        @error('name') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div></div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Enter Email Address</label>
                                        <input class="form-control" type="text" name="email" placeholder="Email Address">
                                        @error('email') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Type Password : min 8 char</label>
                                        <input class="form-control" type="text" name="password" placeholder="Strong Password">
                                        @error('password') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                      <div class="form-group">
                                        <label>Select Role</label>
                                        <select class="form-control" type="text" name="role_id">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}"> {{$role->name}}</option>

                                            @endforeach
                                        </select>
                                        @error('role_id') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Select Type</label>
                                        <select class="form-control" type="text" name="type">
                                                <option value="user"> user </option>
                                                <option value="delivery"> delivery </option>
                                        </select>
                                        @error('type') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary"> <i class='bx bx-user-plus' ></i> Create User </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
