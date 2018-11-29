@extends('layouts.default')
@section('page.title', 'Home')

@section('content')
<div class="search-hero">
    <div class="container">
    	<h1>Find your best meeting room</h1>

    	<form method="get" action="/search" class="row bg-white box-shadow px-3 pb-3 mt-4 pt-4 rounded w-75 mx-auto mt-3">
    		<div class="form-group col-md-9">
    			<input class="form-control form-control-lg" placeholder="Search city, name or anything ...">
    		</div>
    		<div class="form-group col-md-3">
    			<button class="btn btn-lg btn-block btn-primary">SEARCH</button>
    		</div>
    	</form>
    </div>
</div>

<div class="container py-5">
	<h2 class="text-center">Featured Meeting Rooms</h2>

	<div id="rooms-listing" class="row mt-5">
		@foreach($rooms as $room)
		<div class="col-md-4">
			<div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{ asset('storage/rooms/'. $room->image) }}">
                <div class="card-body">
                	<h1 class="h5">{{ $room->name }}</h1>
                	<p class="text-muted">{{ $room->location }}</p>
	                <p class="card-text">{{ str_limit($room->description, 135, ' ...') }}</p>
	                <div class="d-flex justify-content-between align-items-center">
	                	<span class="h4">${{ $room->price }} / Hour</span>
	                    <div class="btn-group">
	                      <a href="/room/{{ $room->permalink }}" class="btn btn-sm btn-outline-secondary">View</a>
	                      <a href="/booking/{{ $room->permalink }}" class="btn btn-sm btn-outline-secondary">Book</a>
	                    </div>
	                </div>
                </div>
            </div>
		</div>
		@endforeach

        {{ $rooms->links() }}
	</div>
</div>
@endsection
