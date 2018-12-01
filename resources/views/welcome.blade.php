@extends('layouts.default')
@section('page.title', 'Home')

@section('content')
<div class="search-hero">
    <div class="container">
    	<h1>Find your best meeting room</h1>

    	<form method="get" action="/search" class="row bg-white box-shadow px-3 pb-3 mt-4 pt-4 rounded w-75 mx-auto mt-3">
    	<form method="get" action="{{ route('browse') }}" class="row bg-white box-shadow px-3 pb-3 mt-4 pt-4 rounded w-75 mx-auto mt-3">
    		<div class="form-group col-md-9">
    			<input class="form-control form-control-lg" placeholder="Search city, name or anything ...">
    			<input class="form-control form-control-lg" name="search" placeholder="Search city, name or anything ...">
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
			@include('partially.room-card')
		</div>
		@endforeach

        {{ $rooms->links() }}
	</div>
</div>
@endsection
