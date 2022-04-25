@extends('layouts.admin')
  
@section('custom_css')
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 55px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 50px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
@endsection

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
              <form class="form-horizontal" method="get" action="{{url('/logsheet/')}}">
                @csrf
              <div class="box-body">
                <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Site</label>
                  <select name="site_id" class="form-control" style="width: 80%;" id="site_id">
                    <option value="">Select Machine Number</option>
                    @foreach($site as $d)
                    <option value="{{$d->site_id}}">{{$d->site_name}}</option>

                    @endforeach
                  </select>
                  
                </div>
              
                 <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Operator Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="operator_name" id="inputEmail3" value="{{ isset($odata) ? $odata->operator_name : ''}}" placeholder=" Search Operator" >
                  </div>
                </div> -->

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Client</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="client_name" id="inputEmail3" value="{{ isset($odata) ? $odata->client_name : ''}}" placeholder="Search Client" >
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">

                   <input type="radio"  name="machine_status" value="Working" >Working
                  <input type="radio"  name="machine_status" value="Breackdown">Breackdown
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
          <form method="post" action="{{url('/logsheet/status')}}" >
            @csrf
              <button type="submit" class="btn btn-primary" name="Action" value="Active" style="margin: 3px">Verify</button>
              <button type="submit" class="btn btn-warning" name="Action" value="Deactive" style="margin: 3px">Pendding</button>
              <button type="submit" class="btn btn-danger" name="Action" value="Delete" style="margin: 3px">Delete</button>
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
                  <th>Total Time</th>
                  <th>Diesel</th>
                  <th>Logsheet Photo</th>
                  <th>Open Photo</th>
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
    
    @if($value->total_time == "00:00:00")
    <td>-</td>
    @else
    <td>{{$value->total_time}}</td>
    @endif

    @if($value->diesel == "")
    <td>-</td>
    @else
    <td>{{$value->diesel}}</td>
    @endif


		<td>
      @if(!empty($value->logsheet_photo))
        <center>
          <img src="{{asset('logsheets/'.$value->logsheet_photo)}}" id="myImg"   class="img-rounded" width="100">
          
      <!-- <img src="{{asset('logsheets/'.$value->logsheet_photo)}}" class="img-rounded" width="150"> -->
      </center>
      @endif
    </td>
    <td>
                      <form method="post">
                        @csrf
                      <button type="button" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal" data-id = "{{$value->logsheet_id}}">Open image</button>
                      </form>
    </td>
    <td>
      @if($value->status === 1) 
      <span class="label label-success">Verify</span>
      @else
      <span class="label label-danger">Pendding</span>

      @endif
     </td>
		<th>
			<form action="{{url('/logsheet/'.$value->logsheet_id)}}" method="post">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
			<br>
    </th>
    <th>
     <a href="{{url('logsheet/'.$value->logsheet_id.'/edit')}}">
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
<!-- The Modal -->


















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
 <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
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
<script>

$("#myModal").on("show.bs.modal", function(event){

        var button = $(event.relatedTarget);
        // alert(button);
        var titleData = button.data("id");
        // alert(titleData);
             var token = $('input[name=_token]').val();
        // alert(token);

    $.ajax({
        type:'POST',
        url:"{{url('logsheet/model')}}",
        data:{
          pro_id : titleData,
          _token : token

        },
        success:function(res)
        {
          // alert(res);
          $('#log_img').html(res);
          // console.log(res);
        }
       });


    
});


</script>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

@endsection

