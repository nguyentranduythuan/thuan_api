@extends('backend.index')

@section('controller','Size - Add')
@section('home','Size')
@section('action','add')

@section('content')
<section class="content">
    <div class="container-fluid">
	    <div class="card card-default">
	    	@if ($errors->any())
        		<div class="alert alert-danger">
	          		<ul>
				        @foreach ($errors->all() as $error)
				           <li>{{ $error }}</li>
				        @endforeach
	          		</ul>
        		</div>
       		@endif
	      	<div class="card-header">
	        	<h3 class="card-title">Add</h3>

		        <div class="card-tools">
		          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
		          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
		        </div>
	      	</div>
	      	<div class="card-body">
	      		<form action="{{ route('admin.size.store') }}" method="post" accept-charset="utf-8">
	      			@csrf
	      			<div class="row">
			          	<div class="col-md-6">
				            <div class="form-group">
				              <label>Name</label>
				              <input type="text" name="name" id="" value="">
				            </div>
				            <div class="form-group">
				              <button type="submit" class="btn btn-success">Save</button>
				              <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Cancel</a>
				            </div>
			          	</div>
		        	</div>
	      		</form>
	      	</div>
	    </div>
     </div>
</section>
@endsection