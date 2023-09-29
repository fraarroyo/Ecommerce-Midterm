<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        .center{
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
           
            
        }
        .font_size{
            text-align: center;
            font-size: 40px;
            padding: 20px;
        }
        .pro{
            padding: 15px;
            background: aqua;
            color: black;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.partial')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

            @if(session()->has('message'))

            <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
            </div>

            @endif
                <h2 class="font_size">All Products</h2>
                <table class="center">
                    <tr class="prod">
                        <th class="pro">Product Title</th>
                        <th class="pro">Description</th>
                        <th class="pro">Quantity</th>
                        <th class="pro">Category</th>
                        <th class="pro">Price</th>
                        <th class="pro">Discount Price</th>
                        <th class="pro">Product Image</th>
                        <th class="pro">Delete</th>
                        <th class="pro">Edit</th>
                    </tr>

                    @foreach($product as $product)
                    <tr>
                       <td>{{$product->title}}</td>
                       <td>{{$product->description}}</td>
                       <td>{{$product->quantity}}</td>
                       <td>{{$product->category}}</td>
                       <td>{{$product->price}}</td>
                       <td>{{$product->discount_price}}</td>
                       <td>
                        <img src="/product/{{$product->image}}">
                       </td>
                       <td><a onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</a></td>
                       <td><a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a></td>

                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>
