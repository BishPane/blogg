@extends('admin/layout.layout')

@section('page_title','Manage Page')

@section('container')


   <div class="">
                  <div class="page-title">
                     <div class="title_left">
                        <h3>Manage Page</h3>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12 ">
                        <div class="x_panel">
                           <div class="x_content">
                              <br />
                              <form class="form-horizontal form-label-left" method = "POST" action="{{ url('/admin/page/update/'.$result['0']->id) }}" enctype="multipart/form-data">
                              @csrf
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Name</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="text" class="form-control" value="{{ $result['0']->name }}" name="name">
                                    </div>
                                 </div>
                                 @error('name')
                                 <span class="field_error">{{$message}}</span>
                                 @enderror
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Slug</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="slug">{{ $result['0']->slug }}</textarea>
                                    </div>
                                 </div>
                                 @error('slug')
                                 <span class="field_error">{{$message}}</span>
                                 @enderror
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Description</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="description" >{{ $result['0']->description}}</textarea>
                                    </div>
                                 </div>
                                 @error('description')
                                 <span class="field_error">{{$message}}</span>
                                 @enderror
                                 
                                 <div class="ln_solid"></div>
                                 <div class="form-group">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                       <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            

@endsection