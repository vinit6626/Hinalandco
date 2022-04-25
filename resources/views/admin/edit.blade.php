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
        <li class="active">Edit Admin</li>
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
              <h3 class="box-title">Edit Admin Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('/hadmin/'.$data->id)}}" enctype= multipart/form-data>
              @csrf
              @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Name<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="name" value="{{$data->name}}" id="name" >
                  @error('name')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" value="{{$data->email}}" id="exampleInputEmail1"  disabled >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="password" class="form-control" name="password" value="{{$data->password}}" id="exampleInputPassword1" >
                    @error('password')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword2">Contact No.<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="mobile" value="{{$data->mobile}}" id="exampleInputPassword2" >
                  @error('mobile')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                
                </div>
                  <div class="form-group">
                <label>Gender</label>
                <br>
                    <label class="radio-inline">
                      <input type="radio" name="gender" id="optionsRadios1" value="Male" {{($data->gender == "Male") ?'checked' : ''}}>
                      Male
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="gender" id="optionsRadios2" value="Female" {{($data->gender == "Female") ?'checked' : ''}}>
                      Female
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="gender" id="optionsRadios3" value="Other" {{($data->gender == "Other") ?'checked' : ''}}>
                      Other
                    </label>
                </div>

  <!--   <div class="form-group">
          <br>
           <label>Current Profile: </label>

        <?php if (!(empty($data->admin_profile))) {?>
              <img src="{{asset('storage/'.$data->admin_profile)}}" class="img-rounded" width="150">
        <?php } else{?>
              <img src="{{asset('img/user.png')}}" class="img-rounded" width="100">
        <?php }?>
        <br>
        <label for="profile">Select new profile</label>
              <input type="file" name="operator_profile"  value="{{old('operator_profile')}}">
        </div>
   -->        
               <div class="form-group">
                  <label for="desc">Description</label>
                  <input type="text" class="form-control" name="admin_description" value="{{$data->admin_description}}" id="Description" >
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