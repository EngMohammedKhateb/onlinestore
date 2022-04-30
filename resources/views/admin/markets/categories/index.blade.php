@extends('layouts.admin')


@section('style')
    @livewireStyles

@endsection

@section('content')
    <div class="container-fluid scrolable-page">

            @livewire('categories-table', ['id'=>$market->id])

    </div>
@endsection
@section('scripts')
    @livewireScripts
@endsection


