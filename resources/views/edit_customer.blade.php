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
        <div class="col-md-4">
            <form action="{{route('edit_action')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="customer_id" id="customer_id" value="{{$cData->id}}">
                <div class="form-group">
                    <label for="customerName">Customer Name</label>
                    <input type="text" name="customerName" placeholder="Enter customer name" id="customernameid" value="{{$cData->customerName}}"class="form-control">
                    <a href="" style="color: red;">{{$errors->first('customerName')}}</a>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" placeholder="Enter your address" id="address" value="{{$cData->address}}"class="form-control">
                    <a href="" style="color: red;">{{$errors->first('address')}}</a>
                </div>

                <div class="form-group">
                    <label for="address">Organization</label>
                    <input type="text" name="organization" placeholder="Enter your organization name" id="address" value="{{$cData->organization}}"class="form-control">
                    <a href="" style="color: red;">{{$errors->first('organization')}}</a>
                </div>

                <div class="form-group">
                    <label for="address">Email</label>
                    <input type="text" name="email" placeholder="Enter your email" id="email" value="{{$cData->email}}"class="form-control">
                    <a href="" style="color: red;">{{$errors->first('email')}}</a>
                </div>


                <div class="form-group">
                    <label for="address">Mobile Number</label>
                    <input type="text" name="mobileNumber" placeholder="Enter your mobileNumber" id="mobileNumber" value="{{$cData->mobileNumber}}" class="form-control">
                    <a href="" style="color: red;">{{$errors->first('mobileNumber')}}</a>
                </div>

                <div class="form-group">
                    <label for="profilepicture">Profile Picture</label>
                    <input type="file" name="image" placeholder="Choose a file" id="imageId" class="btn btn-default">
                    <a href="" style="color: red;">{{$errors->first('image')}}</a>
                </div>


                <div class="form-group">
                    <button class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit Record</button>
                </div>

            </form>
        </div>

    

    <div class="col-md-4">
        <img src="{{url('lib/images/'.$cData->image)}}" alt="" class="img-responsive thumbnail" style="margin-top: 20px">
    </div>
</div>


@stop