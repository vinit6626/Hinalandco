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
              <form class="form-horizontal" method="get" action="{{url('/site/')}}">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Site No. or Name</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="site_name" id="inputEmail3" value="{{isset($odata) ? $odata->site_name : ''}}" placeholder="Search Machine No. or Site Name Ex:-14">
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Operator Name</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="operator_name" id="inputEmail3" value="{{isset($odata) ? $odata->operator_name : ''}}" placeholder="Search Operator Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Client / Company Name </label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="client_name" id="inputEmail3" value="{{isset($odata) ? $odata->client_name : ''}}" placeholder="Search Client Name">
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
        <li><a href="#">Site</a></li>
        <li class="active">Site Details</li>
      </ol>
</section>
<section class="content-header">
<br>
<div class="row">
	<div class="col-md-12">
    	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Site Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          <form method="post" action="{{url('/site/status')}}" >
            @csrf
              <button type="submit" class="btn btn-primary" name="Action" value="Active" style="margin: 3px">Active</button>
              <button type="submit" class="btn btn-warning" name="Action" value="Deactive" style="margin: 3px">Deactive</button>
              <button type="submit" class="btn btn-danger" name="Action" value="Delete" style="margin: 3px">Delete</button>
              <div class="table-responsive">
              <table class="table table-striped table-bordered " >
                <tr>
                  <th><input type="checkbox" id="CheckAll"></th>
                  <th>Name</th>
                  <th>Operator Name</th>
                  <th>Company Name</th>
                  <th>Contractor Name</th>
                  <th>Status</th>
                  <th>Register At</th>
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
    <td><input type="checkbox" name="all_id[]" value="{{$value->site_id}}" class="check"></td>
  </form>
  
    <td>{{$value->site_name}}</td>
    <td>{{$value->operator_name}}</td>
    <td>{{$value->client_name}}</td>
    <td>{{$value->contractor_name}}</td>
    <td>
      @if($value->status === 1) 
      <span class="label label-success">Active</span>
      @else
      <span class="label label-danger">Deactive</span>

      @endif
     </td>
    <td>{{date('d-m-Y ', strtotime($value->created_at))}}</td>

    <th>
			<form action="{{url('/site/'.$value->site_id)}}" method="post">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
			<br>
    </th>
    <th>
     <a href="{{url('site/'.$value->site_id.'/edit')}}">
        <!-- <button class="btn btn-primary" type="button"> </button>  -->
             <input type="button" class="btn btn-primary" value="update" >
    </a>
     </th>
                
	</tr>
@endforeach
@endif

                  
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

