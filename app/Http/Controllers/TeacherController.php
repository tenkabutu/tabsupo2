<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\teachers;

class TeacherController extends Controller
{
    public function list(){

        $teachers = teachers:: all();

    return $teachers;

    }
}
