<?php

namespace App\Http\Controllers;

use Session;
use Stripe;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function stripe()
    {
//        $order = Order::select('order_total')->get();
        return view('public.checkout.stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        Session::flash('success', 'Payment successful!');

        return redirect('/checkout/order/complete');
    }
}
