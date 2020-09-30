@extends('backend.index')

@section('controller','Size - Edit')
@section('home','Size')
@section('action','edit')

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
	        	<h3 class="card-title">Edit</h3>

		        <div class="card-tools">
		          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
		          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
		        </div>
	      	</div>
	      	<div class="card-body">
	      		<form action="{{ route('admin.size.update',$size->id) }}" method="post" accept-charset="utf-8">
	      			@csrf
	      			<div class="row">
			          	<div class="col-md-6">
				            <div class="form-group">
				              <label>Name</label>
				              <input type="text" name="name" id="" value="{{ old('name',$size->name) }}">
				            </div>
				            <div class="form-group">
				              <button type="submit" class="btn btn-success">Save</button>
				              <a href="{{ route('admin.size.index') }}" class="btn btn-danger">Cancel</a>
				            </div>
			          	</div>
		        	</div>
	      		</form>
	      	</div>
	    </div>
     </div>
</section>
@endsection