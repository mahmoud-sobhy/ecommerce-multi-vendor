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

        $arabicMessages = [
            'name.required' => __('validationMessages.name_required'),
            'name.max' => __('validationMessages.name_max'),
            'name.unique' => __('validationMessages.name_unique') ,
            'price.required' => __('validationMessages.price_required'),
            'price.numeric' => __('validationMessages.price_numeric'),
            'price.min' => __('validationMessages.price_min') ,
            'details.required' => __('validationMessages.details_required'),
        ];

        $validator = Validator::make( $request->all(), $rules, $arabicMessages);

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
