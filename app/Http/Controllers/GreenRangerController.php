<?php

// app/Http/Controllers/GreenRangerController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class GreenRangerController extends Controller
{
    public function homepage(){
        return view("index");
    }

    public function donate(){
        return view("donate");
    }

    public function event(){
        return view("event");
    }

    public function blog(){
        return view("blog");
    }

    public function contact(){
        return view("contact");
    }

    public function detail(){
        return view("detail");
    }

    public function volunteer(){
        return view("volunteer");
    }

    public function login(){
        return view("login");
    }

}
