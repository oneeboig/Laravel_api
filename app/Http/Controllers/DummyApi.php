<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usersdata;

class DummyApi extends Controller
{
    public function  getData($id = null)
    {
        return  $id ? usersdata::find($id) : usersdata::all();
    }
    public function adddata(Request $req)
    {
        $user = new usersdata;
        $user->Name = $req->Name;
        $user->Email = $req->Email;
        $result = $user->save();
        if ($result) {
            return ["result" => "data saved sucessfully"];
        } else {
            return ["result" => "Try again"];
        }
    }
    public function updatedata(Request $req)
    {
        $user = usersdata::find($req->id);
        $user->Name = $req->Name;
        $user->Email = $req->Email;
        $result = $user->save();
        if ($result) {
            return ["result" => "data updated sucessfully"];
        } else {
            return ["result" => "Try again"];
        }
    }
    public function  searchData($name = null)
    {
        $result = usersdata::where("name", $name)->get();
        if (count($result) > 0) {
            return $result;
        } else {
            return $name . " is not found";
        }
    }
    public function  CharaSearchData($name = null)
    {
        $result = usersdata::where("name", "like", "%" . $name . "%")->get();
        if (count($result) > 0) {
            return $result;
        } else {
            return $name . " is not found";
        }
    }
    public function deletedata($id)
    {
        $userdata = usersdata::find($id);
        if ($userdata) {
            $result = $userdata->delete();
            if ($result) {
                return ["Result" => "User Deleted Successfully"];
            } else {
                return ["Result" => "Something Went Wrong!"];
            }
        } else {
            return "No User Found!";
        }
    }
}
