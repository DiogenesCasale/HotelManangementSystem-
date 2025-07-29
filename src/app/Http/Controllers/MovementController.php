<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovementController extends Controller
{
    public function index()
    {
        return view("pages.finance.movement.index");
    }
}
