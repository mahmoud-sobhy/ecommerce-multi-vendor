<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Traits\UploadTrait;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use UploadTrait;
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
        // return 'hello';
        $file_name = $this->saveImage($request->photo , 'images/products');

        $rules = $request->rules();
        $messages = $request->messages();

        $validatedData = $request->validated();

        
        // $validator = Validator::make( $request->all(), $rules, $messages);

            // if($validator -> fails()){
            //     return redirect()->back()->withErrors($validator)->withInput($request->all());
            // }

            // if($validatedData -> fails()){
            //     return redirect()->back()->withErrors($validatedData)->withInput($request->all());
            // }



        // Product::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'color' => $request->color,
        //     'photo' => $file_name,
        //     'country_of_origin' => $request->country_of_origin,
        //     'details' => $request->details ,
        // ]);

        Product::create([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'color' => $validatedData['color'],
            'photo' => $file_name,
            'country_of_origin' => $validatedData['country_of_origin'],
            'details' => $validatedData['details'],
        ]);

        session()->flash('success', 'تم إضافة المنتج بنجاح');

        return redirect()->back();

        // return response()->json(['message' => 'Data stored successfully']);

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
