@extends('layouts.user')

@section('custom_css')
<meta charset="utf-8">
<meta name="description" content="contact hinal and co.">
<meta name="keyword" content="hina and co., hinal, hinal sale, hnl, h&c, handc, about, contact, email, address, mobile, location, firms,hinal and co., hinal Sales,HNL, HNL International, sakti Engineering, earthmoving,hitachi, equipment, Excavator, rock braker, loader, project, construction, surat,guajarat, Kamrej, heavy equipment">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style>
    .google-maps {
        position: relative;
        padding-bottom: 70%; // This is the aspect ratio
        overflow: hidden;
    }
    .google-maps iframe {
        position: absolute;
        width: 100% !important;
     
    }
</style>
@endsection

@section('content')


        <!--================Contact Area =================-->
        <section class="container">
        	<center><h1>Contact us</h1></center>
            <div class="container">
                <div id="mapBox" class="mapBox" 
                    data-lat="40.701083" 
                    data-lon="-74.1522848" 
                    data-zoom="13" 
                    data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
                    data-mlat="40.701083"
                    data-mlon="-74.1522848" >
                    <div class="google-maps">
                    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.147778461815!2d72.96158411441137!3d21.265617185027203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0469a13749ee9%3A0x2f985b2909f6c153!2sHINAL+%26+CO.!5e0!3m2!1sen!2sin!4v1564829225954!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen ></iframe>
					</div>

                </div>
                
                <div class="row">
                    <div class="col-lg-3">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="lnr lnr-home"></i>
                                <h6>Hinal & co.</h6>
                                <p>87-88, Sai industry, Navagam, Kamrej, Surat, Gujarat</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-phone-handset"></i>
                                <h6><a href="#">+91 98242-93248</a></h6>
                                <h6><a href="#">+91 97237-08061</a></h6>
                                <p>Everyday 9 am to 10 pm</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope"></i>
                                <h6><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=hinal_and_co@yahoo.com" target="_blank">hinal_and_co@yahoo.com</a></h6>
                                <p>Send us your query anytime!</p>
</div>
                            <div class="info_item">
                            
                                <h6><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=hnlinterational123@gmail.com" target="_blank">hnlinterational123@gmail.com</a></h6>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                     
                        <form name="myForm" class="row contact_form" action="{{url('/contact')}}"  method="post" id="contactForm" novalidate="novalidate" enctype= "multipart/form-data" onsubmit="return validateForm()">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="client_name" placeholder="Enter your name">
                                    @error('client_name')
                                       <span class="text-danger">{{$message}}</span>
                                    @enderror
               
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="client_email" placeholder="Enter email address">
                                     @error('client_email')
                                       <span class="text-danger">{{$message}}</span>
                                    @enderror
               
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact" name="client_contact" placeholder="Enter Contact Number">
                                    @error('client_contact')
                                       <span class="text-danger">{{$message}}</span>
                                    @enderror
               
                                </div>

                                <div class="form-group">
                                	<div class="form-select" id="default-select">
	                                    	
	                                    <select class="form-control" name="company_name">
	                                    	<option>Hinal and co.</option>
	                                    	<option>Hinal Sales HNL International</option>
	                                    	<option>Shakti Engineering</option>
	                                    </select>
                                	</div>
                                    @error('company_name')
                                       <span class="text-danger">{{$message}}</span>
                                    @enderror
               
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="client_subject" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="client_message" id="message" rows="1" placeholder="Enter Message"></textarea>
                                </div>
                            <p style="color: red;">Plz Fill all the details.</p>
                            </div>
                            <div class="col-md-10">
                                <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                            </div>
                        </form>
                    </div>
                  </div>
<br>

            </div>
        </section>
        <!--================Contact Area =================-->
        

@endsection
@section('custom_js')

<script>
function validateForm() {
  var x = document.forms["myForm"]["client_name"].value;
  var y = document.forms["myForm"]["client_email"].value;
  var z = document.forms["myForm"]["client_contact"].value;
  var c = document.forms["myForm"]["company_name"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
  else if (y == "") {
   alert("Enter Valid Email");
    return false; 
  }
  else if (z == "") {
    alert("Please Enter Your Number");
    return false; 
  }
  else if (c == "") {
    alert("Select Company Name");
    return false; 
  }
}
</script>

@endsection
