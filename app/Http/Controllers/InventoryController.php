<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index()
    {
        // Check permission
        // if (!Auth::user()->hasPermissionTo('view inventory')) {
        //     return redirect()->route('dashboard')->withErrors('You do not have permission to view the inventory.');
        // }
        $this->authorize('view inventory');

        $products = Product::all();
        return view('inventory.index', compact('products'));
    }

    public function create()
    {
        // if (!Auth::user()->hasPermissionTo('create product')) {
        //     return redirect()->route('inventory.index')->withErrors('You do not have permission to create a product.');
        // }
        $this->authorize('create product');

        return view('inventory.create');
    }

    public function store(Request $request)
    {
        // if (!Auth::user()->hasPermissionTo('create product')) {
        //     return redirect()->route('inventory.index')->withErrors('You do not have permission to create a product.');
        // }
        $this->authorize('create product');

        $product = Product::create($request->all());
        return redirect()->route('inventory.index')->with('success', 'Product created successfully.');
    }
}
