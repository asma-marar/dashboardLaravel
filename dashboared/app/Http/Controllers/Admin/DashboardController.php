<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class DashboardController extends Controller
{
    public function index(){
        $users= User::where('role_as','0')->count();
        $products= Product::count();
        $orders= Order::count();
        $totalSales = Order::where('order_status', 'delivered')
        ->sum('order_total');

        return view('admin.dashboard' , compact('users' , 'products' , 'orders' , 'totalSales'));
    }

    
}
