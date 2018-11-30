@extends('layouts.default')
@section('page.title', 'Booking: '. $data->name)

@section('content')
<div id="room-detail">
    <div class="container py-5">
    	<div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/rooms/'. $data->image) }}" alt="{{ $data->name }}" class="img-thumbnail">
                <div class="d-flex mt-3 justify-content-between align-items-center">
                    <span class="h4 pt-2">${{ $data->price }} <span class="text-muted">/</span> Hour</span>
                    <a href="{{ route('booking', $data->permalink) }}" class="btn btn-outline-primary">Book Now!</a>
                </div>
            </div>
            <div class="col-md-8">
                <h1 class="h4 mb-0">{{ $data->name }}</h1>
                <p class="text-muted">{{ $data->location }}</p>
                {!! nl2br($data->description) !!}
            </div>
        </div>
    </div>
</div>
@endsection
