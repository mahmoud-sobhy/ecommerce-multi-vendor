<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $rules =[
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric|min:1',
            'details' => 'required',
            'color' => 'required',
            'itemWeight' => 'required',
            'countryOfOrigin' => 'required',
        ];

        $errorMessages = [
            'name.required' => __('messages.name_required'),
            'name.max' =>  __('messages.name_max') ,
            'name.unique' =>  __('messages.name_unique')  ,
            'price.required' =>   __('messages.price_required') ,
            'price.numeric' =>  __('messages.price_numeric') ,
            'price.min' =>  __('messages.price_min')  ,
            'details.required' =>  __('messages.details_required') ,
        ];

        $validator = Validator::make( $request->all(), $rules, $errorMessages);

            if($validator -> fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }


        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'color' => $request->color,
            'item_weight' => $request->itemWeight,
            'country_of_origin' => $request->countryOfOrigin,
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
    public function edit(Product $product)
    {
        //
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
