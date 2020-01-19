<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use PDF;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manageOrder(){
        $orders = Order::with('customer','payment')->get();
//        return $orders;
        return view('admin.order.manage-orders',['orders'=>$orders]);
    }

    public function orderDetail($id){
        $order = Order::with('customer','payment','shipping')->find($id);

        $orderDetails = OrderDetail::where('order_id',$order->id)->get();

        return view('admin.order.order-details',[
            'order' => $order,
            'orderDetails'=>$orderDetails
        ]);
    }

    public function viewOrderInvoice($id){
        $order = Order::with('customer','payment','shipping')->find($id);
//        return $order;
        $orderDetails = OrderDetail::where('order_id',$order->id)->get();

        return view('admin.order.view-order-invoice',[
            'order' => $order,
            'orderDetails'=>$orderDetails
        ]);
    }

    public function downloadInvoice($id){
        $order = Order::with('customer','payment','shipping')->find($id);
//        return $order;
        $orderDetails = OrderDetail::where('order_id',$order->id)->get();

        $pdf = PDF::loadView('admin.order.view-order-invoice',[
            'order' => $order,
            'orderDetails'=>$orderDetails
        ]);

        return $pdf->stream('invoice.pdf');
    }
}


















