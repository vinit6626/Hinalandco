<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{asset('img/11.png')}}" type="image/png">
        <title>Hinal And Co.</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/lightbox/simpleLightbox.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/nice-select/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/animate-css/animate.css')}}">
        <!-- main css -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

        <!--================For Slider =================-->

  <!-- <link rel="stylesheet" href="{{asset('files/css/style.css')}}"> -->
  <link rel="stylesheet" href="{{asset('files/css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('files/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('files/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('files/rs-plugin/css/settings.css')}}">

        <!--================For slider =================-->
@yield('custom_css')
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="top_menu row m0">
                <div class="container">
                    <div class="float-left">

                        <b style="color: gray;" title="For inquiry"> 
                            <i class="fa fa-phone"> </i>&nbsp;&nbsp;+91 99097-80517

                        </b>

                        <!-- <ul class="list header_social">
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook">Face</i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-behance"></i>
                                </a>
                            </li>
                        </ul> -->
                    </div>
                    <div class="float-right">
                        
                        <b style="color: gray;">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; 87-88, Sai Industry, Navagam, Kamrej, Surat, Gujarat 
                        </b>
                        <!-- <select class="lan_pack">
                            <option value="1">English</option>
                            <option value="1">Bangla</option>
                            <option value="1">Indian</option>
                            <option value="1">Aus</option>
                        </select>
                        <a class="dn_btn" href="#">Free Quote!</a> -->
                    </div>
                </div>  
            </div>  
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a class="navbar-brand logo_h" href="{{url('/home')}}"><img src="{{asset('img/13.png')}}" alt="" height="45"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/home')}}">Home</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/cprofile')}}">Profile</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/cequipment')}}">Equipment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/about')}}">About us</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{url('/contact')}}">Contact</a></li>
                            </ul>
                        </div> 
                    </div>
                </nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->

<!--================Content Area Start =================-->
@yield('content')

<!--================Content Area End =================-->


        <!--================ start footer Area  =================-->    
        <footer class="footer-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget ab_wd">
                            <i class="fa fa-map-marker" aria-hidden="true">&nbsp;&nbsp;Hinal And Co.</i>
                            
                                    <p>87-88, Sai Industry, Navagam, Kamrej, Surat, Gujarat</p>
                                
                        <br>
                            <i class="fa fa-envelope-o" aria-hidden="true"> </i>
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=hinal_and_co@yahoo.com" target="_blank">&nbsp;hinal_and_co@yahoo.com
                                </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6 offset-lg-1">

                    <!-- <div class="col-lg-3 col-md-6 col-sm-6"> -->
                        <div class="single-footer-widget contact_wd">
                            <h6 class="footer_title">Contact Us</h6>
                            
                            <table cellpadding="3"  >
                                <tr>
                                    <td><a href="tel:+9198242-93248">Nareshbhai Dabhi</a>
                                    </td>
                                     <td><a href="tel:+9198242-93248">98242-93248</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                     <a href="tel: +9197237-08061">Rohitbhai Dabhi</a>               
                                    </td>
                                    <td>
                                    <a href="tel: +9197237-08061">97237-08061</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="tel:+9199097-80517">Pratikbhai Dabhi </a>
                                    </td>
                                    <td>
                                        <a href="tel:+9199097-80517">99097-80517</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>      
                    <div class="col-lg-3 col-md-6 col-sm-6">

                    <!-- <div class="col-lg-5 col-md-6 col-sm-6 offset-lg-1"> -->
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Get in Touch</h6>
                            <div class="box-body">
                                
              <form  method="post" action="{{url('/getintouch')}}">
                @csrf

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email_address"  id="inputEmail3" placeholder="Enter Email Address " required />
                    <br>
                    <center>
                     <button type="submit" class="btn btn-info">Search</button>
                    </center>
                  </div>
               
            </form>
            </div>
            
                        </div>
                    </div>
                </div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-md-8 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    
                </div>
<center>
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Hinal and co. All rights reserved.
</center> 
            </div>
        </footer>
        <!--================ End footer Area  =================-->
        


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('js/popper.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/stellar.js')}}"></script>
        <script src="{{asset('vendors/lightbox/simpleLightbox.min.js')}}"></script>
        <script src="{{asset('vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('vendors/isotope/isotope-min.js')}}"></script>
        <script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{asset('vendors/counter-up/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('vendors/counter-up/jquery.counterup.js')}}"></script>
        <script src="{{asset('js/mail-script.js')}}"></script>
        <script src="{{asset('js/theme.js')}}"></script>
  

  <!-- For Slider  -->

        <script type="text/javascript" src="files/js/jquery-1.11.1.min.js"></script>
  <!-- <script type="text/javascript" src="files/js/bootstrap.min.js"></script> -->
  <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script src="files/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="files/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

  <script type="text/javascript" src="files/js/plugins.js"></script>
  <script type="text/javascript" src="files/js/custom.js"></script>
  <!-- For Slider  -->
    @yield('custom_js')
</body>
</html>