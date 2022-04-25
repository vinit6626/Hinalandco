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
        <li class="active">Add Portfolio</li>
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
              <h3 class="box-title">Insert Portfolio Data</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('portfolio')}}" enctype= multipart/form-data>
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Years of Excellence</label>
                  <input type="text" class="form-control" name="year_of_excellence" id="name" placeholder="Year of Success">
                </div>
                <div class="form-group">
                  <label for="name">Projects Completed</label>
                  <input type="text" class="form-control" name="projects_completed" id="name" placeholder="Completed Projects">
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Really Happy Clients</label>
                  <input type="text" class="form-control" name="really_happy_clients" id="exampleInputEmail1" placeholder="Number of Happy Clients">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Cups of Coffee Taken</label>
                  <input type="text" class="form-control" name="cups_of_coffee_taken" id="exampleInputEmail1" placeholder="Numbers of Meeting Attended.">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Number of Equipments</label>
                  <input type="text" class="form-control" name="number_of_equipments" id="exampleInputEmail1" placeholder="Total Equipment">
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