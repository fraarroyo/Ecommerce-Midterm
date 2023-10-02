<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div style="text-align: center; border: 2px solid black;">
    <H1>Order Details of {{$order->email}}</H1>

    Costumer Name: <h3>{{$order->name}}</h3>
    Costumer Email: <h3>{{$order->email}}</h3>
    Costumer Phone: <h3>{{$order->phone}}</h3>
    Costumer Address: <h3>{{$order->address}}</h3>
    Costumer Id: <h3>{{$order->user_id}}</h3>
    Product Name: <h3>{{$order->product_title}}</h3>
    Product Price: <h3>{{$order->price}}</h3>
    Product Quantity: <h3>{{$order->quantity}}</h3>
    Payment Status: <h3>{{$order->payment_status}}</h3>
    Product Id: <h3>{{$order->product_id}}</h3>
    <br>
        <img src="product/{{$order->image}}">
    
    </div>
</body>
</html>