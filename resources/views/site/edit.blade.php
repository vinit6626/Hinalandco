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
        <li><a href="#">Site</a></li>
        <li class="active">Update Site</li>
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
              <h3 class="box-title">Update Site Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('site/'.$data->site_id)}}" >

              @csrf
              @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Machine Number & Side Name <sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="site_name" id="name" placeholder="Machine No. And Site Location. Ex:- ''14 - Surat,Gujarat'' " value="{{$data->site_name}}">
                @error('site_name')
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