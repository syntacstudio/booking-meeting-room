@extends('layouts.default')
@section('page.title', 'My Account')

@section('content')
@include('partially.loading')
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
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editProfile">
                          Edit Profile
                        </button>
                    </div>
                </div>
            </div>

            <div class="card shadow" id="password-wrapper">
                <div class="card-body">
                    <div id="preview-password" class="form-group row">
                        <label class="col-md-12">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" value="*******" disabled>
                        </div>
                        <div class="col-md-3">
                            <button id="start-change-password" class="btn btn-block btn-secondary">Change</button>
                        </div>
                    </div>
                    <form id="change-password" style="display:none">
                        @csrf
                        <div  class="form-group row">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-7 pr-md-0">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Enter your new password">
                                <span class="invalid-feedback" id="password-feedback">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="col-md-3 pr-md-0">
                                <button type="submit" class="btn btn-block btn-primary">Save changes</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="cancel-pwd" class="btn btn-block btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="edit-profile">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ $customer->name }}" placeholder="Your Full Name">
                    <span class="invalid-feedback" id="name-feedback">
                        <strong></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $customer->email }}" placeholder="name@domain.com">
                    <span class="invalid-feedback" id="email-feedback">
                        <strong></strong>
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
  </div>
</div>
<!-- end Modal -->
@endsection
