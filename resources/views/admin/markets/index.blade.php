@extends('layouts.admin')


@section('style')
    @livewireStyles

@endsection

@section('content')
    <div class="container-fluid scrolable-page">


        <livewire:markets-table>

    </div>
@endsection
@section('scripts')
    @livewireScripts
@endsection


