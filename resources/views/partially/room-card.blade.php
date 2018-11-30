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