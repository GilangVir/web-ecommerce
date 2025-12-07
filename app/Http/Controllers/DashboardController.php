<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $my_product = Product::where('creator_id', Auth::id())->get();
        $my_revenue = ProductOrder::where('creator_id', Auth::id())->where('is_paid', 1)->sum('total_price');
        $total_order_success = ProductOrder::where('creator_id', Auth::id())->where('is_paid', 1)->get();
        $total_order_belum_laku = ProductOrder::where('creator_id', Auth::id())->where('is_paid', 0)->get();

        return view('admin.dashboard', [
            'my_product' => $my_product,
            'my_revenue' => $my_revenue,
            'total_order_success' => $total_order_success,
            'total_order_belum laku'=> $total_order_belum_laku
        ]);
    }
}
