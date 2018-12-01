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
                <th>{{ $user->name }}</th>
                <th>{{ $user->email }}</th>
                <th>{{ $user->bookings->count() }}</th>
    			<th>{{ $user->created_at }}</th>
    			<td class="text-right">
    				<a href="#" class="btn btn-sm btn-secondary">
                        <i class="fa fa-trash"></i>
                    </a>
    			</td>
    		</tr>
    		@endforeach
    	</body>
    </table>

</div>
@endsection
