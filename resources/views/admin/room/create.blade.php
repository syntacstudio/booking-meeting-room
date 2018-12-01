@extends('layouts.admin')
@section('page.title', 'Create meeting room')

@section('content')
<div class="container height-fixer">
	<div class="row justify-content-center">
        <div class="col-md-8">
        	<div class="page-header mb-3">
        		<a href="{{ route('admin.rooms') }}" class="btn btn-secondary btn-sm mr-md-2">
        			<i class="fa fa-arrow-left"></i> Back
        		</a>
        		<span class="h5">Create meeting room</span>
        	</div>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.room.store') }}" enctype="multipart/form-data">
				    	@csrf
				        <div class="form-group">
				            <label for="name">Name</label>
				            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Meeting room name">
				            @if ($errors->has('name'))
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $errors->first('name') }}</strong>
				                </span>
				            @endif
				        </div>
				        <div class="form-group">
				            <label for="location">Location</label>
				            <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location') }}" placeholder="Location meeting room">
				            @if ($errors->has('location'))
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $errors->first('location') }}</strong>
				                </span>
				            @endif
				        </div>
				        <div class="form-group">
				            <label for="price">Price per day</label>
				            <div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text">$</span>
							  </div>
							  <input type="number" id="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" placeholder="Price in USD">
							</div>
				            @if ($errors->has('price'))
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $errors->first('price') }}</strong>
				                </span>
				            @endif
				        </div>
				        <div class="form-group">
				            <label for="description">Description</label>
				            <textarea name="description" rows="4" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Description meeting room.">{{ old('description') }}</textarea>
				            @if ($errors->has('description'))
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $errors->first('description') }}</strong>
				                </span>
				            @endif
				        </div>
				        <div class="form-group">
				            <label for="image">Meeting room image</label>
				            <input id="image" type="file" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="image">
				            <small class="text-muted">Maximum upload file size 1 mb</small>
				            @if ($errors->has('image'))
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $errors->first('image') }}</strong>
				                </span>
				            @endif
				        </div>
				        <div class="form-group">
				            <button type="submit" class="btn btn-primary">SUBMIT</button>
				        </div>
				    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
