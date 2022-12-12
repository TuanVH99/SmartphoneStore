<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotions.listPromotion',['promotions'=>$promotions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promotions.addPromotion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'promotion-name' => 'required',
            'code' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);
        //  Store data in database
        $promotion = new Promotion([
            'title' => $request->input('promotion-name'),
            'code' => $request->input('code'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity')
        ]);
        $promotion->save();
        return redirect()->route('promotion.list')->with("success","Lưu thành công");
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
        $promotion = Promotion::find($id);
        return view('admin.promotions.editPromotion',['promotion' => $promotion]);
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
        $promotion = Promotion::find($id);
        $promotion->title = $request->input('promotion-name');
        $promotion->code = $request->input('code');
        $promotion->price = $request->input('price');
        $promotion->quantity = $request->input('quantity');
        $promotion->save();
        return redirect()->route('promotion.list')->with("success","Sửa thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();
        return redirect()->route('promotion.list')->with("success","Xóa thành công");
    }

    /**
     * Check promotion code
     *
     * @return \Illuminate\Http\Response
     */
    public function check()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $promotion = DB::select('select price,quantity from promotions where code = ?',[$_GET['code']]);
        if(count($promotion) <= 0 ){
            $msg = [0];
            $msg[] = "Mã này không tồn tại, vui lòng thử mã khác";
            $msg[] = $cart->totalPrice;
        }else{
            $msg = [1,$_GET['code']];
            Promotion::where('code',$_GET['code'])->update(['quantity' => $promotion[0]->quantity - 1]);
            $msg[] = $cart->totalPrice - $promotion[0]->price ;
        }
        return response()->json($msg);
    }
}
