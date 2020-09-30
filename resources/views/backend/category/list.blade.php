@extends('backend.index')

@section('controller','Category')
@section('home','home')
@section('action','list')

@section('content')

<section class="content">
	@if(Session::has('message'))
		<div class="alert alert-success">
			{{ Session('message') }}
		</div>
	@endif
  	<div class="container-fluid">
	    <div class="row">
	      <div class="col-12">
	        <div class="card">
	          <div class="card-header">
	            <h3 class="card-title">Category List</h3>
	            <div class="card-tools">
	              	<div class="input-group input-group-sm" style="width: 150px;">
	                	<input type="text" name="table_search" class="form-control float-right" placeholder="Search">

	                	<div class="input-group-append">
	                  		<button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
	                	</div>
	              	</div>
	            </div>
	            <a href="" title="" class="btn btn-success" style="margin-left: 500px;">Add</a>
	          </div>
	          <!-- /.card-header -->
	          <div class="card-body table-responsive p-0" style="height: 300px;">
	            <table class="table table-head-fixed text-nowrap">
	              <thead>
	                <tr>
	                  	<th>ID</th>
	                  	<th>Main Category</th>
	                  	<th>Image</th>
	            		<th>Action</th>
	                </tr>
	              </thead>
	              {{-- <tbody>
	              	@foreach($categories as $category)
	                <tr>
	                  	<td>{{ $loop->iteration }}</td>
	                  	<td>{{ $category->name }}</td>
	                  	<td><img src="{{ asset('upload/category/'.$category->image_up) }}" alt="" width="100px;"></td>
	                   	<td>
	                   		<a href="{{ url('storage/app/images/'.$category->image_up) }}" title="" class="btn btn-success">Edit</a>
	                   		<a href="{{ url('admin/category/delete/'.$category->id) }}" title="" class="btn btn-danger">Delete</a>
	                   	</td>
	                </tr>
	                @endforeach
	              </tbody> --}}
	            </table>
	          </div>
	          {{-- {{ $categories->links() }} --}}
	          <!-- /.card-body -->
	        </div>
	        <!-- /.card -->
	    </div>
	</div>
</section>
@endsection 