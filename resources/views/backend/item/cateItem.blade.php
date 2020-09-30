@extends('backend.index')

@section('controller','Color')
@section('home','color')
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
	            <h3 class="card-title">Item List</h3>
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
	                  	<th>Title</th>
	                  	<th>link</th>
	                  	<th>Description</th>
	                  	<th>Time Born</th>
	            		<th>Action</th>
	                </tr>
	              </thead>
	              {{-- <tbody>
	              	@foreach($items as $item)
	                <tr>
	                  	<td>{{ $loop->iteration }}</td>
	                  	<td>{{ $item->title }}</td>
	                  	<td>{{ $item->link }}</td>
	                  	<td>{{ $item->description }}</td>
	                  	<td>{{ $item->time_born }}</td>
	                   	<td>
	                   		<a href="" title="" class="btn btn-success">Edit</a>
	                   		<button class="btn btn-danger" data-toggle="modal" data-target="#delete" data-colorid=>
  								Delete
							</button>
	                   	</td>
	                </tr>
	                @endforeach
	              </tbody> --}}
	            </table>
	          </div>

	          {{-- {{ $items->links() }} --}}
	          
				<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  					<div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title text-center" id="exampleModalLabel" style="color: red;">Warning! You are deleting your item.</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <form action="" method="post" accept-charset="utf-8" id="deleteForm">
					      	@csrf
						      <div class="modal-body">
						        <p>Do you want to delete your item?</p>
						        <input type="hidden" name="colorid" id="colorid" value="">
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, not to delete</button>
						        <button type="submit" class="btn btn-primary">Yes, delete</button>
						     </div> 
					      </form>
					    </div>
  					</div>
				</div>
	          <!-- /.card-body -->
	        </div>
	        <!-- /.card -->
	    </div>
	</div>
</section>
@endsection

{{-- @push('script')
<script type="text/javascript">

</script> --}}
