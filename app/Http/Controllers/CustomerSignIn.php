<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Customer;

class CustomerSignIn extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
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
     * Login account
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
         // Form validation
         $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(($request->input('email') == 'admin@gmail.com' && $request->input('password') == 'admin123')){
            if(Session::has('admin')){
                Session::forget('admin');
                Session::put('admin','admin');
            }else{
                Session::put('admin','admin');
            }
            return redirect()->route('dashboard')->with('success','Đăng nhập thành công vào admin.');
        }
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $customer = Customer::where('email','=',$request->input('email'))->first();
            if(!empty($customer->id)){
                if(Session::has('customer')){
                    Session::forget('customer');
                    Session::put('customer',$customer);
                }else{
                    Session::put('customer',$customer);
                }
                return redirect()->route('account')->with('success','Đăng nhập thành công.');
            }else{
                return redirect()->route('login')->with("invalid","Tài khoản của bạn chưa xác thực hoặc đã bị khóa. Vui lòng đăng nhập lại !");
            }
        }
        else{
            return redirect()->route('login')->with("invalid","Tài khoản hoặc mật khẩu không đúng. Vui lòng đăng nhập lại !");
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
        //
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
}
