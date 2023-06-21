<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\OrderedItems;

use App\Models\Order;



class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('home.userpage', compact('products'));

    }

    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.home');
        }

        else
        {
            $products = Product::paginate(10);
            return view('home.userpage', compact('products'));
        }
    }

    public function product_details($id)
    {

        $products = product::find($id);
        return view('home.product_details', compact('products'));
    }

}
