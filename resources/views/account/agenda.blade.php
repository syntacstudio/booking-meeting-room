@extends('layouts.default')
@section('page.title', 'My Account')

@section('content')
@include('partially.loading')
<div class="account-container mx-auto py-md-5 py-3 mb-5">
    <div class="row">
        <div class="col-md-2">
            @include('partially.nav.account')
        </div>
        <div class="col-md-10">
            <div class="card shadow mb-3">
                <div class="card-header">
                    My Agenda
                </div>
                <div class="card-body">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.2.1.3.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.min.css') }}"/>

    {!! $calendar->script() !!}
@stop