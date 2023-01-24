@extends('admin.master')

@section('content')
    		<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Blog From</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<h5 class="mb-0">Add Blog</h5>
									</div>
									<hr/>
									<form action="{{route('update.blog')}}" method="POST" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="row mb-3">
                                            <input type="hidden" name="blog_id" value="{{$blog->id}}" >
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Category Name</label>
										<div class="col-sm-9">
                                            <select name="category_id" class="form-control" id="">
												@foreach ($categories as $category )
													<option value="{{ $category['id']}}">{{ $category['category_name']}}</option>
												@endforeach
                                            </select>
										</div>
									</div>
                                     <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Author Name</label>
										<div class="col-sm-9">
                                            <select name="author_id" class="form-control" id="">
												
												@foreach ($authors as $author )
												
													<option value="{{$author['id']}}">{{$author['author_name']}}</option>
												@endforeach    
                                            </select>
										</div>
									</div>
                                     <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Title</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputEnterYourName" placeholder="Enter Your Name" name="title" value="{{$blog->title}}">
										</div>
									</div>
                                      <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Slug</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputEnterYourName" placeholder="Enter Your Name" name="slug" value="{{$blog->slug}}">
										</div>
									</div>
                                     <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Description</label>
										<div class="col-sm-9">
                                            <textarea name="description" class="form-control">{{$blog->description}}</textarea>
										</div>
									</div>
                                      <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Image</label>
										<div class="col-sm-9">
                                            <img width="100" src="{{asset($blog->image_name)}}" alt="" srcset="">
                                            <input type="file" class="form-control mt-2" id="inputEnterYourName" placeholder="Enter Your Name" name="image_name">
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Date</label>
										<div class="col-sm-9">
                                            <input type="date" class="form-control" id="inputEnterYourName" name="date" value="{{$blog->date}}">
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Status</label>
										<div class="col-sm-9">
                                            <input type="radio" checked  id="inputEnterYourName" placeholder="Enter Your Name"name="status" value="1">Publishd
											<input type="radio" id="inputEnterYourName" placeholder="Enter Your Name" name="status" value="0">Unpublishd
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Blog Type</label>
										<div class="col-sm-9">
											 <select name="blog_type" class="form-control" 
											>
                                                <option {{$blog->blog_type=='popular'?'selected':''}} value="popular">popular</option>
                                                <option {{$blog->blog_type=='trending'?'selected':''}} value="trending">Trending</option>
                                                <option {{$blog->blog_type=='latest'?'selected':''}} value="latest">Latest</option>
                                            </select>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-primary px-5">submit</button>
										</div>
									</div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>

@endsection