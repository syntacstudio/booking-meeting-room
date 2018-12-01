@extends('layouts.default')
@section('page.title', 'My Account')

@section('content')
<div class="account-container mx-auto py-md-5 py-3 mb-5">
    <div class="row">
        <div class="col-md-2">
            @include('partially.nav.account')
        </div>
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header">
                    My Bookings
                </div>
                <div class="card-body">
                    <div class="bookings">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Booked at</th>
                                    <th>Room</th>
                                    <th>Meeting date</th>
                                    <th>Day</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <body>
                            @foreach ($bookings as $item)
                                <tr>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->room->name }}</td>
                                    <td>{{ $item->start_date->format('Y/m/d') }}</td>
                                    <td>{{ $item->day }}</td>
                                    <td class="text-center">
                                        <a href="/account/booking/{{ $item->number }}" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </body>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
