@extends('layouts.default')
@section('page.title', 'My Account')

@section('content')
<div class="account-container height-fixer mx-auto py-md-5 py-3 mb-5">
    <div class="row">
        <div class="col-md-2">
            @include('partially.nav.account')
        </div>
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header">
                    <a href="{{ URL::previous() }}" class="btn btn-secondary btn-sm mr-md-2">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <b>Detail booking:</b> {{ $data->number }}
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
