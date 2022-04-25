@extends('layouts.user')

@section('custom_css')
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="equipment">
    <meta name="keyword" content="hina and co., hinal, hinal sale, hnl, h&c, handc, Wheel loader, 3 ton, Dozer, 80 hp,165 hp,hyva, 16 ton, AMW, hitachi, tata, Excavator 110, Excavator 200, Excavator 210, Excavator 300,Excavator 350, Excavator with braker, long Stick, roller, tailer, 25 ton, equipment list, about, contact, email, address, mobile, location, firms,hinal and co., hinal Sales,HNL, HNL International, sakti Engineering, earthmoving,hitachi, equipment, Excavator, rock braker, loader, project, construction, surat,guajarat, Kamrej, heavy equipment">

    <title>Hinal And Co.</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('profile/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('profile/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('profile/vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('profile/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('profile/vendors/animate-css/animate.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('profile/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('profile/css/responsive.css')}}">


    <!-- table css  -->

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<style type="text/css">
    .navbar-toggler span{
    background: #fab700;    
    }
    body{
        color :#777777;
    }
    .footer-bottom{
        background: #16191A;
    }
</style>
@endsection

@section('content')

<section class="portfolio_area area-padding" id="portfolio">
    <div class="container">
     <div class="area-heading">
        <h3 class="line">Let's Visit Our Workshop</h3>
        <p>I am sure you will be impressed when you visit our workshop..</p>

    </div>


    <div class="filters-content">
        <div class="row portfolio-grid">
            <div class="grid-sizer col-md-3 col-lg-6"></div>
            <div class="col-lg-6 col-md-6 all following">
                <div class="single_portfolio">
                    <img class="img-fluid w-100" src="{{asset('profile/img/11_1.jpg')}}" alt="">
                    <div class="short_info">
                        <p>Wheel Loader</p>
                        <h4><a href="portfolio-details.html">3 Ton Bucket Capacity</a></h4>                            
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 all latest popular upcoming">
                <div class="single_portfolio">
                    <img class="img-fluid w-100" src="{{asset('profile/img/11_2.jpg')}}" alt="">
                    <div class="short_info">
                        <p>Dozer</p>
                        <h4><a href="portfolio-details.html">80 & 165 HP</a></h4>                            
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 all latest following">
                <div class="single_portfolio">
                    <img class="img-fluid w-100" src="{{asset('profile/img/11_3.jpg')}}" alt="">
                    <div class="short_info">
                        <p>Hyva</p>
                        <h4><a href="portfolio-details.html">16 Ton</a></h4>                            
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 all latest upcoming">
                <div class="single_portfolio">
                    <img class="img-fluid w-100" src="{{asset('profile/img/110.jpg')}}"  alt="">
                    <div class="short_info">
                        <p>Excavator</p>
                        <h4><a href="portfolio-details.html">Tata Hitachi Ex 110</a></h4>                            
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 all latest following">
                <div class="single_portfolio">
                    <img class="img-fluid w-100" src="{{asset('profile/img/200.png')}}" alt="">
                    <div class="short_info">
                        <p>Excavator </p>
                        <h4>Tata Hitachi Ex 200 <a href="portfolio-details.html"></a></h4>                            
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-6 all latest upcoming">
                <div class="single_portfolio">
                    <img class="img-fluid w-100" src="{{asset('profile/img/15.jpg')}}"  alt="">
                    <div class="short_info">
                        <p>Excavator</p>
                        <h4><a href="portfolio-details.html">Tata Hitachi Ex 210</a></h4>                            
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6 all latest upcoming">
                <div class="single_portfolio">
                    <img class="img-fluid w-100" src="{{asset('profile/img/300.jpg')}}"  alt="">
                    <div class="short_info">
                        <p>Excavator</p>
                        <h4><a href="portfolio-details.html">Tata Hitachi Ex 300</a></h4>                            
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 all latest upcoming">
                <div class="single_portfolio">
                    <img class="img-fluid w-100" src="{{asset('profile/img/350.jpg')}}"  alt="">
                    <div class="short_info">
                        <p>Excavator</p>
                        <h4>Tata Hitachi Ex 350</h4>                            
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 all latest upcoming">
                <div class="single_portfolio">
                    <img class="img-fluid w-100" src="{{asset('profile/img/350rock.jpg')}}"  alt="">
                    <div class="short_info">
                        <p>Excavator With Rock Breaker</p>
                        <h4>All Excavator are available with rock breakers.</h4>                            
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 all latest upcoming">
                <div class="single_portfolio">
                    <img class="img-fluid w-100" src="{{asset('profile/img/long.jpg')}}"  alt="">
                    <div class="short_info">
                        <p>Long Stick</p>
                        <h4>Hitachi Ex 200 & 300</h4>                            
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 all latest upcoming">
                <div class="single_portfolio">
                    <img class="img-fluid w-100" src="{{asset('profile/img/vibroroller.jpg')}}"  alt="">
                    <div class="short_info">
                        <p>Vibro Roller</p>
                        <h4>3 & 10 Ton</h4>                            
                    </div>
                </div>
            </div>



            <div class="col-lg-6 col-md-6 all latest upcoming">
                <div class="single_portfolio">
                    <img class="img-fluid w-100" src="{{asset('profile/img/Trailer.jpeg')}}"  alt="">
                    <div class="short_info">
                        <p>Trailer Truck</p>
                        <h4>25 Ton</h4>                            
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</section>


@if (count($data) == 0) {
@else
<div class="container">
 <center>
  <h2>Equipement List</h2>
  </center>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Equipment</th>
        <th>Model</th>
        <th>Number of Equipment</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $value)
      <tr>
        <td>{{$value->position}}</td>
        <td>{{$value->equipment_name}}</td>
        <td>{{$value->equipment_model}}</td>
        <td>{{$value->total_equipment}}</td>
      </tr>
    @endforeach
      
    </tbody>
  </table>
</div>
@endif


@endsection


@section('custom_js')
<script src="{{asset('profile/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('profile/js/popper.js')}}"></script>
<script src="{{asset('profile/js/bootstrap.min.js')}}"></script>
<script src="{{asset('profile/js/stellar.js')}}"></script>
<script src="{{asset('profile/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('profile/vendors/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('profile/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('profile/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('profile/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('profile/js/waypoints.min.js')}}"></script>
<script src="{{asset('profile/js/mail-script.js')}}"></script>
<script src="{{asset('profile/js/contact.js')}}"></script>
<script src="{{asset('profile/js/jquery.form.js')}}"></script>
<script src="{{asset('profile/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('profile/js/mail-script.js')}}"></script>
<script src="{{asset('profile/js/theme.js')}}"></script>

@endsection