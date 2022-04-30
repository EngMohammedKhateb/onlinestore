@extends('layouts.admin')

@section('content')
    <div class="container-fluid  scrolable-page">

        <div class="row mt-3" >

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-danger mb-3 theme-text-color"><i class='bx bxs-category' ></i> Create New Category in {{$market->name}} </h4>

                        <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input class="d-none" type="text" name="id"  value="{{$market->id}}">
                                        <label>Category Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="Category Name">
                                        @error('name') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Priority</label>
                                        <input class="form-control" type="number" name="priority" placeholder="Enter Priority Number">
                                        @error('priority') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div id="upload-custom" class="custom-file-upload rtl"   onclick="document.getElementById('upload').click();">

                                            <input name="image" id="upload" type="file" accept="image/*" onchange="replaceText(this)"  placeholder="صورة ">
                                            <p  id="upload-status"> <i class='bx bx-image-add' style="font-size: 21px;"></i> attach image
                                            </p>
                                        </div>
                                        @error('image') <small id="emailHelp" class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group  pt-2 ">
                                        <label class="switch">
                                            <input type="checkbox" name="is_active" value="active" >
                                            <span class="slider round"></span>
                                        </label>
                                        <span class="ml-2">is active</span>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary"><i class='bx bxs-category' ></i> Create Category </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
