@extends('layouts.admin')
@section('page.title', 'Booking Detail')

@section('content')

<div class="container height-fixer">
	<div class="row justify-content-center">
        <div class="col-md-8">
        	<div class="page-header mb-3">
        		<a href="{{ route('admin.bookings') }}" class="btn btn-secondary btn-sm mr-md-2">
					<i class="fa fa-arrow-left"></i> Back
				</a>
				<span class="h5"><b>Booking Number:</b> {{ $data->number }}</span>
        	</div>
            <div class="card">
            	<div class="card-header">
            		Booking Details
            	</div>
                <div class="card-body">
                    <table class="table table-bordered">
						<tbody>
							<tr>
								<th>Booked at</th>
								<td>{{ $data->created_at }}</td>
							</tr>
							<tr>
								<th>Meeting room</th>
								<td>{{ $data->room->name }}</td>
							</tr>
							<tr>
								<th>Room price / day</th>
								<td>${{ $data->total / $data->day }}</td>
							</tr>
							<tr>
								<th>Total</th>
								<td>${{ $data->total }}</td>
							</tr>
							<tr>
								<th>Meeting start date</th>
								<td>{{ $data->start_date }}</td>
							</tr>
							<tr>
								<th>Meeting end date</th>
								<td>{{ $data->start_date }}</td>
							</tr>
							<tr>
								<th>Day of meeting</th>
								<td>{{ $data->day }} days</td>
							</tr>
							<tr>
								<th>Note</th>
								<td>{!! nl2br($data->note) !!}</td>
							</tr>
						</tbody>
					</table>

					<a href="{{ route('account.invoice', $data->number) }}" target="_blank" class="btn btn-primary float-right">
						<i class="fa fa-file"></i> View Invoice
					</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
