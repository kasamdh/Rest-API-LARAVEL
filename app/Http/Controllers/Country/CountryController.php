<?php

namespace App\Http\Controllers\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CountryModel;
use Validator;

class CountryController extends Controller
{   
    //Function to get all country data in JSON format
    public function country(){

        return response()->json(CountryModel::get(), 200 );
    }
    // function to get all country data in JSON format by ID
    public function countryByID($id){
        $Country = CountryModel::find($id);

        if(is_null($Country)){
            return response()->json(["message"=>"Record Not Found!"],404);
        }
         return response()->json($Country,200);

    }
     // function to POST Country info
    public function countrySave(Request $request){

        $rules =[
            'name'=>'required|min:3',
            'iso'=>'required|min:3|max:5',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->JSON($validator->errors(),400);
        }
        $Country = CountryModel::create($request->all());
        return response()->json($Country, 201);

    }
    //function to update country
    public function countryUpdate(Request $request, $id){
        $Country= CountryModel::find($id);
        if(is_null($Country)){
            return response()->json(["message"=>"Record Not Found!"],404);

        }

        $Country ->update($request->all());
        return response()->json($Country, 201);

    }

    public function countryDelete(Request $request, $id){
        $Country= CountryModel::find($id);
        if(is_null($Country)){
            return response()->json('Record Not Found!',404);

        }

        $Country->delete();
        return response()->json(null, 204);



    }
}
