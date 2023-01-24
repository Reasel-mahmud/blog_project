@extends('admin.master')

@section('content')
    	 <div class="row">
					<div class="col-xl-12 mx-auto">
						<h6 class="mb-0 text-uppercase">Manege Blog</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										
									</div>
									<hr/>
									<div  class="table-responsive">
                          <table id="example" class="table table-striped table-bordered">
                                       <thead>
                                         <tr>
                                            <th>Sl</th>
                                            <th>Category Name</th>
                                            <th>Author Name</th>
											                      <th>Title</th>
                                            <th>Slug</th>
											                      <th>Description</th>
                                            <th>Image</th>
											                      <th>Date</th>
                                            <th>Status</th>
											                      <th>Blog Type</th>
                                            <th>Action</th>
                                        </tr>
                                       </thead>
                                         @php $i=1  @endphp
                                         @foreach ($blogs as $blog )
                                        <tbody>
                                            <tr>

                                            <td>{{$i++}}</td>
                                                <td>{{$blog->category_name}}</td>
                                                <td>{{$blog->author_name}}</td>
                                                <td>{{substr($blog->title,0,5)}}</td>
                                                <td>{{$blog->slug}}</td>
                                                <td>{{substr($blog->description,0,10)}}</td>
                                                <td>
                                                    <img width="80" src="{{asset($blog->image_name)}}" alt="">
                                                </td>
                                                <td>{{$blog->date}}</td>
                                                <td>{{$blog->status ==1 ? 'Publishd':'Unpublishd'}}</td>
                                                <td>{{$blog->blog_type }}</td>
                                                
                                            <td>
                                                <div class=" d-flex">
                                                  <a href="{{route('editBlog',['id'=>$blog->id])}}" class="btn btn-sm btn-info ">Edit</a>
                                               
                                                
                                                  <form action="{{route('blog.delete')}}" method="POST" id="">
                                                    @csrf
                                                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                                    <button type="submit" class="btn btn-sm btn-danger ms-2 me-2" onclick="return confirm('Are you sure Delete This!!')" >Delete</button>
                                                  </form>
                                                  @if ($blog->status ==1)
                                                    <a href="{{route('status',['id'=>$blog->id])}}" class="btn btn-sm btn-success">Publishd</a>
                                                  @else
                                                    <a href="{{route('status',['id'=>$blog->id])}}" class="btn btn-sm btn-warning">Unpublishd</a>
                                                  @endif
                                                  </div>
                                                  
                                            </td>
                                            
                                        </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
@endsection