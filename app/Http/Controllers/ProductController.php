<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::select('*')->get();
        return view('products.show', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(ProductRequest $request)
    {

        $rules = $request->rules();
        $messages = $request->messages();

        $validator = Validator::make( $request->all(), $rules, $messages);

            if($validator -> fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'color' => $request->color,
            'item_weight' => $request->item_weight,
            'country_of_origin' => $request->country_of_origin,
            'details' => $request->details ,
        ]);

        session()->flash('success', 'تم إضافة المنتج بنجاح');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.edite')->with('offer', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
