<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;

class OfferController extends Controller
{

    public function index(){
        // $offers = Offer::get();
        // return 'hello';
        // return view('offers.show')->with('offers',$offers);
        // return view('offers.show', compact('offers', 'offers'));
        $offers = Offer::select('id', 'price',
        'name_'.LaravelLocalization::getCurrentLocale() .' as name',
        'details_'.LaravelLocalization::getCurrentLocale() .' as details')->get();
        return view('offers.show', ['offers' => $offers]);
    }


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
            'name_ar' => 'required|max:100|unique:offers,name_ar',
            'name_en' => 'required|max:100|unique:offers,name_en',
            'price' => 'required|numeric|min:1',
            'details_ar' => 'required',
            'details_en' => 'required',
        ];

        $errorMessages = [
            'name_ar.required' => __('messages.name_required'),
            'name_en.required' => __('messages.name_required'),
            'name_ar.max' =>  __('messages.name_max') ,
            'name_en.max' =>  __('messages.name_max') ,
            'name_ar.unique' =>  __('messages.name_unique')  ,
            'name_en.unique' =>  __('messages.name_unique')  ,
            'price.required' =>   __('messages.price_required') ,
            'price.numeric' =>  __('messages.price_numeric') ,
            'price.min' =>  __('messages.price_min')  ,
            'details_ar.required' =>  __('messages.details_required') ,
            'details_en.required' =>  __('messages.details_required') ,
        ];

        $validator = Validator::make( $request->all(), $rules, $errorMessages);

            if($validator -> fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }


        Offer::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
        ]);

        session()->flash('success', 'تم إضافة العرض بنجاح');

        return redirect()->back();

    }
}
