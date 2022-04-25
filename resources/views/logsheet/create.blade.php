@extends('layouts.admin')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Logsheet Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Logsheet</a></li>
        <li class="active">Add Logsheet</li>
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
              <h3 class="box-title">Insert Logsheet Data</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('/logsheet')}}" enctype= multipart/form-data>
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Machine Number<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <select name="site_id" class="form-control" id="site_id">
                    <option value="-1">Select Machine Number</option>
                    @foreach($sitedata as $d)
                    <option value="{{$d->site_id}}">{{$d->site_name}}</option>

                    @endforeach
                  </select>
                  @error('site_id')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <div id="operator_name">
                  </div>
                </div>

                <div class="form-group">
                  <label for="name">Machine Status<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="radio"  name="machine_status" value="Working" checked>Working
                  <input type="radio"  name="machine_status" value="Breackdown">Breackdown
                  @error('machine_status')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Strting Time</label>
                </div>
                  <div class="col-sm-6">
                    <input type="date" class="form-control" name="starting_time[]"> 
                  </div>
                  <div class="col-sm-6">
                    <input type="time" class="form-control" name="starting_time[]">
                  </div>
                   <br>
                   <br>

                <div class="form-group">
                  <label for="exampleInputEmail1">Ending Time</label>
                </div>
                  <div class="col-sm-6">
                    <input type="date" class="form-control" name="ending_time[]"> 
                  </div>
                  <div class="col-sm-6">
                    <input type="time" class="form-control" name="ending_time[]">
                  </div>
                   <br>

                <div class="form-group">
                  <label for="exampleInputEmail1">Diesel</label>
                  <input type="text" class="form-control" name="diesel" id="exampleInputEmail1" placeholder="New Diesel Stock">
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Logsheet Photo<sub style="color: red; font-size: 18px; padding: 3px; top: -1px;">*</sub></label>
                  <input type="file" class="form-control" name="logsheet_photo" id="exampleInputEmail1" value="5900000">
                  @error('logsheet_photo')
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
@section('custom_js')
<script type="text/javascript">
    $(document).ready(function(){
      $('#site_id').change(function(){
        var site_id = $(this).val();
        var token = $('input[name=_token]').val();

        $.ajax({
          type: 'POST',
          url: "{{url('logsheet/sub')}}",
          data:{ 
          siteid : site_id,
          _token : token
        },
        success:function(res)
        {
          // alert(res);
          $('#operator_name').html(res);
        }
        });
      });
    });
</script>
@endsection