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
              <form class="form-horizontal" method="get" action="{{url('/email/')}}">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Email Address</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  name="email_address" id="inputEmail3" value="{{isset($odata) ? $odata->email_address : ''}}" placeholder="Search Client Email">
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
        <li><a href="#">Email</a></li>
        <li class="active">Email Details</li>
      </ol>
</section>
<section class="content-header">
<br>
<div class="row">
	<div class="col-md-12">
    	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Client Email Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

          <form method="post" action="{{url('/email/status')}}" >
            @csrf

@if (session('email'))
  <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{session('email')}}" target="_blank">
        <i class="fa fa-hand-o-right fa-2x" aria-hidden="true" ></i>
        <input type="button" class="btn btn-info" value="Click here to Send Mail" />
        <i class="fa fa-hand-o-left fa-2x" aria-hidden="true"></i>
  </a>
@endif
              <button type="submit" class="btn btn-danger pull-right" name="Action" value="Delete" style="margin: 3px">Multiple Delete</button>
              <button type="submit" class="btn btn-warning pull-right" name="Action" value="Multipleclient" style="margin: 3px">Send Replay To Multiple Client</button>
              <br>  
              <br>  
              <div class="table-responsive">
              <table class="table table-striped table-bordered " >
                <tr>
                  <th><input type="checkbox" id="CheckAll"></th>
                  <th>Client Email</th>
                  <th>Register At</th>
                  <th>Replay</th>
                  <th>Action</th>
                </tr>

@if (count($data) === 0)
    <tr>
    	<td colspan="9" style="text-align: center;">no data found</td>
    </tr>
@else
@foreach($data as $value)
	<tr>
    <td><input type="checkbox" name="all_id[]" value="{{$value->email_id}}" class="check"></td>
  </form>
		<td>{{$value->email_address}}</td>
    <td>{{$value->created_at}}</td>
   
    <td>
      <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{$value->email_address}}" target="_blank">
                                
      <input type="button" class="btn btn-success" value="Send Mail" />
      </a>
    </td>
        
		<th>
			<form action="{{url('/email/'.$value->email_id)}}" method="post">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
			<br>
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

