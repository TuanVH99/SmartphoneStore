<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::select('select o.order_code,o.status,c.username,sum(o.price) total_money from orders o,customers c
        where o.customer_id = c.id group by o.order_code');
      
        // dd($orders);
        return view('admin.orders.listOrder',['orders'=>$orders]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $products = [];
        $products = DB::select('select o.*,p.title,p.price from orders o,products p where o.product_id = p.id and o.order_code = ?',[$code]);
        return view('admin.orders.seeOrder',['products' => $products]);
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
     * @param  int  $code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        Order::where('order_code',$code)->update(['status' => $request->input('status')]);
        return redirect()->route('order.list')->with('success','Cập nhật trạng thái thành công.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $code
     * @return \Illuminate\Http\Response
     */
    public function confirm( $code)
    {
        Order::where('order_code',$code)->update(['status' => 1]);
        return redirect()->route('order.list')->with('success','Cập nhật trạng thái thành công.');
    }

        /**
     * có 2 endpoint cho admin và customer
     * @param  int  $code
     * @return \Illuminate\Http\Response
     */
    public function cancel( $code)
    {
        $order = Order::where('order_code',$code)->first();
        if($order->status != 0) return redirect()->route('order.list')->with('error','Chỉ đơn hàng chờ xác nhận mới được huỷ');
        $order->update(['status' => 3]);
        // order.list là danh sách các đơn hàng bên trang admin
        return redirect()->route('order.list')->with('success','Huỷ đơn hàng thành công.');
    }

    // huỷ đơn hàng cho customer khi đơn hàng ở trạng thái chờ xác nhận
    public function cancelMyOrder($code)
    {
        $order  =  Order::where('order_code',$code)->first();
        if($order->status != 0) return redirect()->route('my.order')->with('error','Chỉ đơn hàng chờ xác nhận mới được huỷ');
        $order->update(['status' => 3]);
        $customer_id = $order->customer_id;
        // my.order la danh sach order cua khach hang
        return redirect()->route('my.order',['id' =>$customer_id])->with('success','Huỷ đơn hàng thành công.');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMyOrder($id)
    {
        $orders = DB::table('orders')
        // ->join('promotions', 'promotions.id', '=', 'orders.promotion_id')
        ->join('products', 'products.id', '=', 'orders.product_id')
        ->where('orders.customer_id','=',$id)
        ->groupBy('orders.order_code')  
        ->paginate(1000,['orders.order_code','orders.created_at','orders.status','orders.price', 'products.title'],'order');
        // ->paginate(3,['orders.order_code','orders.status','promotions.code'],'order');
       
        return view('my-order',['orders'=>$orders]);
    }

    /**
     * See detail my order
     * @param  int  $code
     * @return \Illuminate\Http\Response
     */
    public function seeMyOrder($code)
    {
        $products = [];
        $products = DB::select('select o.qty,p.title,p.price from orders o,products p,promotions s where o.product_id = p.id and o.promotion_id = s.id group by ?,p.id',[$code]);
        return view('my-order-detail',['products' => $products]); 
    }
}
