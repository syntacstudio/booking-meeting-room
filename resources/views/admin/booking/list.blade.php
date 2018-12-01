@extends('layouts.admin')
@section('page.title', 'Bookings List')

@section('content')
<div class="container height-fixer">
    <h5 class="mb-3">Bookings List:</h5>

    <table class="table table-hover table-bordered">
    	<thead class="thead-light">
    		<tr>
    			<th>#</th>
    			<th>Customer</th>
                <th>Meeting Date</th>
                <th>Day</th>
    			<th>Booked at</th>
    			<th>Meeting Room</th>
    			<th>Total</th>
    			<th></th>
    		</tr>
    	</thead>
    	<body>
    		@foreach($data as $key => $booking)
    		<tr>
    			<th>{{ $key+1 }}</th>
    			<td>{{ $booking->customer->name }}</td>
                <td>{{ $booking->start_date->format('Y/m/d') }}</td>
                <td>{{ $booking->day }}</td>
    			<td>{{ $booking->created_at->format('Y/m/d') }}</td>
    			<td>{{ $booking->room->name }}</td>
    			<td>${{ $booking->total }}</td>
    			<td class="text-right">
    				
    			</td>
    		</tr>
    		@endforeach
    	</body>
    </table>

</div>
@endsection
