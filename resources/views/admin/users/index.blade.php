@extends('layouts.admin')


@section('style')
    @livewireStyles

@endsection

@section('content')
    <div class="container-fluid scrolable-page">


        <livewire:users-table>

    </div>
@endsection
@section('scripts')
    @livewireScripts
@endsection


