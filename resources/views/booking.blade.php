@extends('layouts.default')
@section('page.title', 'Booking: '. $data->name)

@section('content')
<div id="booking-room">
    <div class="container py-5 mb-md-5">
    	<div class="row mb-md-5">
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
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ?? $customer->name }}" placeholder="Your Full Name">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="date">Date of Meeting</label>
                                <input id="date" type="text" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" placeholder="Date">
                                @if ($errors->has('date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="date">Start at</label>
                                <select name="start_at" class="custom-select {{ $errors->has('start_at') ? ' is-invalid' : '' }}">
                                  <option selected>Start at</option>
                                  <option value="01">01:00</option>
                                  <option value="02">02:00</option>
                                  <option value="03">03:00</option>
                                  <option value="04">04:00</option>
                                  <option value="05">05:00</option>
                                  <option value="06">06:00</option>
                                  <option value="07">07:00</option>
                                  <option value="08">08:00</option>
                                  <option value="09">09:00</option>
                                  <option value="10">10:00</option>
                                  <option value="11">11:00</option>
                                  <option value="12">12:00</option>
                                  <option value="13">13:00</option>
                                  <option value="14">14:00</option>
                                  <option value="15">15:00</option>
                                  <option value="16">16:00</option>
                                  <option value="17">17:00</option>
                                  <option value="18">18:00</option>
                                  <option value="19">19:00</option>
                                  <option value="20">20:00</option>
                                  <option value="21">21:00</option>
                                  <option value="22">22:00</option>
                                  <option value="23">23:00</option>
                                  <option value="24">24:00</option>
                                </select>
                                @if ($errors->has('start_at'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('start_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="date">End at</label>
                                <select name="end_at" class="custom-select {{ $errors->has('end_at') ? ' is-invalid' : '' }}">
                                  <option selected>End at</option>
                                  <option value="01">01:00</option>
                                  <option value="02">02:00</option>
                                  <option value="03">03:00</option>
                                  <option value="04">04:00</option>
                                  <option value="05">05:00</option>
                                  <option value="06">06:00</option>
                                  <option value="07">07:00</option>
                                  <option value="08">08:00</option>
                                  <option value="09">09:00</option>
                                  <option value="10">10:00</option>
                                  <option value="11">11:00</option>
                                  <option value="12">12:00</option>
                                  <option value="13">13:00</option>
                                  <option value="14">14:00</option>
                                  <option value="15">15:00</option>
                                  <option value="16">16:00</option>
                                  <option value="17">17:00</option>
                                  <option value="18">18:00</option>
                                  <option value="19">19:00</option>
                                  <option value="20">20:00</option>
                                  <option value="21">21:00</option>
                                  <option value="22">22:00</option>
                                  <option value="23">23:00</option>
                                  <option value="24">24:00</option>
                                </select>
                                @if ($errors->has('end_at'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('end_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <p class="h4 mb-3">Order Summary:</p>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center pb-2">
                            <span>Price per hour</span>
                            <b>$<span id="price">{{ $data->price }}</span></b>
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mt-2">
                            <span>Number of hours</span>
                            <span id="num-hours" class="font-weight-bold">-</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="h4 mb-0">Total</span>
                            <span id="num-hours" class="h4 mb-0">
                                $<span id="total">{{ $data->price }}</span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-2">
                    <button class="btn btn-lg btn-block btn-primary">PAY NOW</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
