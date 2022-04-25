@extends('layouts.admin')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Admin Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin</a></li>
        <li class="active">Add Admin</li>
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
              <h3 class="box-title">Insert Admin Data</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('/hadmin')}}" enctype= multipart/form-data>
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Name<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="admin_name" id="name" placeholder="Enter name">
                  @error('admin_name')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address<sub style="color: red; font-size: 15px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="email" class="form-control" name="admin_email" id="exampleInputEmail1" placeholder="Enter email">
                  @error('admin_email')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password<sub style="color: red; font-size: 15px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="password" class="form-control" name="admin_password" id="exampleInputPassword1" placeholder="Enter Password">
                  @error('admin_password')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword2">Contact No.<sub style="color: red; font-size: 15px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="admin_mobile" id="exampleInputPassword2" placeholder="Enter Mobile Number" max="10">
                  @error('admin_mobile')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

              <div class="form-group">
                <label>Gender</label>
                <br>
                    <label class="radio-inline">
                      <input type="radio" name="admin_gender" id="optionsRadios1" value="Male" checked>
                      Male
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="admin_gender" id="optionsRadios2" value="Female">
                      Female
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="admin_gender" id="optionsRadios3" value="Other">
                      Other
                    </label>
                </div>
              
              
             <!--  <div class="form-group">
                  <label for="exampleInputFile">Profile</label>
                  <input type="file" name="admin_profile" id="exampleInputFile">
                </div>
 -->
              <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="admin_description" rows="3" placeholder="if you have any other details...(optional)"></textarea>
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