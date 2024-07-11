<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchase_orders = PurchaseOrder::all();
        return view('purchase_orders.index', ['purchase_orders' => $purchase_orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchase_orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->address);
        $validateData = $request->validate([
            'name' => 'required',
            'supplier' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'number' => 'required|unique:purchase_orders',
            'date' => 'required',
            'npwp' => 'required',
            'items' => 'required',
            'unit' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'total_price' => 'required',
            'top' => 'required',
            'grand_price' => 'required',
            'discount' => '',
            'ppn' => '',
            'grand_total' => 'required',
            'delivery_date' => 'required',
            'shipping_address' => 'required',
        ]);


        PurchaseOrder::create($validateData);
        return redirect()->route('purchase_orders.index')->with('alert', "Input data {$validateData['name']} berhasil");
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }
}
