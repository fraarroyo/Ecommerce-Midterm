<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
    @include('admin.css')

    <style type=text/css>
    .div_center{
        text-align: center;
        padding-top: 40px;
    }
    .font_size{
        font-size: 40px;
        padding-bottom: 40px;
    }

    .text_color{
        color: black;
        padding: 20px;
    }
    .cat_color{
        color: black;
    }

    label{
        display: inline-block;
        width: 200px;
    }
    .div_design{
        padding-bottom: 15px;
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
            
            <div class="div_center">
                    
                        <h1 class="font_size">Update Products</h1>

                        <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">

                        @csrf
                    <div class="div_design">
                        <label>Product Title</label>
                        <input class="text_color" type="text" name="title" placeholder="Write a title" required value="{{$product->title}}" >
                    </div>
                    <div class="div_design">
                        
                        <label>Product Description</label>
                        <input class="text_color" type="text" name="description" value="{{$product->description}}" placeholder="Write a description" required>
                    </div>
                    <div class="div_design">
                        
                        <label>Product Price</label>
                        <input class="text_color" type="number" name="price" value="{{$product->price}}" placeholder="Price" required>
                    </div>
                    <div class="div_design">
                        
                        <label>Discount Price</label>
                        <input class="text_color" type="number" name="discount_price" value="{{$product->discount_price}}" placeholder="Apply Discount Price">
                    </div>
                    <div class="div_design">
                        
                        <label>Product Quantity</label>
                        <input class="text_color" type="number" name="quantity" min="0" value="{{$product->quantity}}" placeholder="Quantity" required>
                    </div>
                    <div class="div_design">
                        
                        <label>Product Category</label>
                        <select class="cat_color" name="category"  required>
                        <option value="{{$product->category}}">{{$product->category}}</option>
                        @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            
                            @endforeach
                        </select>
                    </div>

                    <div class="div_design">
                    <label>Current Product Image</label>
                       <img height="100" width="100" style="margin:auto;" src="/product/{{$product->image}}" alt="">
                    </div>

                    <div class="div_design">
                    <label>Change Product Image</label>
                        <input type="file" name="image" value="{{$product->image}}">
                    </div>

                    <div class="div_design">
                        <input type="submit" name="submit" value="Update Product" class="btn btn-primary" >
                    </div>
</form>

                </div>
            </div>
        </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>admin/