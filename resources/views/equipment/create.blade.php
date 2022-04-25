@extends('layouts.admin')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Equipment Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Equipment</a></li>
        <li class="active">Add Equipment</li>
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
              <h3 class="box-title">Insert Equipment Data</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('/equipment')}}" enctype= "multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Equipment Name<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="equipment_name" id="name" placeholder="Enter Equipment Name Ex:- Hitachi">
                 @error('equipment_name')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Equipment Model<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="equipment_model" id="name" placeholder="Enter Equipment Model Ex- Hitachi 210 Ex">
                   @error('equipment_model')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputEmail1">No. of Equipment<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="total_equipment" id="exampleInputEmail1" placeholder="Enter Total Equipment Ex:- 35">
                   @error('total_equipment')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Position<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="position" id="exampleInputEmail1" placeholder="Position For Table Ex:- 1 To n.; (Before Enter Position Plz Check Last Position)">
                   @error('position')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
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