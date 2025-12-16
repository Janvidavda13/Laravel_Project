<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::with('category')
                ->where('created_by', auth()->id());

            return datatables()->of($products)
                ->addColumn('category', fn($p) => $p->category->name)
                ->addColumn('action', function ($p) {
                    return '
                    <a href="'.route('products.edit',$p).'" class="btn btn-sm btn-info">Edit</a>
                    <button onclick="deleteProduct('.$p->id.')" class="btn btn-sm btn-danger">Delete</button>
                    ';
                })
                ->make(true);
        }

        return view('products.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('products.form', compact('categories'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateProduct($request);

        Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'category_id' => $request->category_id,
            'created_by'  => auth()->id(),
        ]);

        return redirect()->route('products.index')->with('success', 'Product added');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorizeProduct($product);

        $categories = Category::pluck('name', 'id');
        return view('products.form', compact('product', 'categories'));
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
        $this->authorizeProduct($product);
        $this->validateProduct($request);

        $product->update($request->only('name','price','quantity','category_id'));

        return redirect()->route('products.index')->with('success', 'Product updated');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorizeProduct($product);
        $product->delete();

        return response()->json(['success' => true]);
    }
    private function validateProduct($request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
        ]);
    }

    private function authorizeProduct(Product $product)
    {
        if ($product->created_by !== auth()->id()) {
            abort(403);
        }
    }
}
