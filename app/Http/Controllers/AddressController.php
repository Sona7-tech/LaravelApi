<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
class AddressController extends Controller
{


    //if we are not getting anything in id we should be get null
    function list($id=null){
        //if we have id so find because of id
        return $id?Address::find($id):Address::all();
    }

    function add(Request $request){

        $address = new Address();
        $address->country=$request->country;
        $address->city=$request->city;
        $address->student_id=$request->student_id;
        $result = $address->save();
        if($result){
            return ["Result"=>"Data has been saved"];
        }
        else{
            return ["Result"=>"Operation failed"];
        }
    
    }

    function update(Request $request,$id){

        $address= Address::find($request->id);
        $address->country=$request->country;
        $address->city=$request->city;
        $address->student_id=$request->student_id; 
        $result = $address->save();
        if($result){
            return Address::find($id);
        }
        else{
            return ["Result"=>"Operation failed"];
        }
    }

    function search($country){

        return Address::where("country","like", "%".$country."%")->get();
    }

    function delete($id){

        $address = Address::find($id);
        $result = $address->delete();
        if($result){
            return ["result"=>"record has been deleted ".$id];
        }
        else{
            return ["result"=>"Operation failed ".$id];
        }

        
    }


    public function store(Request $request)
    {
        Address::create($request->all());
    }
}