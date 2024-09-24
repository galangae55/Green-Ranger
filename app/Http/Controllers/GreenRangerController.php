<?php

// app/Http/Controllers/GreenRangerController.php

namespace App\Http\Controllers;

use App\Models\Komen;
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

    public function belanja(){
        return view("belanja");
    }

    public function detail(){
        return view("detail", [
            'comments' => Komen::all()
        ]);
    }
    public function detail2(){
        return view("detail2", [
            'comments' => Komen::all()
        ]);
    }
    public function detail3(){
        return view("detail3", [
            'comments' => Komen::all()
        ]);
    }
    public function detail4(){
        return view("detail4", [
            'comments' => Komen::all()
        ]);
    }
    public function detail5(){
        return view("detail5", [
            'comments' => Komen::all()
        ]);
    }
    public function detail6(){
        return view("detail6", [
            'comments' => Komen::all()
        ]);
    }
    public function volunteer(){
        return view("volunteer");
    }

    public function login(){
        return view("login");
    }

}
