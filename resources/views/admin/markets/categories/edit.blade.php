@extends('layouts.admin')

@section('content')
    <div class="container-fluid  scrolable-page">

        <div class="row mt-3" >

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-danger mb-3 theme-text-color"><i class='bx bxs-component'></i>Edit Category  {{$category->name}} </h4>

                        <form action="{{route('admin.categories.update',['id'=>$category->id])}}" method="post" enctype="multipart/form-data">
                            @csrf



                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>choose Category Image</label>
                                    <div class="form-group">

                                        <div id="upload-custom" class="custom-file-upload rtl"   onclick="document.getElementById('upload').click();">

                                            <input name="image" id="upload" type="file" accept="image/*" onchange="replaceText(this)"  placeholder="صورة ">
                                            <p  id="upload-status"> <i class='bx bx-image-add' style="font-size: 21px;"></i> attach image
                                            </p>
                                        </div>
                                        @error('image') <small id="emailHelp" class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary"><i class='bx bxs-component'></i> update category </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
