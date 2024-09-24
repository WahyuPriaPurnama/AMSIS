<?php

namespace App\Http\Controllers;

use App\Models\ProductStock;
use Illuminate\Http\Request;

class ProductAddMoreController extends Controller
{
    public function addMore()
    {
        return view('addMore2');
    }

    public function addMorePost(Request $request)
    {
        $request->validate([
            'addmore.*.name' => 'required',
            'addmore.*.qty' => 'required',
            'addmore.*.price' => 'required',
        ]);

        foreach ($request->addmore as $key => $value) {
            ProductStock::create($value);
        }
        return back()->with('success', 'Record created successfully');
    }
}
