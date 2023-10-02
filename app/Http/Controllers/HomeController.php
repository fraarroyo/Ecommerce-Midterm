<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;

class HomeController extends Controller
{

    public function index(){
        $product=Product::paginate(3);
        return view('home.userpage', compact('product'));
    }
    public function redirect()
    {
        $usertype=Auth::user()->usertype;


        if($usertype=='1')
        {
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();

            $order=order::all();

            $total_revenue=0;

            foreach($order as $order){
                $total_revenue=$total_revenue + $order->price;
            }

            $cod_order=order::where('payment_status','=','cash on delivery')->get()->count();
            $stripe_order=order::where('payment_status','=','paid')->get()->count();

            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','cod_order','stripe_order'));
        }else{
            $product=Product::paginate(10);
            return view('home.userpage', compact('product'));
        }
    }

    public function product_details($id){
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request,$id){
        if(Auth::id())
        {
            $user=Auth::user();
            $product=product::find($id);
            $cart=new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->product_title=$product->title;

            if($product->discount_price!=null){
                $cart->price=$product->discount_price * $request->quantity;
            }else{
            $cart->price=$product->price * $request->quantity;
        }
            $cart->image=$product->image;
            $cart->product_id=$product->id;

            $cart->quantity=$request->quantity;

            $cart->save();

            return redirect()->back()->with('message', 'Item Added to Cart');
        }else{
            return redirect('login');
        }
    }

    public function show_cart(){
        if(Auth::id()){
            $id=Auth::user()->id;

        $cart=cart::where('user_id','=',$id)->get();
        return view('home.showcart',compact('cart'));
        }else{
            return redirect('login');
        }
    }

    public function remove_cart($id){
        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back()->with('message', 'Item Removed from Cart');
    }

    public function cash_order(){
        $user=Auth::user();

        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data){
            $order=new order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back()->with('message', 'Thank you!. We have recieved your order. We will contact you once your order has been approved.');
    }

    public function stripe($totalprice){
        return view('home.stripe',compact('totalprice'));
    }

    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "PHP",
                "source" => $request->stripeToken,
                "description" => "Thank you for purchasing." 
        ]);
        $user=Auth::user();

        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data){
            $order=new order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status='Paid';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function show_order(){
        if(Auth::id()){

            $user=Auth::user();

            $userid=$user->id;
            $order=order::where('user_id','=',$userid)->get();

            return view('home.order',compact('order'));
        } else {
            return redirect('login');
        }
    }

    public function cancel_order($id){

        $order=order::find($id);
        $order->delivery_status='Order Cancelled';
        $order->save();

        return redirect()->back();
    }
}

