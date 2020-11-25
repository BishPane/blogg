@extends('admin/layout.layout')

@section('page_title','Post Listing')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>Post</h4>
			<h2><a href="/admin/post/add" class="btn btn-info">Add Post</a></h2>
			<div class="flash-msg">	{{session('msg')}}</div>
		 </div>
	  </div>
	  <div class="clearfix"></div>
	  <div class="row">
		 <div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
			   <div class="x_content">
				  <div class="row">
					 <div class="col-sm-12">
						<div class="card-box table-responsive">
						   <table id="datatable" class="table table-striped table-bordered" style="width:100%">
							  <thead>
								 <tr>
									<th>S.No</th>
									<th>Title</th>
									<th>Short Desc</th>
									<th>Image</th>
									<th>Date</th>
									<th>Action</th>
								 </tr>
							  </thead>
							  <tbody>
							  	@foreach($result as $list)
								 <tr>
									<td>{{$list->id}}</td>
									<td>{{$list->title}}</td>
									<td>{{$list->short_desc}}</td>
									<td><img src="{{asset('storage/post/'.$list->image)}}"	height="100px" width="100px" alt="IMG"></td>
									<td>{{$list->post_date}}</td>
									<td>
										<a class="btn btn-danger" href="{{url('admin/post/delete/'.$list->id)}}">Delete</a>
										<a class="btn btn-info" href="{{url('admin/post/edit/'.$list->id)}}">Edit</a>

									</td>
								 </tr>
								 @endforeach
								 
							  </tbody>
						   </table>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>
@endsection