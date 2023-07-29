<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

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

        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details ,
        ]);

        session()->flash('success', 'Data has been stored successfully!');

        return redirect()->back();

    }
}
