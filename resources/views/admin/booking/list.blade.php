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
    			<td class="text-center">
                  <a href="{{ route('account.invoice', $booking->number) }}" target="_blank" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="View Invoice" >
                    <i class="fa fa-file"></i>      
                  </a> 
    		      <a href="{{ route('admin.booking', $booking->id) }}" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="View Booking" >
                    <i class="fa fa-eye"></i>      
                  </a>
    			</td>
    		</tr>
    		@endforeach
    	</body>
    </table>

</div>
@endsection
