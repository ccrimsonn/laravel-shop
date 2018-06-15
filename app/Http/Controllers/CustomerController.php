<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $this->validate($request, [
            'email' => 'email|required|unique:customers',
            'password' => 'required|min:9|confirmed',
            'firstName' => 'required|string',
            'surname' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required',
        ]);

        $customer = new Customer([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'firstName' => $request->input('firstName'),
            'surname' => $request->input('surname'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
        ]);
        $customer->save();

        auth()->guard('customer')->login($customer);

        if (Session::has('oldUrl')){
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }

        return redirect()->route('productHome');
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

    public function signUpIndex()
    {
        return view('user.signup');
    }

    public function signInIndex()
    {
        return view('user.signin');
    }

    public function profileIndex()
    {
        $orders = auth()->guard('customer')->user()->orders;
        $orders->transform(function ($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.profile', ['orders' => $orders]);
    }

    public function customerLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'email|required',
            'password' => 'required|min:9'
        ]);
        $isCustomer = Customer::where('email', $request['email'])->first();
        if ($isCustomer != null && password_verify($request['password'], $isCustomer->password))
        {
            auth()->guard('customer')->login($isCustomer);
            if (Session::has('oldUrl')){
               $oldUrl = Session::get('oldUrl');
               Session::forget('oldUrl');
               return redirect()->to($oldUrl);
            }
            return redirect()->route('profile');
        }
        return redirect()->back();
    }

    public function customerLogout()
    {
        auth()->guard('customer')->logout();
        return redirect()->route('productHome');
    }
}
