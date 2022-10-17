<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        // get orders from the DB
        $orders = Order::latest()->where('userId', $userId)->paginate(5);

        return view('orders.index', compact('orders'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validate the input
         $request->validate([
            'name' => 'required',
            'userId' => 'required'
        ]);

        // create a new order in the database
        Order::create($request->all());

        // redirect admin and send friendly message
        return redirect()->route('orders.index')->with('success','Order created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $orderProducts = Product::join('orderDetails', 'products.id', '=', 'orderDetails.productId')
            ->where('orderDetails.orderId', $order->id)
            ->get(['orderDetails.id', 'products.name', 'orderDetails.quantity']);
        
        return view('orders.show', compact('order','orderProducts'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Show the form for adding the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Order $order, Request $request)
    {
        // get products from the DB
        $products = Product::all();
        $order = $request->id;


        return view('orders.insert', compact('order','products'));
    }

    /**
     * Insert the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function insertProduct(Request $request)
    {
        // validate the input
        $request->validate([
            'orderId' => 'required',
            'productId' => 'required',
            'quantity' => 'required',
        ]);

        // create a new orderDetails row in the database
        OrderDetails::create($request->all());

        $id = $request['orderId'];

        // redirect to orders show and send friendly message
        return redirect()->route('orders.show', ['order' => $id])->with('success','Product added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
