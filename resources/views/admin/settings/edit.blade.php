@extends('layouts.admin')

@section('content')
    <div class="container-fluid  scrolable-page">

        <div class="row p-3">
            <div class="col-lg-12 col-md-12 col-sm-12 p-0">


            <div class="card">

                <div class="card-body">

                    <form action="{{route('admin.settings.update',['id'=>$setting->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row pl-3 pr-3 text-danger d-inline-block">
                                <h3 class="theme-text-color"><i class='bx bxs-edit-alt' ></i>  Edit Setting </h3>

                                <p class="m-0 theme-text-color"> <i class='bx bx-right-arrow-alt' ></i> {{$setting->property_name}}</p>
                                <br>
                            </div>


                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Setting Key Name</label>
                                        <input value="{{$setting->property_name}}" name="property_key" type="text" class="form-control mb-3" placeholder="enter setting key name">
                                        @error('property_key') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                               <div class="col-lg-12 col-md-12 col-sm-12">

                                       <div class="form-group">
                                           <label>Setting Value</label>
                                           <textarea name="property_value" type="text" class="form-control mb-3" placeholder="enter setting value">{{$setting->property_value}}</textarea>
                                           @error('property_value') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                       </div>

                               </div>
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

    </div>
@endsection





