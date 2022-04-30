@extends('layouts.admin)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <img src="{{asset('images/site/logo.png')}}" alt="">

                    <br>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                        {{ 'is user can manage users ' }}
                        {{auth()->user()->hasPermission('manage users')?'yes':'no'}}
                        <br/>
                        {{ 'is user can manage courses ' }}
                        {{auth()->user()->hasPermission('manage courses')?'yes':'no'}}
                        <br/>
                    {{ 'now you are '.$role->name }}
                        <br/>
                    @foreach($permissions as $permission)
                            {{ 'you can : '.$permission  }}
                            <br/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
