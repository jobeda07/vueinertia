<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('frontend/product/Index',[
            'products'=>Product::latest()->get()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return Inertia::render('frontend/product/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Product::create($request->validate([
        //     'name' => ['required', 'max:50'],
        //     'price' => ['required', 'max:50'],
        //   ]));
        $request->validate([
            'name' => ['required', 'max:50'],
            'price' => ['required', 'max:50'],
        ]);
        Product::create([
            'name' =>$request->name,
            'price' =>$request->price,
          ]);
        return to_route('products.index')->with('message','Product Create SuccessFully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
