@extends('layouts.admin')


@section('style')
<style>
    .circle-edit{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        box-shadow: 0px 0px 2px 2px #6a61d9;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #7c61d9;
        color: #fff !important;
        text-decoration: none !important;
    }
</style>
@endsection

@section('content')
    <div class="container-fluid scrolable-page ">

        <div class="card mt-3 card-rounded">
           <div class="card-body">
               <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between">
                      <h3 class="theme-text-color">  <i class='bx bxs-show' ></i> show {{$product->name}} Product </h3>
                      <a class="theme-text-color circle-edit" style="font-size: 18px" href="{{route('admin.products.edit',['id'=>$product->id])}}"><i class='bx bxs-edit-alt' ></i>   </a>

                   </div>
                   <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                       <div class="media flex-wrap flex-column flex-lg-row ">
                           <img src="{{asset($product->image)}}" class="mr-3 rounded img-fluid" alt="...">
                           <div class="media-body">
                               <h5 class="mt-3 mt-lg-0 d-flex justify-content-between "> <span>{{$product->name}}</span><span><i class='bx bx-time'></i> {{ $product->created_at->diffForHumans() }} </span> </h5>
                               <p class="d-flex justify-content-between theme-text-color  flex-column flex-lg-row flex-md-row  mt-3 mb-0"> <span> Product Market : {{$product->category->market->name}} </span>  <span>Product Category : {{$product->category->name}} </span></p>

                               <p >{{$product->description}}</p>
                               <div class="d-flex justify-content-between  flex-column flex-lg-row flex-md-column">
                                   @if($product->is_active == "1") <span class="text-success p-0 m-0 font-weight-bold"><i class='bx bxs-circle' ></i> active </span> @else <span class="text-danger  p-0 m-0 font-weight-bold"><i class='bx bxs-circle' ></i> hidden </span>@endif
                                   <span class="  text-danger"><i class='bx bxs-discount' ></i> discount {{ $product->discount }}% </span>
                                   <span class="text-warning"><i class='bx bxs-purchase-tag' ></i> Price : @if($product->discount!=0) <del>  @endif {{$product->price}} @if($product->discount!=0) </del>@endif</span>
                                   <span class="text-secondary"><i class='bx bx-list-ol' ></i> priority : {{ $product->priority }}</span>
                               </div>
                               <p class="mb-0 d-flex mt-3 text-uppercase font-weight-bolder flex-column flex-lg-row flex-md-row text-primary"><span><i class='bx bxs-coin' ></i> the final price </span> &nbsp; &nbsp;  @if($product->discount==0) <b> {{$product->price}} </b> @else<b> {{ $product->price - ($product->price * $product->discount/100) }} </b>@endif </p>

                           </div>
                       </div>
                   </div>
               </div>
           </div>
        </div>

    </div>
@endsection
@section('scripts')

@endsection


