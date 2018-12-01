@extends('layouts.admin')
@section('page.title', 'Rooms List')

@section('content')
<div class="container height-fixer">
	@include('partially.alerts.success')
    <div class="h5 mb-4 ">
    	Rooms List: 
    	<a class="btn btn-primary btn-sm float-right" href="{{ route('admin.room.create') }}">Create Meeting Room</a>
    </div>

    <table class="table table-hover table-bordered">
    	<thead class="thead-light">
    		<tr>
    			<th>#</th>
    			<th>Name</th>
    			<th>Location</th>
    			<th>Price</th>
    			<th></th>
    		</tr>
    	</thead>
    	<body>
    		@foreach($data as $key => $room)
    		<tr>
    			<th>{{ $key+1 }}</th>
    			<td>{{ $room->name }}</td>
    			<td>{{ $room->location }}</td>
    			<td>${{ $room->price }}</td>
    			<td class="text-right">
    				<a href="{{ route('admin.room.edit', ['id' => $room->id]) }}" class="btn btn-sm btn-secondary"><i class="fa fa-pencil"></i></a> 
    				<a onclick="return confirm('Are you sure?')" href="{{route('admin.room.destroy', $room->id)}}" class="btn btn-sm btn-secondary"><i class="fa fa-trash"></i></a> 
    			</td>
    		</tr>
    		@endforeach
    	</body>
    </table>
    {{ $data->links() }}
</div>
@endsection
