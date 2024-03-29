<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usersdata;

class DummyApi extends Controller
{
    public function  getData($id=null) {
        return  $id?usersdata::find($id):usersdata::all();
    }
    public function adddata(Request $req){
        $user = new usersdata;
        $user->Name=$req->Name;
        $user->Email=$req->Email;
        $result=$user->save();
        if($result){
            return ["result"=>"data saved sucessfully"];
        }
        else{
            return ["result"=>"Try again"];
        }
    }
    public function updatedata(Request $req){
        $user = usersdata::find($req->id);
        $user->Name=$req->Name;
        $user->Email=$req->Email;
        $result=$user->save();
        if($result){
            return ["result"=>"data updated sucessfully"];
        }
        else{
            return ["result"=>"Try again"];
        }
    }
}
