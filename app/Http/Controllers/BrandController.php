<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.listBrand',['brands'=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.addBrand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                //
                $validated = $request->validate([
                    'brand-name' => 'required',
                    'image' => 'mimes:jpeg,png,webp,jpg',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public/images/brands', $validated['brand-name'].".".$extension);
                $brand = Brand::create([
                   'name' => $validated['brand-name'],
                   'img_path' => $validated['brand-name'].".".$extension,
                ]);
                $brand->save();
                return redirect()->route('brand.list')->with("success","Lưu thành công");
            }
        }
    }

       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = DB::select('select * from products where brand_id = :id', ['id' => $id]);
        $brands = Brand::inRandomOrder()->limit(4)->get();
        $brand = Brand::find($id);
        return view('product-brand',['products' => $products,'brands' => $brands,'brand' => $brand]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brands.editBrand',['brand' => $brand]);
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
        $brand = Brand::find($id);
        $brand->name = $request->input('brand-name');
        $brand->save();
        return redirect()->route('brand.list')->with("success","Sửa thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = DB::select('select * from products where brand_id = :id', ['id' => $id]);
        if (is_array($check)) {
            if (count($check) > 0) {
                return back()->with("invalid", "Hiện có một số sản phẩm đang có thương hiệu này");
            }
            else{
                $brand = Brand::find($id);
                $brand->delete();
                return redirect()->route('brand.list')->with("success","Xóa thành công");
            }
        }
    }

    /**
     * Disable status brand
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable($id)
    {
        $brand = Brand::find($id);
        $brand->status = 0;
        $brand->save();
        return redirect()->route('brand.list')->with("success","Vô hiệu hóa thành công");
    }

    /**
     * Enable status brand
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enable($id)
    {
        $brand = Brand::find($id);
        $brand->status = 1;
        $brand->save();
        return redirect()->route('brand.list')->with("success","Mở thành công");
    }
}
