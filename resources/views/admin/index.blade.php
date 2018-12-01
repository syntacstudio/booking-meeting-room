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
                    <p class="h5 m-0">{{ $bookings }} Booking{{ $bookings > 1 ? 's' : '' }}</p>
                    <small class="text-muted">Booking{{ $bookings > 1 ? 's' : '' }} made.</small>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="mb-3">Latest Booking:</h5>
        </div>
    </div>
</div>
@endsection
