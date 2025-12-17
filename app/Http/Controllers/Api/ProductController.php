<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Product::with(['category', 'user_details'])->latest()->paginate(10)
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product = Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'category_id' => $request->category_id,
            'created_by'  => auth()->id()
        ]);

        return response()->json([
            'message' => 'Product created successfully',
            'data'    => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load([
            'category:id,name',
            'user_details:id,name,email'
        ]);

        return response()->json([
            'message' => 'Product created successfully',
            'data'    => $product
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'     => 'sometimes|string',
            'price'    => 'sometimes|numeric',
            'quantity' => 'sometimes|integer',
            'category_id' => 'sometimes|integer'
        ]);

        $product->update($request->all());

        return response()->json([
            'message' => 'Product updated successfully',
            'data'    => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
