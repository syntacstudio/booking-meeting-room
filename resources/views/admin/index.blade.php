@extends('layouts.admin')
@section('page.title', 'Dashboard')

@section('content')
<div class="container height-fixer">
    <div class="row">
        <div class="col-md-6">
            <h5 class="mb-3">Summary:</h5>

            <div class="card p-3 mb-2">
                <div class="d-flex align-items-center">
                <span class="bg-primary mr-3 px-2 py-2 rounded">
                    <i class="fa fa-map-marker text-white fa-2x"></i>
                </span>
                <div>
                    <p class="h5 m-0">{{ $rooms }} Room{{ $rooms > 1 ? 's' : '' }}</p>
                    <small class="text-muted">Meeting room{{ $rooms > 1 ? 's' : '' }} listed</small>
                </div>
                </div>
            </div>

            <div class="card p-3 mb-2">
                <div class="d-flex align-items-center">
                <span class="bg-primary mr-3 px-2 py-2 rounded">
                    <i class="fa fa-users text-white fa-2x"></i>
                </span>
                <div>
                    <p class="h5 m-0">{{ $customers }} Customer{{ $customers > 1 ? 's' : '' }}</p>
                    <small class="text-muted">Customer{{ $customers > 1 ? 's' : '' }} Registered</small>
                </div>
                </div>
            </div>

            <div class="card p-3 mb-2">
                <div class="d-flex align-items-center">
                <span class="bg-primary mr-3 px-2 py-2 rounded">
                    <i class="fa fa-file-text text-white fa-2x"></i>
                </span>
                <div>
                    <p class="h5 m-0">{{ $booking }} Booking{{ $booking > 1 ? 's' : '' }}</p>
                    <small class="text-muted">Booking{{ $booking > 1 ? 's' : '' }} made.</small>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="mb-3 d-flex justify-content-between align-items-center">
                Latest Booking:
                <a href="{{ route('admin.bookings') }}" class="float-right mt-2">View All</a>
            </h5>

            <ul class="list-group">
                @foreach ($bookings as $item)
                    <li class="list-group-item">
                        <small class="mr-2">{{ $item->created_at->diffForHumans() }}</small>
                        <b>{{ $item->customer->name }}</b>
                        <a href="{{ route('admin.booking', $item->id) }}" class="btn float-right btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="View Booking" >
                            <i class="fa fa-eye"></i>      
                        </a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection
