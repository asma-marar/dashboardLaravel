<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class DashboardController extends Controller
{
    public function index(){
        $users= User::where('role_as','0')->count();
        $products= Product::count();
        return view('admin.dashboard' , compact('users' , 'products'));
    }

    
}
