<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\schools;

class SchoolController extends Controller
{

    public function list(){

       // $result = schooldata::select('id','schoolname')->get();

        $schools = schools:: all();

        return $schools;


    }
    //
}
