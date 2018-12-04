@extends('layouts.admin')
@section('page.title', 'Agenda meeting room')

@section('content')
<div class="container height-fixer">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="page-header mb-3">
                <a href="{{ route('admin.rooms') }}" class="btn btn-secondary btn-sm mr-md-2">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
                <span class="h5"><b>Agenda:</b> {{ $room->name }}</span>
            </div>
            <div class="card row">
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