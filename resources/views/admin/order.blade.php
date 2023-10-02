<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
            
        .table{
            border: solid white;
            
        }
        

    </style>
  </head>

  <body>
    
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.partial')
      <!-- partial -->
      @include('admin.navbar')
      <div class="main-panel">
            <div class="content-wrapper">
            
            <h1 class="top">
               <h1 style="background-color: aqua; color: black; font-size:50px; text-align:center; border: 3px solid white;">All Orders</h1>
               <div style="padding-left:690px; padding-bottom: 30px;">

               

               <form action="{{url('search')}}" method="get">
                <input style="color:black;" type="text" name="search" placeholder="Search an item">
                <input type="submit" value="Search" class="btn btn-primary">

               </form>
               </div> 
               
               <table class="table">
                    <tr class="th">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Order Status</th>

                    </tr>
                    @forelse($order as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img src="/product/{{$order->image}}" alt="">
                        </td>
                        <td>

                        @if($order->delivery_status=='processing')    

                            <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are You Sure this Product is Delivered?')" class="btn btn-primary">Delivered</a>

                        @elseif($order->delivery_status=='Order Cancelled') 
                            <p>Cancelled</p>
                        
                        @else

                        <p style="color: green;">Delivered</p>

                        @endif
                        </td>
                          
                        <td>
                        @if($order->delivery_status=='delivered')
                            <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print</a>
                        
                        @elseif($order->delivery_status=='processing')
                        <p style="color: red;"> Please wait for the order to be delivered</p>
                        @else
                            <p>Delvery Cancelled</p>
                        @endif
                        </td>
                    </tr>
                        @empty
                        <tr>

                            <td colspan="16" style="text-align: center;">No Data Found</td>

                        </tr>
                    @endforelse
                </table>
            </h1>
            </div>
      </div>
      
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>admin/