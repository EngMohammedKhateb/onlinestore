@extends('layouts.admin')


@section('style')
    @livewireStyles
<style>
    .btn-over{
        position: absolute;
        top: 10px;
        background: #fff;
        border-radius: 50%;
        right: 10px;

    }
</style>
@endsection

@section('content')
    <div class="container-fluid scrolable-page">

        @livewire('products-table', ['id'=>$id])

    </div>
@endsection
@section('scripts')
    @livewireScripts
@endsection


