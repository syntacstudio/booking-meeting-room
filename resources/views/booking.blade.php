@extends('layouts.default')
@section('page.title', 'Booking: '. $data->name)

@section('content')
@include('partially.loading')
<div id="booking-room">
    <div class="container py-5 mb-md-5">

      <form id="booking-form" data-room="{{ $data->permalink }}">
        @csrf

        <div class="booking-alert"></div>
    	<div class="row">
            <div class="col-md-8">
                <p class="h4 mb-3">Booking meeting room:</p>
                <div class="card p-3">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('storage/rooms/'. $data->image) }}" class="img-thumbnail">
                        </div>
                        <div class="col-md-9">
                            <h1 class="h4 mb-1">{{ $data->name }}</h1>
                            <p class="text-muted mb-1">{{ $data->location }}</p>

                            <p class="mb-0">{{ str_limit($data->description, 135, '...') }}</p>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        Booking Details
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $customer->name }}" placeholder="Your Full Name">
                            <span class="invalid-feedback" id="name-feedback">
                                <strong></strong>
                            </span>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="date">Date of Meeting</label>
                                <input id="date" type="date" min='{{ date('Y-m-d') }}' class="form-control" name="date" value="{{ date('Y-m-d') }}" placeholder="Date of Meeting">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="day">Number of Day</label>
                                <input id="day" type="number" min="1" class="form-control" name="day" value="1" placeholder="Date">
                            </div>
                            <div class="form-group col-md-12">
                                <span class="invalid-feedback" id="day-feedback"><strong></strong>
                                <span class="invalid-feedback" id="date-feedback"><strong></strong></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Note</label>
                            <textarea name="note" rows="3" id="note" class="form-control" placeholder="Your note. (Optional)">{{ old('note') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <p class="h4 mb-3">Order Summary:</p>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center pb-2">
                            <span>Price per day</span>
                            <b>$<span id="price" data-price="{{ $data->price }}">{{ $data->price }}</span></b>
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mt-2">
                            <span>Number of days</span>
                            <span><span id="num-days" class="font-weight-bold">1</span> day</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="h5 mb-0 font-weight-bold">Total</span>
                            <span class="h5 mb-0 font-weight-bold">
                                $<span id="total">{{ $data->price }}</span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3 row">
                    <div class="col-md-8">
                        <img class="w-100 mt-1" src="{{ asset('/images/credit-cards.png') }}">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-block btn-primary">PAY NOW</button>
                    </div>
                </div>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection
