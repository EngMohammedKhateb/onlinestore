@extends('layouts.admin')

@section('content')
    <div class="container-fluid p-3  scrolable-page">

        <div class="row mt-2">
            <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-rounded">
                    <div class="card-body">
                        <h3 class="theme-text-color mb-3"> <i class='bx bxs-palette' ></i> Select Theme </h3>
                        <div class="themes-wrapper mt-3 d-flex justify-content-between flex-wrap">

                            <a href="{{route('admin.users.theme',['theme'=>'default_theme'])}}">
                                <div class="theme-color d-flex justify-content-center align-items-center" style="background-color: #11101d;color:#fff">
                                    @if(auth()->user()->theme == "default_theme.css")
                                        <i class='bx bx-check' ></i>
                                    @endif
                                </div>
                            </a>

                            <a href="{{route('admin.users.theme',['theme'=>'orange_theme'])}}">
                                <div class="theme-color d-flex justify-content-center align-items-center" style="background-color: #ff9800;color:#000">
                                    @if(auth()->user()->theme == "orange_theme.css")
                                        <i class='bx bx-check' ></i>
                                    @endif
                                </div>
                            </a>

                            <a href="{{route('admin.users.theme',['theme'=>'blue_theme'])}}">
                                <div class="theme-color  d-flex justify-content-center align-items-center" style="background-color: #3f51b5;color:#fff">
                                    @if(auth()->user()->theme == "blue_theme.css")
                                        <i class='bx bx-check' ></i>
                                    @endif
                                </div>
                            </a>

                            <a href="{{route('admin.users.theme',['theme'=>'green_theme'])}}">
                                <div class="theme-color d-flex justify-content-center align-items-center" style="background-color: #4caf50;color:#fff">
                                    @if(auth()->user()->theme == "green_theme.css")
                                        <i class='bx bx-check' ></i>
                                    @endif
                                </div>
                            </a>
                            <a href="{{route('admin.users.theme',['theme'=>'purple_theme'])}}">
                                <div class="theme-color d-flex justify-content-center align-items-center" style="background-color: #9c27b0;color:#fff">
                                    @if(auth()->user()->theme == "purple_theme.css")
                                        <i class='bx bx-check' ></i>
                                    @endif
                                </div>
                            </a>

                            <a href="{{route('admin.users.theme',['theme'=>'grey_theme'])}}">
                                <div class="theme-color d-flex justify-content-center align-items-center" style="background-color:  #607d8b;color:#fff">
                                    @if(auth()->user()->theme == "grey_theme.css")
                                        <i class='bx bx-check' ></i>
                                    @endif
                                </div>
                            </a>

                            <a href="{{route('admin.users.theme',['theme'=>'material_theme'])}}">
                                <div class="theme-color d-flex justify-content-center align-items-center" style="background-color: #6a61d9;color:#fff">
                                    @if(auth()->user()->theme == "material_theme.css")
                                        <i class='bx bx-check' ></i>
                                    @endif
                                </div>
                            </a>

                            <a href="{{route('admin.users.theme',['theme'=>'red_theme'])}}">
                                <div class="theme-color d-flex justify-content-center align-items-center" style="background-color:#e91e63;color:#fff">
                                    @if(auth()->user()->theme == "red_theme.css")
                                        <i class='bx bx-check' ></i>
                                    @endif
                                </div>
                            </a>
                    </div>

                    </div>   </div>
            </div>
        </div>

        <div class="row mt-2">
              <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card card-rounded">
                    <div class="card-body">
                        <h3 class="theme-text-color"><i class='bx bxs-message-alt-add' ></i> Create New Setting </h3>

                        <form action="{{route('admin.settings.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Property Name</label>
                                        <input class="form-control" type="text" name="property_key">
                                        @error('property_key') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                   </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Property Value</label>
                                        <input class="form-control" type="text" name="property_value">
                                        @error('property_value') <small  class="form-text  text-danger">{{ $message }}</small>  @enderror
                                    </div>
                                </div>


                            </div>


                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary"> <i class='bx bx-list-plus' ></i> Add Property </button>
                            </div>
                        </form>

                    </div>
                 </div>
              </div>

        </div>

        <div class="row mt-2">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="card card-rounded">
                    <div class="card-body">
                        <h3 class="theme-text-color"> <i class='bx bx-list-ul' ></i> All Settings </h3>
                        <div class="table-responsive mt-3 text-nowrap">


                            <table class="table table-borderless table-sm ">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Key</th>
                                    <th>Value</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($settings as $setting)
                                    <tr>
                                        <td  >{{ $setting->id }}</td>
                                        <td >{{ $setting->property_name }}</td>
                                        <td style="white-space: break-spaces;">{{ $setting->property_value }}</td>
                                        <td >{{ $setting->created_at }}</td>
                                        <td >{{ $setting->updated_at }}</td>
                                        <td > <a class="theme-text-color" style="font-size: 22px" href="{{route('admin.settings.edit',['id'=>$setting->id])}}"><i class='bx bxs-edit' ></i> </a> </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection



