<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productOrders = ProductOrder::where('creator_id', Auth::id())->get();
        return view('admin.product_orders.index',[
            'productOrders' => $productOrders
        ]);
    }

    // creator tidak bisa membeli produknya sendiri, maka menampilkan transaksi pembeli berdasarkan buyer_id
    public function transaction()
    {
        $transactions = ProductOrder::where('buyer_id', Auth::id())->get();
        
        return view('admin.product_orders.transaction', [
        'transactions' => $transactions
        ]);
    }

    public function transaction_detail(ProductOrder $productOrder)
    {
        // dd($transactions);
        return view('admin.product_orders.transaction_details', [
            'value' => $productOrder
        ]);
    }

    public function downloadFile(ProductOrder $productOrder)
    {
        $user = Auth::id();
        $product_id = $productOrder->product_id; 

        $value = ProductOrder::where('buyer_id', $user)
            ->where('product_id', $product_id)
            ->where('is_paid', 1)
            ->first();
        
        if(!$value)
        {
            session()->flash('error', 'Anda tidak dapat mengunduh file ini karna belum melakukan pembayaran');
            return redirect()->back();
        }

        $productDetails = Product::find($product_id);
        $filePath = $productDetails->path_file;

        if(!Storage::disk('public')->exists($filePath)){
            abort(404);
        }

        /** @var \Illuminate\Filesystem\FilesystemAdapter */
        return Storage::disk('public')->download($filePath);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductOrder $productOrder)
    {
        // dd($productOrder);
        return view('admin.product_orders.details', [
            'value' => $productOrder
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductOrder $productOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductOrder $productOrder)
    {
        // dd($productOrder);
        $productOrder->update(['is_paid' => true]);
        return redirect()->back()->with('message', 'Order success updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductOrder $productOrder)
    {
        //
    }
}
