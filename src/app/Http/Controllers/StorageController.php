<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function index() {
        return view("pages.storage.index");
    }
}
