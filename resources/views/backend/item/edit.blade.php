@extends('backend.index')

@section('controller','Color - Edit')
@section('home','Color')
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
	      		<form action="{{ route('v1.item.update',$item->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	      			@csrf
	      			<div class="row">
			          	<div class="col-md-6">
				            <div class="form-group">
			                  <label>Category</label>
			                  <select class="form-control select2" style="width: 100%;" name="category_id">
			                  	@foreach ($categories as $category)
			                  		<option value="{{ $category->id }}">{{ $category->name }}</option>
			                  	@endforeach
			                    
			                  </select>
                			</div>
                			<div class="form-group">
			                  <label>Title</label>
			                  <input type="text" name="name" value="{{ old('name',$item->title) }}" placeholder="">
                			</div>
                			<div class="form-group">
			                  <label>Description</label>
			                  <textarea class="textarea" placeholder="Place some text here"
                          		name="description" value="" />{{ old('description',$item->description) }}</textarea>
                			</div>
                			<div class="form-group">
			                  <label>Link</label>
			                  <input type="text" name="link" value="" placeholder="" value="{{ old('link',$item->link) }}">
                			</div>
                			<div class="form-group">
			                  <label>Time Born</label>
			                  <input type="text" name="time_born" value="" placeholder="">
                			</div>
                			<div class="form-group">
			                  <label>Image</label>
			                  <input type="file" name="image_upload" value="" placeholder="">
                			</div>
                			<div class="form-group">
			                  <label>Image Link</label>
			                  <input type="text" name="image_link" value="{{ old('image_link',$item->link) }}" placeholder="">
                			</div>
                			<div class="form-group">
			                  <label>BK1</label>
			                  <input type="text" name="bk1" value="{{ old('bk1',$item->bk1) }}" placeholder="">
                			</div>
                			<div class="form-group">
			                  <label>BK2</label>
			                  <input type="text" name="bk2" value="{{ old('bk2', $item->bk2) }}" placeholder="">
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