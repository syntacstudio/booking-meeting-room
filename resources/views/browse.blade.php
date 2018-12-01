@extends('layouts.default')
@section('page.title', 'Browse Meeting Rooms')

@section('content')
<div class="container pb-5 pt-4">
	<div class="filters border-bottom pb-2">
		<div class="row">
			<div class="col-md-8">
				@if (!$search)
					<h1 class="h4 pt-2">Meeting Rooms</h1>
				@else
					<div class="pt-2">
						<span class="h4">Search result for: {{ $search }} </span>
						<small><a href="{{ route('browse') }}" class="float-right mt-2">Clear search</a></small>
					</div>
				@endif
			</div>
			<div class="col-md-4">
			  <form method="get">
				<div class="input-group">
				  	<input type="text" name="search" class="form-control" value="{{ $search }}" placeholder="Search...">
					  <div class="input-group-append">
					    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
					  </div>
				</div>
			  </form>
			</div>
		</div>
	</div>

	<div id="rooms-listing" class="row mt-4">
		@if($rooms->count() > 0)
            @foreach($rooms as $room)
            <div class="col-md-4">
                @include('partially.room-card')
            </div>
            @endforeach
        @else
            @if($search)
            	<div class="w-100 mx-3 alert alert-info">Your search did not match any meeting room.</div>
        	@else
        		<div class="w-100 mx-3 alert alert-info">Not yet data available.</div>
        	@endif
        @endif

	</div>

	<div class="paginate-wrapper mb-3">
		<span class="float-right">
			{{ $rooms->links() }}
		</span>
	</div>
</div>
@endsection
