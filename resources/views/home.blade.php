@extends('layouts.master')
@section('content')

@if(session('success'))

<div class="row">
	<div class="alert-success">
		{{session('success')}}
	</div>
</div>

@endif

<div class="row">
	<div class="col-md-6" align="centre">
		<form style="width: 793px;margin-left: 161px;" action="{{route('submit')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}} 

			<div class="form-group">
				<label for="username">Customer Name</label>
				<input type="text" name="customerName" placeholder="Enter customer name" id="customerNameid" class="form-control">
				<a href="" style="color: red;">{{$errors->first('customerName')}}</a>
			</div>

			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" placeholder="Enter your address" id="address" class="form-control">
				<a href="" style="color: red;">{{$errors->first('address')}}</a>
			</div>

			<div class="form-group">
				<label for="email">Organization</label>
				<input type="text" name="organization" placeholder="Enter your organization name" id="organization" class="form-control">
				<a href="" style="color: red;">{{$errors->first('organization')}}</a>
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" placeholder="Enter email address" id="email" class="form-control">
				<a href="" style="color: red;">{{$errors->first('email')}}</a>
			</div>

			<div class="form-group">
				<label for="email">Mobile number</label>
				<input type="text" name="mobileNumber" placeholder="Enter mobile number" id="mobileNumber" class="form-control">
				<a href="" style="color: red;">{{$errors->first('mobileNumber')}}</a>
			</div>

			<div class="form-group">
				<label for="profilepicture">Image</label>
				<input type="file" name="image" placeholder="Choose a file" id="imageId" class="btn btn-default">
				<a href="" style="color: red;">{{$errors->first('image')}}</a>
			</div>

			

			<div class="form-group">
				<button style="padding-left: 18px;margin-left: 358px" class="btn btn-primary">Submit</button>
			</div>

		</form>
	</div>
	<div class="col-md-12">
		<table class="table table-hover">
			<tr>
				<th>S.No.</th>
				<th>Customer Name</th>
				<th>Address</th>
				<th>Organization</th>
				<th>Email</th>
				<th>Mobile number</th>
				<th>Image</th>
				<th>Created</th>
				

			</tr>
			@foreach($cData as $key=>$customerD)
				<tr>

					<td>{{++$key}}</td>
					<td>{{$customerD->customerName}}</td>
					<td>{{$customerD->address}}</td>
					<td>{{$customerD->organization}}</td>
					<td>{{$customerD->email}}</td>
					<td>{{$customerD->mobileNumber}}</td>
					<td>{{$customerD->image}}</td>
					<td><img src="{{url('lib/images/'.$customerD->image)}}" width="40" height="30" alt="no image"></td>
					
					<td>
						<a href="{{route('edit').'/'.$customerD->id}}}" class="btn btn-primary btn-xs">Edit</a>
					<a href="{{route('delete').'/'.$customerD->id}}}" class="btn btn-danger btn-xs">Delete </a>
				</td>
					
				</tr>
			@endforeach


		</table>
		
		{{--for pagination, if data exceeds too much, adds in a new page--}}



	</div>
</div>


@stop