@extends('layouts.blank')
@section('page.title', 'Invoice:'. $data->number)

@section('content')
<div class="account-container rounded bg-white mx-auto px-5 pt-5 pb-3 mt-5 mb-2 border">
    <div class="d-flex justify-content-between align-items-center">
        <span>
            <p class="h4">{{ config('app.name') }}</p>
            <div class="text-muted">
                Jl. Ciambar No. 15<br>
                Sukabumi, Jawa Barat<br>
                +62 (266) 898-299
            </div>
        </span>

        <span class="h6">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Invoice</th>
                        <td> {{ $data->number }}</td>
                    </tr>
                        <th>Date Created:</th>
                        <td> {{ $data->created_at->format('Y/m/d') }}</td>
                    </tr>
                </tbody>
            </table>
        </span>
    </div>

    <table class="table table-bordered w-50 mt-4">
        <thead>
            <tr>
                <td colspan="2">
                    <b>Billed to</b>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Name</th>
                <td> {{ $data->customer->name }}</td>
            </tr>
                <th>Email:</th>
                <td> {{ $data->customer->email }}</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered mt-5">
        <thead class="thead-light">
            <tr>
                <th>Room</th>
                <th class="text-center">Price / day</th>
                <th class="text-center">Day{{ $data->day > 1 ? 's' : '' }} of Meeting</th>
                <th>Amout</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $data->room->name }}<br>
                    <small class="text-muted">Meeting date: {{ $data->start_date }}</small>
                </td>
                <td class="text-center align-middle">${{ $data->total / $data->day }}</td>
                <td class="text-center align-middle">{{ $data->day }} day{{ $data->day > 1 ? 's' : '' }}</td>
                <td class="align-middle">{{ $data->total }}</td>
            </tr>
            <tr>
                <th colspan="3" class="text-right">Paid with</th>
                <td>Credit Card</td>
            </tr>
            <tr>
                <th colspan="3" class="text-right">Total</th>
                <td>${{ $data->total }}</td>
            </tr>
        </tbody>
    </table>

    <div class="text-center mt-5">
        <p class="mt-5 pt-5">
            Copyright &copy; {{ config('app.name') }}
        </p>
    </div>
</div>

<div class="text-center mb-5" id="print-invoice">
    <button class="btn btn-secondary">Print or Download Invoice</button>  
</div>
@endsection

@section('scripts')
    <style media="print">
        @page {
            size: auto;
            margin: 0;
        }
    </style>
@endsection
