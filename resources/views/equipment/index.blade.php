@extends('layouts.admin')
  
@section('content')


<div class="content-wrapper">
<br>
<section class="content-header">
<div class="row">
        <div class="col-md-6">
          <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">For Searching</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
                 <div class="box-body">
              <form class="form-horizontal" method="get" action="{{url('/hadmin/')}}">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Equipmnet Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="equipment_name" id="inputEmail3" value="{{isset($odata) ? $odata->equipment_name : ''}}" placeholder="Search Equipment">
                  </div>
                </div>
              
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Equipment Model</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="equipment_model" id="inputEmail3" value="{{ isset($odata) ? $odata->equipment_model : ''}}" placeholder=" Search Model" >
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Search</button>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
       <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Equipment</a></li>
        <li class="active">Equipment Details</li>
      </ol>
</section>
<section class="content-header">
<br>
<div class="row">
	<div class="col-md-12">
    	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Equipment Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          <form method="post" action="{{url('/equipment/status')}}" >
            @csrf
              <button type="submit" class="btn btn-primary" name="Action" value="Active" style="margin: 3px">Active</button>
              <button type="submit" class="btn btn-warning" name="Action" value="Deactive" style="margin: 3px">Deactive</button>
              <button type="submit" class="btn btn-danger" name="Action" value="Delete" style="margin: 3px">Delete</button>
              <div class="table-responsive">
              <table class="table table-striped table-bordered " >
                <tr>
                  <th><input type="checkbox" id="CheckAll"></th>
                  <th>Equipment Name</th>
                  <th>Equipment Model</th>
                  <th>No. of Equipment</th>
                  <th>Position in Table</th>
                  <th>Status</th>
                  <th>Delete</th>
                  <th>Edit</th>
                </tr>

@if (count($data) === 0)
    <tr>
    	<td colspan="9" style="text-align: center;">no data found</td>
    </tr>
@else
@foreach($data as $value)
	<tr>
    <td><input type="checkbox" name="all_id[]" value="{{$value->equipment_id}}" class="check"></td>
  </form>
		<td>{{$value->equipment_name}}</td>
    <td>{{$value->equipment_model}}</td>
		<td>{{$value->total_equipment}}</td>
    <td>{{$value->position}}</td>
    <td>
      @if($value->status === 1) 
      <span class="label label-success">Active</span>
      @else
      <span class="label label-danger">Deactive</span>

      @endif
     </td>
		<th>
			<form action="{{url('/equipment/'.$value->equipment_id)}}" method="post">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
			<br>
    </th>
    <th>
     <a href="{{url('equipment/'.$value->equipment_id.'/edit')}}">
        <!-- <button class="btn btn-primary" type="button"> </button>  -->
             <input type="button" class="btn btn-primary" value="update" >
    </a>
     </th>
	</tr>
@endforeach
@endif

                  <!-- 
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td>
                  <td> <span class="badge bg-red"> </span></td> -->
                
                
              </table>
              <center>
              </center>
            </div>
            <!-- /.box-body -->
		</div>
	</div>

</section>
</div>





















<!-- <table border="1" style="border-collapse: collapse;">
	
	<tr>
		<td>id</td>
		<td>name</td>
		<td>email</td>
		<td>gender</td>
		<td>hobby</td>
		<td>dob</td>
		<td>city</td>
		<td>address</td>
		<td>profile</td>
	</tr>
@if (count($data) === 0)
    <tr>
    	<td colspan="10" style="text-align: center;">no data found</td>
    </tr>
@else
@foreach($data as $value)
	<tr>
		<td>{{$value->id}}</td>
		<td>{{$value->name}}</td>
		<td>{{$value->email}}</td>
		<td>{{$value->gender}}</td>
		<td>{{$value->hobby}}</td>
		<td>{{$value->dob}}</td>
		<td>{{$value->city}}</td>
		<td>{{$value->address}}</td>
		<td><img src="{{asset('storage/'.$value->profile)}}" width="100px" ></td>
	</tr>
@endforeach
@endif

</table>
 -->
@endsection

@section('custom_js')
<script type="text/javascript">

    $(document).ready(function(){
        $('#CheckAll').click(function(){
            if($('#CheckAll').is(':checked'))
            {
                $('.check').each(function(){
                    console.log($('.check').prop('checked',true));
                });
            }
            else{
              $('.check').prop('checked',false);
            }
        });
      });

</script>
@endsection

