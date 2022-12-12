<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slides.listSlide',['slides'=>$slides]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slides.addSlide');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $validated = $request->validate([
                    'slide-name' => 'required',
                    'sort-order' => 'required',
                    'image' => 'mimes:jpeg,png,webp',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public/images/slides', $validated['slide-name'].".".$extension);
                
                $slide = Slide::create([
                   'name' => $validated['slide-name'],
                   'sort_order' => $validated['sort-order'],
                   'image_path' => $validated['slide-name'].".".$extension,
                ]);
    
                $slide->save();
               
                return redirect()->route('slide.list')->with("success","Lưu thành công");
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
        $slide = Slide::find($id);
        return view('admin.slides.editSlide',['slide' => $slide]);
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
        $slide = Slide::find($id);
        $slide->name = $request->input('slide-name');
        $slide->sort_order = $request->input('sort-order'); 
        $slide->save();
        return redirect()->route('slide.list')->with("success","Sửa thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return redirect()->route('slide.list')->with("success","Xóa thành công");
    }

    /**
     * Disable status slide
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable($id)
    {
        $slide = Slide::find($id);
        $slide->status = 0;
        $slide->save();
        return redirect()->route('slide.list')->with("success","Vô hiệu hóa thành công");
    }

    /**
     * Enable status slide
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enable($id)
    {
        $slide = Slide::find($id);
        $slide->status = 1;
        $slide->save();
        return redirect()->route('slide.list')->with("success","Mở thành công");
    }
}
