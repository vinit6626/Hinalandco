@extends('layouts.operator')
  
@section('content')

<div class="content-wrapper">
<br>
<section class="content-header">
<div class="row">
     
</div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Logsheet</a></li>
        <li class="active">Logsheet Details</li>
      </ol>
</section>
<section class="content-header">
<br>
<div class="row">
	<div class="col-md-12">
    	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Logsheet Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          <form method="post" action="{{url('/ologsheet/status')}}" >
            @csrf
             <p align="right">
              <!-- <button type="submit" class="btn btn-primary" name="Action" value="Active" style="margin: 3px">Verify</button>
              <button type="submit" class="btn btn-warning" name="Action" value="Deactive" style="margin: 3px">Pendding</button> -->
              <button type="submit" class="btn btn-danger" name="Action" value="Delete" style="margin: 3px">Select Data Delete </button>
            </p>
              <div class="table-responsive">
              <table class="table table-striped table-bordered " >
                <tr>
                  <th><input type="checkbox" id="CheckAll"></th>
                  <th>Machine No.</th>
                  <th>Operator</th>
                  <th>Client</th>
                  <th>Contractor</th>
                  <th>Machine Status</th>
                  <th>Starting Time</th>
                  <th>Ending Time</th>
                  <!-- <th>Total Working Hours(H:M:S)</th> -->
                  <th>Diesel</th>
                  <th>Logsheet Photo</th>
                  <th>Status</th>
                  <th>Delete</th>
                  <th>Edit</th>
                </tr>


@if (count($data) === 0)
    <tr>
    	<td colspan="15" style="text-align: center;">no data found</td>
    </tr>
@else
@foreach($data as $value)
	<tr>
    <td><input type="checkbox" name="all_id[]" value="{{$value->logsheet_id}}" class="check"></td>
  </form>
		<td>
      @foreach($site as $s)
      @if($s->site_id == $value->site_id)
        {{$s->site_name}}
      @endif
      @endforeach
    </td>
      
    <td>{{$value->operator_name}}</td>
		<td>{{$value->client_name}}</td>
    <td>{{$value->contractor_name}}</td>
    <td>{{$value->machine_status}}</td>
    
    @if($value->starting_time == ",")
    <td>-</td>
    @else
    <td>{{date('d-m-Y H:i:sA', strtotime($value->starting_time))}}</td>
    @endif

    @if($value->ending_time == ",")
    <td>-</td>
    @else
    <td>{{date('d-m-Y H:i:sA', strtotime($value->ending_time))}}</td>
    @endif
    
    <!-- @if($value->total_time == "00:00:00")
    <td>-</td>
    @else
    <td>{{$value->total_time}}</td>
    @endif
 -->
    @if($value->diesel == "")
    <td>-</td>
    @else
    <td>{{$value->diesel}}</td>
    @endif


		<td>
      @if(!empty($value->logsheet_photo))
        <center>
      <img src="{{asset('logsheet_photo/'.$value->logsheet_photo)}}" class="img-rounded" width="150">
      </center>
      @endif
    </td>
    <td>
      @if($value->status === 1) 
      <span class="label label-success">Verify</span>
      @else
      <span class="label label-danger">Pendding</span>

      @endif
     </td>
		<th>
			<form action="{{url('/ologsheet/'.$value->logsheet_id)}}" method="post">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
			<br>
    </th>
    <th>
     <a href="{{url('ologsheet/'.$value->logsheet_id.'/edit')}}">
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

