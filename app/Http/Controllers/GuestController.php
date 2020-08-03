<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class GuestController extends Controller
{
    public function index()
    {
        $categories = Category::all()->where('deleted','=','0');
        return view('welcome', compact('categories'));
    }
}
