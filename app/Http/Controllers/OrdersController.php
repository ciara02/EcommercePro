<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\OrderedItems;

use App\Models\Order;


class OrdersController extends Controller
{
    
    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {


            $user=Auth::user();

            $products = product::find($id);

            $ordered_items=new ordereditems;

            $ordered_items->name= $user->name;

            $ordered_items->email= $user->email;

            $ordered_items->phone= $user->phone;

            $ordered_items->address= $user->adress;

            $ordered_items->user_id= $user->id;

            $ordered_items->item= $products->title;


            if($products->discount_price!=null)
            {
                $ordered_items->amount= $products->discount_price * $request->quantity;
            }

            else
            {
                $ordered_items->amount= $products->price * $request->quantity;
            }

            $ordered_items->quantity= $request->quantity;

            $ordered_items->image= $products->image;

            $ordered_items->Product_id= $products->id;

            $ordered_items->save();

            return redirect()->back();



        }

        else

        {
            return redirect('login');
        }
    }

    public function show_orders()
    {

        if(Auth::id())
        {
            $id=Auth::user()->id;

            $ordered_items= ordereditems::where('user_id', '=',$id)->get();
    
            return view('home.showorders', compact('ordered_items'));
        }

        else
        {
            return redirect('login');
        }
       
    }

    public function remove_orders($id)
    {
        $ordered_items= ordereditems::find($id);

        $ordered_items->delete();

        return redirect()->back();
    }

    public function cash_order()
    {

        $user=Auth::user();

        $userid=$user->id;

        $data=ordereditems::where('user_id', '=', $userid)->get();

        foreach($data as $data)
        {
            $order=new order;

            $order->customer_name=$data->name;

            $order->email=$data->email;

            $order->phone=$data->phone;

            $order->address=$data->address;

            $order->user_id=$data->user_id;

            $order->item=$data->item;

            $order->amount=$data->amount;

            $order->quantity=$data->quantity;

            $order->image=$data->image;

            $order->product_id=$data->Product_id;

            $order->payment_status='cash on delivery';

            $order->order_status='processing';

            $order->save();

            
            $ordered_items_id=$data->id;

            $ordered_items=ordereditems::find($ordered_items_id);

            $ordered_items->delete();


        }

        return redirect()->back()->with('message', 
        'We have received your order. We will connect with you soon ..');

    }
}
