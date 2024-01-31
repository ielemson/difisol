<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Service;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FlutterwaveController extends Controller
{
    
    public function initialize()
    {
        // $total_amount = Cart::total();
        $total = 0;
        // $attribute_price = 0;
        foreach (Cart::content() as $key => $product) {
            $total += $product->price * $product->qty;
            $total += $product->options->attribute_price;
        }
        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        // // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => $total,
            'email' => Auth::user()->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => Auth::user()->email,
                "phone_number" => Auth::user()->phone,
                "name" => Auth::user()->name
            ],

            "customizations" => [
                "title" => 'FutureMap Magazine',
                "description" => "FutureMap magazine online store",
                "logo" => "https://fmapmedia.com/assets/images/favicon.png"
            ]
        ];

        $payment = Flutterwave::initializePayment($data);


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['link']);
    }


    public function callback()
    {
        
        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {
        
        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);

        // dd($data);

        $user = Auth::user();
        $cart = Cart::content();
        $cartArr = [];
      

        foreach ($cart as $key => $item) {
           $order =  Orders::create([
                'product_id' => $item->id,
                 'qty' => $item->qty,
                 'price'=>$item->price,

        // $order_data['cart'] = json_encode($cartArr, true);
        'payment_method'     => $data['data']['narration'],
        'payment_type'       => $data['data']['payment_type'],
        'app_fee'            => $data['data']['app_fee'],
        'charged_amount'     => $data['data']['charged_amount'],
        'flw_ref'            => $data['data']['flw_ref'],
        'processor_response' => $data['data']['processor_response'],
        'charge_id'          => $data['data']['id'],
        'user_id'            => $user->id,
        'transaction_id'     => Str::random(10),
        'payment_status'     => 'Paid',
        'txnid'              => $data['data']['tx_ref'],
        'status'             => 'Successful',
        // $order                            = Orders::create($order_data);
            ]);
        }
  if(!empty($order)){
            Session::put('order_id', $order->id);
            Session::forget('cart');
            Cart::destroy();
            Session::put('purchase',true);
            // $purchase  = true;
            $orders = Orders::where('user_id',$user->id)->get();
            return redirect()->route('dashboard');
        }
        }
        elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here
            $services = Service::all();
            return view('frontend.pages.cancelpayment',compact('services'));
        }
        else{
            //Put desired action/code after transaction has failed here
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}
