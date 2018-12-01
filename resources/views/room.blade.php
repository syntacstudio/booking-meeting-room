@extends('layouts.default')
@section('page.title', $data->name)

@section('content')
<div id="room-detail" class="height-fixer">
    <div class="container py-5">
    	<div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/rooms/'. $data->image) }}" alt="{{ $data->name }}" class="img-thumbnail">
                <div class="d-flex mt-3 justify-content-between align-items-center">
                    <span class="h4 pt-2">${{ $data->price }} <span class="text-muted">/</span> Hour</span>
                    <a href="{{ route('booking', $data->permalink) }}" class="btn btn-outline-primary">Book Now!</a>
                </div>
            </div>
            <div class="col-md-8">
                <h1 class="h4 mb-0">{{ $data->name }}</h1>
                <p class="text-muted">{{ $data->location }}</p>
                <article>
                    {!! nl2br($data->description) !!}
                </article>
                <div class="card mt-3">
                    <div class="card-header">Facilities</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="w-25 bg-light"><i class="fa fa-hotel"></i> Number of seats</td>
                                    <th>{{ $data->seats ?? 'Unknown' }}</th>
                                </tr>
                                <tr>
                                    <td class="bg-light"><i class="fa fa-wifi"></i> Wi-Fi</td>
                                    <th>{{ !$data->wifi ? 'Not available' : $data->wifi.' Mbps' }}</th>
                                </tr>
                                <tr>
                                    <td class="bg-light"><i class="fa fa-line-chart"></i> Air Conditioner</td>
                                    <th>{{ $data->ac == 'yes' ? 'Available' : 'Not available' }}</th>
                                </tr>
                                <tr>
                                    <td class="bg-light"><i class="fa fa-coffee"></i> Coffee</td>
                                    <th>{{ $data->coffee == 'yes' ? 'Available' : 'Not available' }}</th>
                                </tr>
                                <tr>
                                    <td class="bg-light"><i class="fa fa-leaf"></i> Toilet</td>
                                    <th>{{ $data->toilet == 'yes' ? 'Available' : 'Not available' }}</th>
                                </tr>
                                    <td class="bg-light"><i class="fa fa-television"></i> Projector</td>
                                    <th>{{ $data->projector == 'yes' ? 'Available' : 'Not available' }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
