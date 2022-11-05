<?php

namespace App\Http\Controllers;

use App\Models\Products;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
// use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        $data = Products::all();
        return view('product', ['products' => $data]);
    }

    public function detail($id)
    {
        $data =  Products::find($id);
        return view('detail', ['product' => $data]);
    }

    function addToCart(Request $request)
    {
        if ($request->session()->has('user')) {

            $cart = new Cart;
            $cart->user_id = $request->session()->get('user')['id']; // get it from the session
            $cart->product_id = $request->product_id; // send it from the form (Add to Cart)
            $cart->save();

            return redirect("/");
        } else {
            return redirect("login");
        }
    }

    function cartItem($var = null)
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    function list()
    {
        $userId = Session::get('user')['id'];

        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart')
            ->get();
        return view('cartlist', ['products' => $products]);
    }

    function remove($id)
    {
        Cart::destroy($id);
        return redirect('listcart');
    }

    function orderNow()
    {
        $userId = Session::get('user')['id'];

        $totalOrder = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart')
            ->sum('products.price');
        return view('order', ['totalOrder' => $totalOrder]);
    }

    function orderAddress(Request $request)
    {
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        foreach ($allCart as $cart) {
            $order = new Order();
            $order->product_id = $cart->product_id;
            $order->user_id = $cart->user_id;
            $order->status = "pending";
            $order->payment_method = $request->payment;
            $order->payment_status = "pending";
            $order->address = $request->address;
            $order->save();

            Cart::destroy($cart->id);
        }
        return redirect("/");
    }

    function myOrders()
    {
        $userId = Session::get('user')['id'];

        $products =  DB::table('order')
            ->join('products', 'order.product_id', '=', 'products.id')
            ->where('order.user_id', $userId)
            ->get();
        return view('myorders', ["products" => $products]);
    }

    function getFilterdProducts(Request $request)
    {
        $filter_for = $request->search;

        $products = Products::Where('name', 'like', '%' . $filter_for . '%')
            ->orWhere('description', 'like', '%' . $filter_for . '%')
            ->orWhere('category', 'like', '%' . $filter_for . '%')
            ->get();
        return view('product', ['products' => $products]);
    }
}
