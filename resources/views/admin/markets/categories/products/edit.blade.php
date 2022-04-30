@extends('layouts.admin')

@section('content')
    <div class="container-fluid  scrolable-page">

        <div class="row mt-3" >

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-danger mb-3 theme-text-color"><i class='bx bxs-component'></i>Edit Product  {{$product->name}} </h4>

                        <form action="{{route('admin.products.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                         <label>Product Name</label>
                                        <input value="{{$product->name}}" class="form-control" type="text" name="name" placeholder="Product Name">
                                        @error('name') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Priority</label>
                                        <input value="{{$product->priority}}" class="form-control" type="number" name="priority" placeholder="Enter Priority Number">
                                        @error('priority') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Enter discount Number</label>
                                        <input value="{{$product->discount}}" class="form-control" type="number" name="discount" placeholder="Enter discount Number">
                                        @error('discount') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Enter Product Price</label>
                                        <input value="{{$product->price}}" class="form-control" type="text" name="price"  placeholder="Enter Product Price">
                                        @error('price') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Shoose Product Image</label>
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
                                    <div class="form-group">
                                        <label>Enter Product Company</label>
                                        <input value="{{$product->company}}" class="form-control" type="text" name="company"  placeholder="Enter Product Company">
                                        @error('company') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Enter Product description</label>
                                        <textarea rows="6" class="form-control" type="text" name="description"  placeholder="Enter Product description">{{$product->description}}</textarea>
                                        @error('description') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group  pt-2 ">
                                        <label class="switch">
                                            <input @if($product->has_discount == 1 ) checked @endif type="checkbox" name="has_discount" value="active" >
                                            <span class="slider round"></span>
                                        </label>
                                        <span class="ml-2">has discount</span>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group  pt-2 ">
                                        <label class="switch">
                                            <input @if($product->is_active == 1 ) checked @endif type="checkbox" name="is_active" value="active" >
                                            <span class="slider round"></span>
                                        </label>
                                        <span class="ml-2">is active</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary"><i class='bx bxs-component'></i> update Product </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
