<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    @include('admin.css')
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
            <h1 style="text-align:center; font-size:40px;">Send Email to {{$order->email}}</h1>
        
            </div>
        </div>

    <!-- container-scroller -->
   @include('admin.js')
  </body>
</html>admin/