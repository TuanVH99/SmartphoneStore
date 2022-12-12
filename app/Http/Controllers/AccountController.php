<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Customer;
use App\Mail\GetPasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = DB::select('select * from cities');
        $districts = DB::select('select * from districts');
        $wards = DB::select('select * from wards');
        // $customerCount = DB::select('select * from customers');
        return view('account',['cities' => $cities,'districts' => $districts,'wards' => $wards]);
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
        //
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
        $customer = Customer::find($id);
        $customer->sex =  $request->input('sex');
        $customer->phone = $request->input('phone');
        $customer->city_id = $request->input('country');
        $customer->district_id = $request->input('district');
        $customer->ward_id = $request->input('ward');
        $customer->save();
        if(Session::has('customer')){
            Session::forget('customer');
            Session::put('customer',$customer);
        }
        return redirect()->route('account')->with("success","Cập nhật thành công");
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
     * Logout account
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::forget('customer');
        // Session::forget('cart');
        return redirect()->route('login')->with('success','Đăng xuất thành công.');
    }

     /**
     * Change password form
     *
     * @return \Illuminate\Http\Response
     */
    public function changePasswordForm()
    {
        return view('changepwd');
    }

    /**
     * Change password
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request, $id)
    {
        $customer = Customer::find($id);
        if(!Hash::check($request->input('oldPassword'),$customer->password)){
            return redirect()->route('changepwdForm')->with('invalid','Mật hiện tại không đúng!');
        }
        if($request->input('password') !== $request->input('repeatpassword')){
           return redirect()->route('changepwdForm')->with('invalid','Mật khẩu nhập lại không khớp!');
        }
        $customer->password = bcrypt($request->input('password'));
        $customer->save();
        // Session::forget('customer');
        Session::put('password', $customer);
        return redirect()->route('account')->with('success','Cập nhật mật khẩu thành công.');

    }

     /**
     * Reset password form
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPasswordForm()
    {
        return view('resetpwd');
    }

    /**
     * Reset password
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request, $id)
    {
        $customer = Customer::find($id);
        if($request->input('password') === $request->input('repeatpassword')){
            $customer->password = bcrypt($request->input('password'));
            $customer->save();
            return redirect()->route('account')->with('success','Cập nhật mật khẩu thành công.');
        }
        Session::forget('customer');
        Session::put('password', $customer);
        return redirect()->route('login')->with("success","Cập nhật mật khẩu thành công ");
    }


    /**
     * Forget password form
     *
     * @return \Illuminate\Http\Response
     */
    public function forgetPasswordForm()
    {
        return view('forgetpwd');
    }

    /**
     * Forget password
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function forgetPassword(Request $request)
    {
        $email = $request->input('email');
        $customer = Customer::where('email', $email)->first();
        if(!$customer['email'])return redirect()->back()->with('invalid','Email này không có trong hệ thống.');
        Mail::to($request->input('email'))->send(new GetPasswordMail($request->input('email'))); 
        return redirect()->back()->with('success','Đã gửi link opt vào địa chỉ mail của bạn!');
    }

    /**
     * Get password form
     *
     * @return \Illuminate\Http\Response
     */
    public function getPasswordForm($email)
    {
        return view('getpassword',['email' => $email]);
    }

    /**
     * Update password
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        if($request->input('password') === $request->input('repeatpassword')){
            Customer::where('email',$request->input('email'))->update(['password' => bcrypt($request->input('password'))]);
            return redirect()->route('login')->with('success','Cập nhật thành công.');
        }else{
            return redirect()->back()->with('invalid','Mật khẩu và mật khẩu nhập lại không trùng khớp.');
        }
        // if(Session::has('customer')){
        //     Session::forget('customer');
        //     Session::put('customer',$customer);
        // }
        // return redirect()->route('account')->with("success","Cập nhật thành công");
    }
}
