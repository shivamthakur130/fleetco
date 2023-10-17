<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\Order;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        return view('admin.orders.list', compact('orders'));
    }

    public function create(request $request){
        $customers = Customer::get();
        $drivers = Driver::get();
        return view('admin.orders.add',compact('customers','drivers'));
    }

}
