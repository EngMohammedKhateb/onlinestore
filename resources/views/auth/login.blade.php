@extends('layouts.login')

@section('styles')
    <style>
        .central-box{
            color: var(--color-primary);
            font-size: 20px;
            vertical-align: middle;
        }
        .btn-primary{
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }

        /*  switch style   */
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: var(--color-primary);
        }

        input:focus + .slider {
            box-shadow: 0 0 1px  var(--color-primary);
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
        /* end switch style   */

    </style>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">

                    <div class="row ">
                      <div class="col-lg-12 col-md-12 col-sm-12 ">
                          <div class="row p-3 justify-content-between">
                              <h3 class="central-box font-weight-bold">{{env('APP_NAME')}}</h3>
                              <div class="central-box font-weight-bold"> <i class='bx bxs-door-open' ></i> {{ __('Login') }}</div>
                          </div>

                      </div>
                    </div>


                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group ">

                                    <label for="email" ><i class='bx bxs-envelope central-box' ></i> {{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')   <span class="invalid-feedback" role="alert">  <strong>{{ $message }}</strong> </span>  @enderror

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group ">
                                <label for="password" ><i class='bx bxs-lock-alt central-box' ></i> {{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>  </span>  @enderror

                            </div> </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">


                                <div class="form-group ">
                                <label class="switch">
                                    <input type="checkbox" name="permissions[]" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                                <span class="ml-2">{{ __('Remember Me') }}</span>
                                </div>


                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">  <i class='bx bxs-door-open' ></i> {{ __('Login') }}  </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
