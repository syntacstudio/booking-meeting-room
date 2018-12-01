@extends('layouts.default')
@section('page.title', 'My Account')

@section('content')
<div class="account-container mx-auto py-md-5 py-3 mb-5">
    <div class="row">
        <div class="col-md-2">
            @include('partially.nav.account')
        </div>
        <div class="col-md-10">
            <div class="card shadow mb-3">
                <div class="card-header">
                    Profile
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="{{ $customer->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" value="{{ $customer->email }}" disabled>
                    </div>
                    <div class="text-right">
                        <a href="#" class="btn btn-secondary">Edit Profile</a>
                    </div>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-12">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" value="*******" disabled>
                        </div>
                        <div class="col-md-3">
                            <button id="change-password" class="btn btn-block btn-secondary">Change</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
