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

      <style>
        tr{
            font-size: 20px;
        }
        td{
            font-size: 20px;
        }


      </style>
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
         
         <a><h1 style="color: black; font-size:50px; text-align:center; border: 3px solid white;">Orders</h1></a>
        <table style="border: solid grey">
            <tr>
                <th>Product Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Image</th>
                <th>Action</th>
               
            </tr>
            @foreach($order as $order)
            <tr>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>                   
                <td>{{$order->price}}</td>                   
                <td>{{$order->payment_status}}</td>                   
                <td>{{$order->delivery_status}}</td>
                <td>
                  <img width="100px" src="/product/{{$order->image}}" alt="">
                </td>         
                
                <td>
                  @if($order->delivery_status=='processing')
                  <a href="{{url('cancel_order',$order->id)}}" onclick="confirm('Are You Sure You Want to Cancel Your Order?')" class="btn btn-danger">Cancel Order</a>
                  @elseif($order->delivery_status=='delivered')
                  <p style="color: green;">Done</p>
                  @else
                  <p style="color: red;">Cancelled</p>

                  @endif 
               </td>
            </tr>
            @endforeach
         </table>


        
         
    
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

<style>
   td,th{
      text-align: center;
      border: solid black;
   }
   img{
      width: 250px;
      padding-left: 150px;
   }
</style>