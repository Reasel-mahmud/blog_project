@extends('admin.master')

@section('content')
    		<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Add Category</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<h5 class="mb-0">Add Category</h5>
									</div>
									<hr/>
									<form action="{{route('new.category')}}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Category Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputEnterYourName" placeholder="Enter Your Name" name="category_name">
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

                {{-- -------------manege---- --}}
                <div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Manege Category</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										
									</div>
									<hr/>
									<table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Sl</th>
                                            <th>ctegory Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                         @php $i=1  @endphp
                                         @foreach ($categoris as $category )
                                        <tr>
                                          
                                             
                                            <td>{{$i++}}</td>
                                           
                                                <td>{{$category->category_name}}</td>
                                                <td>{{$category->status}}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                    </table>
								</div>
							</div>
						</div>
					</div>
				</div>
@endsection