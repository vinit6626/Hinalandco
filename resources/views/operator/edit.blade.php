 @extends('layouts.admin')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Operator Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Operator</a></li>
        <li class="active">Edit Operator</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Operator Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('/operator/'.$data->id)}}" enctype= multipart/form-data>
              @csrf
              @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Operator Name<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="operator_name" value="{{$data->o_name}}" id="name" >
                   @error('operator_name')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Add By</label>
                  <input type="text" class="form-control" name="admin_id" value="{{$data->name}}" id="exampleInputEmail1" disabled >
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="operator_email" value="{{$data->email}}" id="exampleInputEmail1" disabled >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="password" class="form-control" name="operator_password" value="{{$data->password}}" id="exampleInputPassword1" >
                   @error('operator_password')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword2">Contact No.<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="operator_mobile" value="{{$data->mobile}}" id="exampleInputPassword2" >
                   @error('operator_mobile')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              
                 <div class="form-group">
                  <label for="exampleInputPassword3">Address</label>
                  <input type="text"  class="form-control" name="operator_address" value="{{$data->address}}"  placeholder="Enter Address or State and city" />
                  </div>
              

              <div class="form-group">
					<div class="form-group">
                  <label for="exampleInputFile">Joining Date</label>
                  <input type="date"  class="form-control" name="joining_date" value="{{$data->joining_date}}" />

              </div>


              <div class="form-group">
                  <label for="exampleInputFile">Licence Number</label>
                  <input type="text"  class="form-control" name="licence_number" value="{{$data->licence_number}}"  placeholder="Enter Valid Licence Number" />
                  

              </div>

<!--            <label>Current Profile: </label>

				<?php if (!(empty($data->operator_profile))) {?>
				      <img src="{{asset('storage/'.$data->operator_profile)}}" class="img-rounded" width="150">
				<?php } else{?>
				      <img src="{{asset('img/user.png')}}" class="img-rounded" width="100">
				<?php }?>
				<br>
				<label for="profile">Select new profile</label>
					    <input type="file" name="operator_profile"  value="{{old('operator_profile')}}">
				</div>
	          <div class="form-group">
					<br>
					 <label>Current licenece: </label>

				<?php if (!(empty($data->operator_licence))) {?>
					

				      <img src="{{asset('storage/'.$data->operator_licence)}}" class="img-rounded" width="150">
				<?php } else{?>
				      <img src="{{asset('img/licence.png')}}" class="img-rounded" width="100">
				<?php }?>
 -->				</div>
	
	            
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>

          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  

@endsection