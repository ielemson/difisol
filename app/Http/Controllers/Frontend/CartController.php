<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\NewsCategory;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

// use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    
    public function addToCart(Request $request, $id)
    {

        // Cart::destroy();

        $product = Product::where('id',$id)->first();
        
            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->price,
                'weight'=>0,
                'options' => [
                    'slug' => $product->slug,
                    'competiton_status' => $product->competiton_status,
                    'image' => $product->image,
                    'file' => $product->file,
                   
                    ]
            ]);

            return response()->json(['success' => 'Successfully added to your cart'],200);
      
        }

        public function getMiniCart()
    {
        $carts = Cart::content();
        $cart_qty = Cart::count();
        // $cart_total = doubleval(Cart::total());
        $totalCost = 0;
        foreach(Cart::content() as $cost){
            if (is_numeric($cost->subtotal)) {
                 $totalCost += $cost->subtotal;
            }
       }

        return response()->json([
            'carts' => $carts,
            'cart_qty' => $cart_qty,
            'cart_total' => $totalCost,
        ], 200);
    }

    public function showToCart(){
        if (count(Cart::content()) > 0) {
            $services = Service::all();
            // dd(Cart::content());
            return view('frontend.pages.cart',compact('services'));
        }
        return redirect()->back();
    }

    public function showmyCartList()
    {

        $carts = Cart::content();
        $cart_qty = Cart::count();
        $sub_total = Cart::subTotal();
        $totalCost = 0;
        foreach(Cart::content() as $cost){
            if (is_numeric($cost->subtotal)) {
                 $totalCost += $cost->subtotal;
            }
       }

       $total = 0;
       // $attribute_price = 0;
       foreach (Cart::content() as $key => $product) {
           $total += $product->price * $product->qty;
           $total += $product->options->attribute_price;
       }
        return response()->json([
            'carts' => $carts,
            'cart_qty' => $cart_qty,
            'sub_total' => $sub_total,
            'cart_total' => round($totalCost),
            'total'  => $total
        ], 200);
    }

    
    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove from Cart'],200);
    }

    public function addQtyToCart($rowId)
    {
        $cart_product=Cart::get($rowId);
        Cart::update($rowId, $cart_product->qty + 1);

        // if (Session::has('coupon')) {
        //     $coupon_name = Session::get('coupon')['coupon_name'];
        //     $coupon = Coupon::where('coupon_name', $coupon_name)->first();
        //     Session::put('coupon',[
        //         'coupon_name' => $coupon->coupon_name,
        //         'coupon_discount' => $coupon->coupon_discount,
        //         'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
        //         'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
        //     ]);
        // }
        return response()->json(['success' => 'Product Qty Increamented'],200);
    }

    public function reduceQtyFromCart($rowId)
    {
        $cart_product=Cart::get($rowId);
        Cart::update($rowId, $cart_product->qty - 1);
        // if (Session::has('coupon')) {
        //     $coupon_name = Session::get('coupon')['coupon_name'];
        //     $coupon = Coupon::where('coupon_name', $coupon_name)->first();
        //     Session::put('coupon',[
        //         'coupon_name' => $coupon->coupon_name,
        //         'coupon_discount' => $coupon->coupon_discount,
        //         'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
        //         'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
        //     ]);
        // }
        return response()->json(['error' => 'Product Qty Decremented'],200);
    }

    public function AddCompetition(Request $request){

        $checkComp = Competition::where('email',$request->email)->count();
        if ($checkComp > 0) {

            return response()->json(['status' =>false, 'msg'=> 'You have been previously captured.'],200);
        }

    //    return response()->json(['data'=>$request->all()]);
            $Newcompetition = Competition::create([
                'name' => $request->name,
                'email' => $request->email,
                'productid' => $request->prodId,
                'compinfo' => $request->aboutComp,
                'location' => $request->location,
            ]);
        
            if ($Newcompetition) {
            return response()->json(['status'=>true,'msg'=>'Thank you for participating']);
            }
        
        
    }

    }
