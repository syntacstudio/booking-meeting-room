	@if (\Session::has('warning'))
	    <div class="alert alert-warning alert-dismissible">
	    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	        {!! \Session::get('warning') !!}
	    </div>
	@endif