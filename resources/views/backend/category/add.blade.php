@extends('backend.index')

@section('controller','Category - Add')
@section('home','Category')
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
	      		<form action="{{ route('v1.category.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	      			@csrf
	      			<div class="row">
			          	<div class="col-md-12">
				            <div class="form-group">
				              <label>Name</label>
				              <input type="text" name="name" id="">
				            </div>
				            <div class="form-group">
				              <label>Description</label>
				              <textarea class="textarea" placeholder="Place some text here"
                          		name="description"></textarea>
				            </div>
				            <div class="form-group">
				              <label>Image</label>
				              <input type="file" name="image" id="">
				            </div>
				            <div class="form-group">
				              <label>Link</label>
				              <input type="text" name="link" id="">
				            </div>
				            <div class="form-group">
                                <label class="control-label col-md-3">Trạng thái <span class="required"> * </span></label>
                                <div class="col-md-4">
                                    <div class="radio-list">
                                        <label><input type="radio" name="is_active" value="0"/>Không hoạt động</label>
                                        <label><input type="radio" name="is_active" value="1" checked="checked" />Hoạt động</label>
                                    </div>
                                </div>
                            </div>
				            <div class="form-group">
				              <button type="submit" class="btn btn-success">Save</button>
				              <a href="" class="btn btn-danger">Cancel</a>
				            </div>
			          	</div>
		        	</div>
	      		</form>
	      	</div>
	    </div>
     </div>
</section>
@endsection