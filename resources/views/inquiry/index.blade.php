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
              <form class="form-horizontal" method="get" action="{{url('/inquiry/')}}">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Client Name</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="client_name" id="inputEmail3" value="{{isset($odata) ? $odata->client_name : ''}}" placeholder="Search Client Name">
                  </div>
                </div>
              
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Client Contact No.</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="client_contact" id="inputEmail3" value="{{ isset($odata) ? $odata->client_contact : ''}}" placeholder=" Search Client Contact Number" >
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
        <li><a href="#">Inquiry</a></li>
        <li class="active">Inquiry Details</li>
      </ol>
</section>
<section class="content-header">
<br>
<div class="row">
	<div class="col-md-12">
    	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Inquiry Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          <form method="post" action="{{url('/inquiry/status')}}" >
            @csrf
              <button type="submit" class="btn btn-primary" name="Action" value="Completed" style="margin: 3px">Inquiry Completed</button>
              <button type="submit" class="btn btn-warning" name="Action" value="Pending" style="margin: 3px">Pending</button>
              <button type="submit" class="btn btn-danger" name="Action" value="Delete" style="margin: 3px">Delete</button>
              <br>  
              <br>  
              <div class="table-responsive">
              <table class="table table-striped table-bordered " >
                <tr>
                  <th><input type="checkbox" id="CheckAll"></th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact No.</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Comapnay Name</th>
                  <th>Status</th>
                  <th>Delete</th>
                  <th>Replay</th>

                </tr>

@if (count($data) === 0)
    <tr>
    	<td colspan="9" style="text-align: center;">no data found</td>
    </tr>
@else
@foreach($data as $value)
	<tr>
    <td><input type="checkbox" name="all_id[]" value="{{$value->inquiry_id}}" class="check"></td>
  </form>
		<td>{{$value->client_name}}</td>
    <td>{{$value->client_email}}</td>
    <td>{{$value->client_contact}}</td>
    <td>{{$value->client_subject}}</td>
		<td>{{$value->client_message}}</td>
    <td>{{$value->company_name}}</td>
    <td>
      @if($value->status === 1) 
      <span class="label label-primary">Inquiry Completed</span>
      @else
      <span class="label label-warning">Pending</span>

      @endif
     </td>

    <td>
      <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{$value->client_email}}" target="_blank">
                                
      <input type="button" class="btn btn-success" value="Send Mail" />
      </a>
    </td>
        
		<th>
			<form action="{{url('/inquiry/'.$value->inquiry_id)}}" method="post">
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

