<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function create(){
        return view('offers.create');
    }


    public function store(Request $request){

        // Offer::where('id')->truncate();
        // $offer = Offer::create([
        //     'name' => 'mahmoud sobhy',
        //     'price' => '100',
        //     'details' => 'this is offer no.1',
        // ]);
        // return $offer;


        //make a validation

        $rules =[
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric|min:1',
            'details' => 'required',
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


        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details ,
        ]);

        session()->flash('success', 'تم إضافة العرض بنجاح');

        return redirect()->back();

    }
}
