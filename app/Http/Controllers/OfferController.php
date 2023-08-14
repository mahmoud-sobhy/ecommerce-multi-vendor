<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Events\VisitTheVideo;
use App\Models\ViewerCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;
use App\Traits\UploadTrait;

class OfferController extends Controller
{
    use UploadTrait;

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

        //save photo in folder
        //
        //this part of code we import it from "UploadTrait"
        //
        // $file_extension = $request->photo -> getClientOriginalExtension();
        // $file_name = uniqid() . time() . '.'. $file_extension;
        // $path = 'images/offers';
        // $request->photo->move( $path, $file_name);


        $file_name = $this->saveImage($request->photo , 'images/offers');


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
            'photo' => $file_name,
        ]);

        session()->flash('success', 'تم إضافة العرض بنجاح');

        return redirect()->back();

    }



    public function edit(Offer $offer, $id){

        $offer = Offer::where('id', $id)->first();
        return view('offers.edite')->with('offer', $offer);
        // return view('offers.edite',['offer'=> $offer]);
        // return view('offers.edite', compact('offer'));
    }


    public function update(Request $request, $id){

        //dont forget validation 
        
        // Offer::where('id',$id)->update( $request->except(['_token']));
        //     session()->flash('success', 'تم تعديل العرض بنجاح');
        //     return redirect()->back();

        Offer::where('id',$id)->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
        ]);
            session()->flash('success', 'تم تعديل العرض بنجاح');
            return redirect()->route('offers.index');
    }

    public function destroy($id){
        $offer = Offer::find($id)->delete();
            
        return redirect()->back();
    }




################# this example on event and listener###########
    public function getviewvideo(){
        $viewers = ViewerCount::first();
        event(new VisitTheVideo($viewers));
        return view('eventvideo')->with('viewers' , $viewers);
    }
################################################################




}
