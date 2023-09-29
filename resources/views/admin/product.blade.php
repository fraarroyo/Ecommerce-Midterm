<!DOCTYPE html>
<html lang="en">
  <head>
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
                    
                        <h1 class="font_size">Add Products</h1>

                        <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                    <div class="div_design">
                        <label>Product Title</label>
                        <input class="text_color" type="text" name="title" placeholder="Write a title" required>
                    </div>
                    <div class="div_design">
                        
                        <label>Product Description</label>
                        <input class="text_color" type="text" name="description" placeholder="Write a description" required>
                    </div>
                    <div class="div_design">
                        
                        <label>Product Price</label>
                        <input class="text_color" type="number" name="price" placeholder="Price" required>
                    </div>
                    <div class="div_design">
                        
                        <label>Discount Price</label>
                        <input class="text_color" type="number" name="discount_price" placeholder="Apply Discount Price">
                    </div>
                    <div class="div_design">
                        
                        <label>Product Quantity</label>
                        <input class="text_color" type="number" name="quantity" min="0" placeholder="Quantity" required>
                    </div>
                    <div class="div_design">
                        
                        <label>Product Category</label>
                        <select class="cat_color" name="category" required>
                        <option value="">Add a Category Here</option>
                            @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            
                            @endforeach
                        </select>
                    </div>
                    <div class="div_design">
                    <label>Product Image Here</label>
                        <input type="file" name="image" required>
                    </div>

                    <div class="div_design">
                        <input type="submit" name="submit" value="Add Product" class="btn btn-primary" >
                    </div>
</form>

                </div>
            </div>
        </div>
    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>admin/