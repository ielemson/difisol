<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmed;
use App\Models\Competition;
use App\Models\Orders;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PaystackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = Auth::user();
        $cart = Cart::content();
          

        foreach ($cart as $key => $item) {
           $order =  Orders::create([
            'product_id' => $item->id,
            'qty' => $item->qty,
            'price'=>$item->price,
            'user_id'            => $user->id,
            'transaction_id'     => Str::random(10),
            'payment_status'     => 'Paid',
            'payment_ref'              => $request->ref,
            'status'             => 'Successful',
        // $order                            = Orders::create($order_data);
            ]);
        }

            Session::put('order_id', $order->id);
            Session::forget('cart');
            Cart::destroy();
            Session::put('purchase',true);

            if (Competition::where('email',$user->email)->exists()) {
                $competitor = Competition::where('email',$user->email)->first();
                $competitor->checkout_complete = 1;
                $competitor->save();
            }
        
            Mail::to($user->email)->send(new OrderConfirmed());
           return response(['status'=>200,'msg'=>'Order Confirmed Successfully','url'=>'dashboard']);
           

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
