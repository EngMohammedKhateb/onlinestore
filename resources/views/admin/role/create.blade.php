@extends('layouts.admin')

@section('content')
    <div class="container-fluid  scrolable-page">

        <div class="row mt-3" >

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card  card-rounded">
                        <div class="card-body">
                            <h4 class="text-danger mb-3 theme-text-color"> Create New Role </h4>

                            <form action="{{route('admin.roles.store')}}" method="post">
                                @csrf
                            <div class="form-group">
                                <label>Role Name</label>
                                <input class="form-control" type="text" name="name">
                                @error('name') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                            </div>

                            <div class="form-group text-right">
                                 <button type="submit" class="btn btn-primary"> <i class='bx bx-plus'></i> add role </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection
