<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    // $order_data['payment_method']     = $data['data']['narration'];
    // $order_data['payment_type']       = $data['data']['payment_type'];
    // $order_data['app_fee']            = $data['data']['app_fee'];
    // $order_data['charged_amount']     = $data['data']['charged_amount'];
    // $order_data['flw_ref']            = $data['data']['flw_ref'];
    // $order_data['processor_response'] = $data['data']['processor_response'];
    // $order_data['charge_id']          = $data['data']['id'];
    // $order_data['user_id']            = $user->id;
    // $order_data['transaction_number'] = Str::random(10);
    // $order_data['payment_status']     = 'Paid';
    // $order_data['txnid']              = $data['data']['tx_ref'];
    // $order_data['order_status'] 

    protected $fillable = ['payment_ref','qty','product_id','price','transaction_id','cart','status','txnid','payment_status','user_id','payment_method','payment_type','app_fee','charged_amount','flw_ref','processor_response','charge_id','competiton_status','location','info'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault();
    }
}
