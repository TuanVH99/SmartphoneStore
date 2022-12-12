<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producer;
use Illuminate\Support\Facades\DB;
class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producers = Producer::all();
        return view('admin.producers.listProducer',['producers'=>$producers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.producers.addProducer');
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
            'producer-name' => 'required'
        ]);
        //  Store data in database
        $producer = new Producer([
            'name' => $request->input('producer-name')
        ]);
        $producer->save();
        return redirect()->route('producer.list')->with("success","Lưu thành công");
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
        $producer = Producer::find($id);
        return view('admin.producers.editProducer',['producer' => $producer]);
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
        $producer = Producer::find($id);
        $producer->name = $request->input('producer-name');
        $producer->save();
        return redirect()->route('producer.list')->with("success","Sửa thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = DB::select('select * from products where producer_id = :id', ['id' => $id]);
        if(is_array($check)){
            if(count($check) > 0){
                return back()->with("invalid","Hiện có một số sản phẩm đang có nhà cung cấp này");
            }
            else{
                $producer = Producer::find($id);
                $producer->delete();
                return redirect()->route('producer.list')->with("success","Xóa thành công");
            }
        }
    }
}
