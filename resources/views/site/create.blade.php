@extends('layouts.admin')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Site Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Site</a></li>
        <li class="active">Add Site</li>
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
              <h3 class="box-title">Insert Site Data</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('/site')}}" enctype= multipart/form-data>
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Machine Number & Operator Name<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="site_name" id="name" placeholder="Machine No. And Site Location. Ex:- ''14 - Surat,Gujarat'' ">
                   @error('site_name')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Operator Name<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <select name="operator_name" class="form-control">
                    <option value="-1">Select Operator Name</option>
                    @foreach($opname as $data)
                      <option value="{{$data->id}}">{{$data->o_name}}</option>
                    @endforeach
                  </select>
                   @error('operator_name')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Client Name/Company Name<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="client_name" id="name" placeholder="Ex:- ''Adani,Surat'' ">
                   @error('client_name')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Contrater Name<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="text" class="form-control" name="contractor_name" id="name" placeholder="Ex:- ''Patel Sir'' ">
                   @error('contractor_name')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
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