@extends('layouts.default')
@section('page.title', 'Home')

@section('content')
<div class="search-hero">
    <div class="container">
    	<h1>Find your best meeting room</h1>

    	<form method="get" action="{{ route('browse') }}" class="row bg-white box-shadow px-3 pb-3 mt-4 pt-4 rounded w-75 mx-auto mt-3">
    		<div class="form-group col-md-9">
    			<input class="form-control form-control-lg" name="search" placeholder="Search city, name or anything ...">
    		</div>
    		<div class="form-group col-md-3">
    			<button class="btn btn-lg btn-block btn-primary">SEARCH</button>
    		</div>
    	</form>
    </div>
</div>

<div class="container py-5 mb-3">
	<h2 class="text-center">Featured Meeting Rooms</h2>

	<div id="rooms-listing" class="row mt-5">
        @if($rooms)
            @foreach($rooms as $room)
            <div class="col-md-4">
                @include('partially.room-card')
            </div>
            @endforeach
        @else
            <div class="w-100 mx-3 alert alert-info">Not yet data available.</div>
        @endif
	</div>

    <a href="{{ route('browse') }}" class="btn float-right btn-secondary">Browse All <i class="fa fa-angle-right"></i></a>
</div>
@endsection
