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
              <form class="form-horizontal" method="get" action="{{url('/operator/')}}">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="operator_name" id="inputEmail3" value="{{isset($odata) ? $odata->operator_name : ''}}" placeholder="Search Operator Name">
                  </div>
                </div>
              
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="operator_email" id="inputEmail3" value="{{ isset($odata) ? $odata->operator_email : ''}}" placeholder=" Search Operator Email" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Contact No.</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="operator_mobile" id="inputEmail3" value="{{ isset($odata) ? $odata->operator_mobile : ''}}" placeholder="Search Operator Contact Number" >
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
        <li><a href="#">Operator</a></li>
        <li class="active">Admin Operator</li>
      </ol>
</section>
<section class="content-header">
<br>
<div class="row">
	<div class="col-md-12">
    	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Operator Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          <form method="post" action="{{url('/operator/status')}}" >
            @csrf
              <button type="submit" class="btn btn-primary" name="Action" value="Active" style="margin: 3px">Active</button>
              <button type="submit" class="btn btn-warning" name="Action" value="Deactive" style="margin: 3px">Deactive</button>
              <button type="submit" class="btn btn-danger" name="Action" value="Delete" style="margin: 3px">Delete</button>
              <div class="table-responsive">
              <table class="table table-striped table-bordered " >
                <tr>
                  <th><input type="checkbox" id="CheckAll"></th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th width="90px">Joining Date</th>
                  <th>Licence</th>
                  <th>Add By</th>
                  <th width="140px">Active At</th>
                  <th>Status</th>
                  <th>Delete</th>
                  <th>Edit</th>
                </tr>

@if (count($data) === 0)
    <tr>
    	<td colspan="12" style="text-align: center;">no data found</td>
    </tr>
@else
@foreach($data as $value)

	<tr>
    <td><input type="checkbox" name="all_id[]" value="{{$value->id}}" class="check"></td>
  </form>
		<td>{{$value->o_name}}</td>
    <td>{{$value->email}}</td>
    <td>{{$value->mobile}}</td>
		<td>{{$value->address}}</td>
		<td> {{date("d/ m/ Y", strtotime($value->joining_date)) }}
    <!-- 
      @if(!empty($value->operator_profile))
      <center>
      <img src="{{asset('storage/'.$value->operator_profile)}}" class="img-rounded" width="150">
      </center>
      @else
      <center>
      <img src="{{asset('img/user.png')}}" class="img-rounded" width="100">
    </center>
      @endif -->

    </td>
    <td>{{$value->licence_number}}
      <!-- @if(!empty($value->operator_licence)) -->
     <!--  <center>
      <img src="{{asset('storage/'.$value->operator_licence)}}" class="img-rounded" width="150">
      </center>
      @else
      <center>
      <img src="{{asset('img/licence.png')}}" class="img-rounded" width="100">
    </center>
      @endif -->
    </td>
    <td>{{$value->name}}</td>

      @if(($value->active_at === "I request you, He is a good man please activate his account.") OR ($value->active_at === "Deactive")) 
    <td>
      {{$value->active_at}}
    </td>
      @else
      <td>{{ date("d/ m/ Y", strtotime($value->active_at)) }}</td>
      @endif

    <td>
      @if($value->status === 1) 
      <span class="label label-success">Active</span>
      @else
      <span class="label label-danger">Deactive</span>

      @endif
     </td>
		<th>
			<form action="{{url('/operator/'.$value->id)}}" method="post">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
			<br>
    </th>
    <th>
     <a href="{{url('operator/'.$value->id.'/edit')}}">
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
                {{$data->links()}}
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

