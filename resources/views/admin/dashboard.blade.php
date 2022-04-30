@extends('layouts.admin')

@section('content')
    <div class="container-fluid  scrolable-page">

        <div class="row mb-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card  card-rounded">
                    <div class="card-body">
                        <h3 class="theme-text-color mb-0"><i class='bx bx-stats' ></i> Dashboard </h3>
                    </div>
                </div>
            </div>

        </div>


        <div class="row mt-3" >
            @foreach($models as $model)
                <div class="col-lg-3 col-md-3 col-sm-3 mb-2">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <h4 class="theme-text-color">{{$model['name']}}</h4>
                            <p>{{$model['count']}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12">
               <div class="card card-rounded">

                   <div class="card-body">

                       <h1 class="theme-text-color"> <i class='bx bx-line-chart' ></i> {{ $chart1->options['chart_title'] }}</h1>
                       {!! $chart1->renderHtml() !!}

                   </div>

               </div>
           </div>
        </div>


    </div>
@endsection
@section('scripts')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
@endsection
