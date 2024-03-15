<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usersdata;

class DummyApi extends Controller
{
    public function  getData($id=null) {
        return  $id?usersdata::find($id):usersdata::all();
    }
}
