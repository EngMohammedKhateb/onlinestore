@extends('layouts.admin')

@section('content')
    <div class="container-fluid  scrolable-page">
       <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12">

               <div class="card">
                   <div class="card-body">
                       <div class="row d-flex align-items-center justify-content-center text-center">
                           <img src="{{asset('images/site/controlpanel.png')}}" alt="" width="200px">
                       </div>
                       <div class="row justify-content-center text-center">
                           <h3 class="text-center font-weight-bold" style="color: var(--color-primary)">Welcome To Control Panel </h3>
                       </div>
                   </div>
               </div>

           </div>
       </div>
    </div>
@endsection
