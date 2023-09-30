<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
    .center{
        border: 3px solid white;
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
            <h1 class="top">
               <h1 style="background-color: aqua; color: black; font-size:50px; text-align:center; border: 3px solid white;">All Orders</h1>
                <table class="table">
                    <tr class="th" style="border: solid white;">
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Product Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
                        
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
                        <img src="/product/{{$product->image}}" alt="">
                        </td>
                        <td><a onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</a></td>
                        <td><a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a></td>
                        
                    </tr>
                    @endforeach
                </table>
            </h1>
            </div>
        </div>
        
    
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>
