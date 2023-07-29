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
            'name.required' => 'هذا الحقل مطلوب إدخاله',
            'name.max' => 'عدد الحروف لا يزيد عن 100 حرف',
            'name.unique' =>'هذا العرض موجود مسبقا' ,
            'price.required' => 'هذا الحقل مطلوب إدخاله',
            'price.numeric' =>'هذا الحق يجب أن يكون رقما' ,
            'price.min' =>'هذا الحقل يجب أن لا يقل عن 1' ,
            'details.required' => 'هذا الحقل مطلوب إدخاله',
        ];

        $validator = Validator::make( $request->all(), $rules, $arabicMessages);

            if($validator -> fails()){
                return $validator->errors();
            }


        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details ,
        ]);

        session()->flash('success', 'Data has been stored successfully!');

        return redirect()->back();

    }
}
