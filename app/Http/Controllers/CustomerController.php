<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customer.index', ['customers' => $customers]);
    }
    public function create(){
        return view('customer.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:8',
            'gender'=> 'required',
            'age'=> 'required|numeric',
            'phone'=> 'required|digits:10',
            'address'=> 'required',
        ]);

        Customer::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'gender'=> $request['gender'],
            'age'=> $request['age'],
            'phone'=> $request['phone'],
            'address'=> $request['address'],
        ]);
        return redirect(route(name: 'customer.index'))->with('success','Customer Created');
    }

        public function edit(Customer $customer){
            return view('customer.edit', ['customer'=> $customer]);
        }

        public function update(Customer $customer, Request $request){
            $request->validate([
                'name'=> 'required',
                'email'=> 'required|email|unique:users,email',
                'password'=> 'required|min:8',
                'gender'=> 'required',
                'age'=> 'required|numeric',
                'phone'=> 'required|digits:10',
                'address'=> 'required',
            ]);

            $customer->update([
                'name'=> $request['name'],
                'email'=> $request['email'],
                'password'=> bcrypt($request['password']),
                'gender'=> $request['gender'],
                'age'=> $request['age'],
                'phone'=> $request['phone'],
                'address'=> $request['address'],
        ]);

        return redirect(route(name:'customer.index'))->with('success','Customer updated Successfully');
    }

    public function delete(Customer $customer){
        $customer->delete();
        return redirect(route(name:'customer.index'))->with('success','User Deleted Sucessfully');
    }
}