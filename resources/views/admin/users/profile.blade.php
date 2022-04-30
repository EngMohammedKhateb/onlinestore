@extends('layouts.admin')

@section('content')
    <div class="container-fluid  scrolable-page">

        <div class="row mt-3" >

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-rounded">
                    <div class="card-body">
                        <h4 class="text-primary mb-3 theme-text-color">Update Your Profile </h4>

                        <form action="{{route('admin.users.profile')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row m-3 justify-content-center">

                                <img onclick="document.getElementById('img_inp').click()" id="user_profile_image" src="{{asset(auth()->user()->image)}}" width="130px" height="130px" class="rounded-circle" style="border: 2px solid #eee;" alt="">

                            </div>
                            <div class="row m-3 justify-content-center">
                                <h3 class="user_profile_name"> {{auth()->user()->name}} </h3>
                            </div>

                            <div class="row">

                                <input id="img_inp" type="file" accept="image/*" name="image" class="d-none">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input id="name_inp" class="form-control" type="text" value="{{auth()->user()->name}}" name="name" placeholder="User Name">
                                        @error('name') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Type New Password : min 8 char</label>
                                        <input class="form-control" type="text" name="password" placeholder="Strong Password">
                                        @error('password') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary"> <i class='bx bxs-save' ></i> Save Changes </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let imgInp=document.getElementById('img_inp');
        let user_profile_image=document.getElementById('user_profile_image');

        let name_inp=document.getElementById('name_inp');
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                user_profile_image.src = URL.createObjectURL(file)
            }
        }
        const inputHandler = function(e) {

                Array.prototype.forEach.call(document.getElementsByClassName("user_profile_name"), function(element) {
                    // Use `element` here
                    element.innerHTML = e.target.value;
                });

        }
        name_inp.addEventListener('input', inputHandler);
        name_inp.addEventListener('propertychange', inputHandler);


    </script>
@endsection
