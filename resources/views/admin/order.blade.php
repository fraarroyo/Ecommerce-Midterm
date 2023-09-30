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
                <table class="table">
                    <tr class="th">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Order Status</th>
                        <th>Print PDF</th>
                    </tr>
                    @foreach($order as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
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

                        @else

                        <p style="color: green;">Delivered</p>

                        @endif
                        </td>
                        <td>
                            <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </h1>
            </div>
      </div>
      
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>admin/