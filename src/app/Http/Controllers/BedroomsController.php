<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BedroomsController extends Controller
{
    public function index()
    {
        return view("pages.bedrooms.index");
    }
}
