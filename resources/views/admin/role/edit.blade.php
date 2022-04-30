@extends('layouts.admin')

@section('content')
    <div class="container-fluid  scrolable-page">

     <div class="row p-3">

                <div class="card">

                    <div class="card-body">

                        <form action="{{route('admin.roles.update',['id'=>$role->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row pl-3 pr-3 text-danger">
                                    <h3 class="theme-text-color">  Edit Role > {{$role->name}} </h3>
                                </div>
                                <div class="form-group">
                                    <label>Role Name</label>
                                    <input value="{{$role->name}}" name="name" type="text" class="form-control mb-3" placeholder="enter role name">
                                    @error('name') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                </div>

                                <div class="row p-3">
                                    @foreach($permissions as $permission)
                                        <div class="col-lg-3 col-md-3 col-sm-12 p-2">

                                            <label class="switch">
                                                <input type="checkbox" name="permissions[]" @if( in_array($permission->id,$role_permissions)) checked @endif value="{{$permission->id}}" name="permissions">
                                                <span class="slider round"></span>
                                            </label>
                                            <span class="ml-2">{{$permission->name}}</span>



                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary btn-sm" type="submit"> <i class='bx bxs-save' ></i>  save changes </button>
                            </div>
                        </form>

                    </div>

                </div>

        </div>

    </div>
@endsection





