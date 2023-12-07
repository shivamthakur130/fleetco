<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\Order;
use App\Models\Company;
use App\Models\Service;

use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        $customers = Customer::get();
        $drivers = Driver::get();
        $companies = Company::get();
        return view('admin.orders.list', compact('orders','customers','drivers','companies'));
    }

    public function create(request $request){
        $customers = Customer::get();
        $drivers = Driver::get();
        $companies = Company::get();
        $services = Service::get();
        //dd($services->toArray());
        return view('admin.orders.add',compact('customers','drivers','companies', 'services'));
    }

    public function store(request $request){
        //dd($request->toArray());
        $validated = $request->validate([
            'order_type' => 'required'
        ]);
        $order = new Order;
        $order->unique_id = Str::random(40);
        $order->order_type = $request->order_type;
        $order->internal_id = $request->internal_id;
        $order->schedule_date = $request->sch;
        $order->customer = $request->customer;
        $order->facilitator = $request->facilitator;
        $order->driver_assign = $request->driver;
        $order->ad_hoc = $request->ad_hoc;
        $order->dispatch_immediately = $request->dispatch;
        $order->require_proof_of_delivery = $request->require_proof_of_delivery;
        $order->pick1 = $request->pickup1;
        $order->drop1 = $request->dropoff1;
        $order->return1 = $request->return1;
        $order->multiple_drop_off = $request->multiple_drop_off;

        if($request->multiple_drop_off){
            $order->pick2 = $request->pickup2;
            $order->drop2 = $request->dropoff2;
            $order->return2 = $request->return2;
        }
        $order->service = $request->service;

        if($request->service){
            $order->service_id = $request->service_id;
        }

        $order->notes = $request->notes;
        if($request->items){
            $order->item = implode(".", $request->items);
        }
        
        $order->save();
        return redirect()->route('admin.order')->with('message', 'Saved successfully.');
    }


    public function destroy($id){
        $re = Order::where('id', $id)->first();
        $re->delete();
        return redirect()->route('admin.order')->with('error', 'Deleted successfully.');

    }

    public function edit($id){
        $customers = Customer::get();
        $drivers = Driver::get();
        $companies = Company::get();
        $services = Service::get();
        $order = Order::where('unique_id',$id)->first();
        return view('admin.orders.edit', compact('services','customers','drivers','order','companies'));
    }

    public function update(request $request){
       
        $order = Order::where('id',$request->id)->first();
        $order->order_type = $request->order_type;
        $order->internal_id = $request->internal_id;
        $order->schedule_date = $request->sch;
        $order->customer = $request->customer;
        $order->facilitator = $request->facilitator;
        $order->driver_assign = $request->driver;
        $order->ad_hoc = $request->ad_hoc;
        $order->dispatch_immediately = $request->dispatch;
        $order->require_proof_of_delivery = $request->require_proof_of_delivery;
        $order->pick1 = $request->pickup1;
        $order->drop1 = $request->dropoff1;
        $order->return1 = $request->return1;
        $order->multiple_drop_off = $request->multiple_drop_off;

        if($request->multiple_drop_off){
            $order->pick2 = $request->pickup2;
            $order->drop2 = $request->dropoff2;
            $order->return2 = $request->return2;
        }
        $order->service = $request->service;

        if($request->service){
            $order->service_id = $request->service_id;
        }

        $order->notes = $request->notes;
        if($request->items){
            $order->item = implode(".", $request->items);
        }
        
        $order->save();
        return redirect()->route('admin.order')->with('message', 'Update successfully.');
    }

    public function schedule(){
        $orders = Order::get();
        $customers = Customer::get();
        $drivers = Driver::get();
        $companies = Company::get();
        return view('admin.schedules.list', compact('orders','customers','drivers','companies'));
    }

    public function getEvents(){
        $data = Order::get(['id','internal_id','schedule_date']);
        //dd($data->toARray());
        $results = [];

        foreach($data as $record){
            $ev = [];
            $ev['id'] = $record->id;
            $ev['title'] = $record->internal_id;
            $ev['start'] = $record->schedule_date;
            $ev['end'] = $record->schedule_date;
            $ev['display'] = 'display';
            $results[] = $ev;
        }
        
        //return response($results);
        return response()->json($results);
    }

    public function calendarEvent($id){
        $data = Order::join('customers' , 'customers.id' ,'=', 'orders.customer')
                    ->join('drivers', 'drivers.id' ,'=', 'orders.driver_assign')
                    ->select('orders.*','customers.name as customer_name', 'drivers.name as driver_name')
                    ->where('orders.id', $id)
                    ->first();
        return response()->json($data);
    }
}
