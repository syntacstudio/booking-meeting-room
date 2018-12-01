@extends('layouts.admin')
@section('page.title', 'Customers List')

@section('content')
<div class="container height-fixer">
    <h5 class="mb-3">Customers List:</h5>

    <table class="table table-hover table-bordered">
    	<thead class="thead-light">
    		<tr>
    			<th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Total Booking</th>
                <th>Registered at</th>
    			<th></th>
    		</tr>
    	</thead>
    	<body>
    		@foreach($data as $key => $user)
    		<tr>
                <th>{{ $key+1 }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->bookings->count() }}</td>
    			<td>{{ $user->created_at }}</td>
    			<td class="text-center">
    				<a href="{{ route('admin.booking', $user->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-secondary">
                        <i class="fa fa-trash"></i>
                    </a>
    			</td>
    		</tr>
    		@endforeach
    	</body>
    </table>

</div>
@endsection
