@extends('layouts.admin')
  
@section('content')

<div class="content-wrapper">
<br>
<section class="content-header">

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Portfolio</a></li>
        <li class="active">Portfolio Details</li>
      </ol>
</section>
<section class="content-header">
<br>
<div class="row">
	<div class="col-md-12">
    	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Portfolio Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           <div class="table-responsive">
              <table class="table table-striped table-bordered " >
                <tr>
                  <th>Year of Excellence</th>
                  <th>Projects Completed</th>
                  <th>Really Happy Clients</th>
                  <th>Cups of Coffee Taken</th>
                  <th>Number of Equipments</th>
                  <th>Action</th>
                </tr>

@if (count($data) === 0)
    <tr>
    	<td colspan="9" style="text-align: center;">no data found</td>
    </tr>
@else
@foreach($data as $value)
	<tr>
		<td>{{$value->year_of_excellence}}</td>
    <td>{{$value->projects_completed}}</td>
		<td>{{$value->really_happy_clients}}</td>
    <td>{{$value->cups_of_coffee_taken}}</td>
    <td>{{$value->number_of_equipments}}</td>
    <th>
     <a href="{{url('portfolio/'.$value->portfolio_id.'/edit')}}">
             <input type="button" class="btn btn-primary" value="update" >
    </a>
     </th>
	</tr>
@endforeach
@endif
                
              </table>
              <center>
              </center>
            </div>
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

