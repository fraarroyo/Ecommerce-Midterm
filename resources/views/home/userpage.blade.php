<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Lazhopee</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      @if(session()->has('message'))

   <div class="alert alert-success">

   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
   {{session()->get('message')}}
   </div>

   @endif 
      <div class="hero_area">
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.arival')
      <!-- end product section -->
    <div style="text-align:center; padding-bottom:20px;">  
      <div>
         <h1 style="font-size: 40px; text-align:center; padding-top:20px; font-weight:bolder; color:#002147;">Comments</h1>
      </div>
      <form action="">
         <textarea style="height: 150px; width:600px;" placeholder="Your comment here..."></textarea><br>
         <a href="" class="btn btn-primary" style="align-items:center;">Send Comment</a>
      </form>
    </div>
   <div style="padding-left: 25%;">
      <div>
         <h1 style="font-size: 30px; padding-bottom: 20px; font-weight:bolder; color:#002147; padding-top:20px;">All Comments</h1>

      </div>
    
   
    <div>
         <b>Francis</b>
         <p>comment</p>

         <a class="btn btn-primary" href="javascript::void(0);">Reply</a>
      </div>
      <br>
      <div>
         <textarea style="height: 150px; width:600px;" placeholder="Reply Here..."></textarea>
      </div>
      <a class="btn btn-primary" href="javascript::void(0);">Reply</a>
   </div>
   </div>
      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->

     

      @include('home.client')
      <!-- end client section -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>