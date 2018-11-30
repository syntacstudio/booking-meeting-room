			<div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{ asset('storage/rooms/'. $room->image) }}">
                <div class="card-body">
                	<h1 class="h5">
                		<a href="{{ route('room', $room->permalink) }}">{{ $room->name }}</a>
                	</h1>
                	<p class="text-muted">{{ $room->location }}</p>
	                <p class="card-text">{{ str_limit($room->description, 135, ' ...') }}</p>
	                <div class="d-flex justify-content-between align-items-center">
	                	<span class="h4">${{ $room->price }} <span class="text-muted">/</span> Hour</span>
	                    <a href="{{ route('booking', $room->permalink) }}" class="btn btn-sm btn-outline-primary">Book Now!</a>
	                </div>
                </div>
            </div>