@extends('layouts.admin')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Portfolio Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Portfolio</a></li>
        <li class="active">Update Portfolio</li>
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
              <h3 class="box-title">Update Portfolio Data</h3>
            </div>
<center><span style="color: red">Plz enter all data in Digits. </span></center>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('portfolio/'.$data->portfolio_id)}}" >

              @csrf
              @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Years of Excellence<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="year_of_excellence" id="name" value="{{$data->year_of_excellence}}"  placeholder="Year of Success">
                   @error('year_of_excellence')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Projects Completed<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="projects_completed" id="name" value="{{$data->projects_completed}}" placeholder="Completed Projects">
                   @error('projects_completed')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Really Happy Clients<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="really_happy_clients" id="exampleInputEmail1" value="{{$data->really_happy_clients}}" placeholder="Number of Happy Clients">
                   @error('really_happy_clients')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Cups of Coffee Taken<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="cups_of_coffee_taken" id="exampleInputEmail1" value="{{$data->cups_of_coffee_taken}}" placeholder="Numbers of Meeting Attended.">
                   @error('cups_of_coffee_taken')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Number of Equipments<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="number_of_equipments" id="exampleInputEmail1" value="{{$data->number_of_equipments}}" placeholder="Total Equipment">
                   @error('number_of_equipments')
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