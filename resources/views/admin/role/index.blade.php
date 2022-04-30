@extends('layouts.admin')

@section('content')
    <div class="container-fluid  scrolable-page">
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card  card-rounded">
                    <div class="card-body">
                        <h3 class="theme-text-color mb-0"> Roles </h3>
                    </div>
                </div>
            </div>

        </div>

        <div class="row ">

            @foreach($roles as $role)
                <div class="col-lg-3 col-md-3 col-sm-12 mt-2">
                    <div class="card  card-rounded">
                        <div class="card-body">
                            <h4> {{$role->name}}</h4>

                            <div class="text-right mt-1">
                                @if(auth()->user()->hasPermission('update role'))
                                    <a href="{{route('admin.roles.edit',['id'=>$role->id])}}" class="btn text-btn-warning"> <i class='bx bxs-edit-alt' ></i> edit</a>
                                @endif
                                @if(auth()->user()->hasPermission('delete role'))

                                    <a onclick="return confirm('are you sure ?')" href="{{route('admin.roles.delete',['id'=>$role->id])}}" class="btn text-btn-danger"> <i class='bx bxs-trash' ></i> delete</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>

    </div>
@endsection



