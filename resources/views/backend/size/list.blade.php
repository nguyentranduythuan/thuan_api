@extends('backend.index')

@section('controller','Size')
@section('home','size')
@section('action','add')

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
	            <h3 class="card-title">Size List</h3>
	            <div class="card-tools">
	              	<div class="input-group input-group-sm" style="width: 150px;">
	                	<input type="text" name="table_search" class="form-control float-right" placeholder="Search">

	                	<div class="input-group-append">
	                  		<button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
	                	</div>
	              	</div>
	            </div>
	            <a href="{{ route('admin.size.create') }}" title="" class="btn btn-success" style="margin-left: 500px;">Add</a>
	          </div>
	          <!-- /.card-header -->
	          <div class="card-body table-responsive p-0" style="height: 300px;">
	            <table class="table table-head-fixed text-nowrap">
	              <thead>
	                <tr>
	                  	<th>ID</th>
	                  	<th>Main Category</th>
	            		<th>Action</th>
	                </tr>
	              </thead>
	              <tbody>
	              	@foreach($sizes as $size)
	                <tr>
	                  	<td>{{ $loop->iteration }}</td>
	                  	<td>{{ $size->name }}</td>
	                   	<td>
	                   		<a href="{{ url('admin/size/edit/'.$size->id) }}" title="" class="btn btn-success">Edit</a>
	                   		<a href="{{ url('admin/size/delete/'.$size->id) }}" title="" class="btn btn-danger">Delete</a>
	                   	</td>
	                </tr>
	                @endforeach
	              </tbody>
	            </table>
	          </div>
	          <!-- /.card-body -->
	        </div>
	        <!-- /.card -->
	    </div>
	</div>
</section>
@endsection 