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
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>
