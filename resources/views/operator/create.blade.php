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
        <li class="active">Add Operator</li>
      </ol>
    </section>

    <!-- Main content -->
        
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" style="box-shadow: 5px 5px 5px grey;">
            
            <div class="box-header with-border">
              <h3 class="box-title">Insert Operator Data</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('/operator')}}" enctype= multipart/form-data>
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Operator Name<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="operator_name" id="name" placeholder="Enter name">
                  @error('operator_name')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Admin Name<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                 <select name="admin_id" class="form-control">
                  <option value="-1">Select Your Name</option>
                  @foreach($admin as $value)
                   <option value="{{$value->id}}">{{$value->name}}</option>
                  @endforeach
                 </select>
                 @error('admin_id')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Email Address<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="email" class="form-control" name="operator_email" id="exampleInputEmail1" placeholder="Enter email">
                  @error('operator_email')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="password" class="form-control" name="operator_password" id="exampleInputPassword1" placeholder="Enter Password">
                  @error('operator_password')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword2">Contact No.<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="operator_mobile" id="exampleInputPassword2" placeholder="Enter Licence Number" >
                  @error('operator_mobile')
                      <span class="text-danger">{{$message}}</span>
                  @enderror

                </div>

                <div class="form-group">
                  <label for="exampleInputPassword3">Address</label>
                  <textarea class="form-control" name="operator_address" rows="3" placeholder="Enter Address or State and city"></textarea>
                  </div>
              
              <div class="form-group">
                  <label for="exampleInputFile">Joining Date</label>
                  <input type="date" name="joining_date" id="exampleInputFile">
              </div>


              <div class="form-group">
                  <label for="exampleInputFile">Licence Number</label>
                  <input type="text" class="form-control" name="operator_licence" id="exampleInputPassword2" placeholder="Enter Licence Number" >

              </div>

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