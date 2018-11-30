@extends('layouts.default')
@section('page.title', 'Home')

@section('content')
<div class="container py-5">
	<h2 class="text-center">Meeting Rooms</h2>

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
