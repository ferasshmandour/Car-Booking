<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.index', ['categories' => $categories]);
    }

    public function carsByCategory($id)
    {
        $cars = Car::all();
        $category = Category::find($id);
        return view('pages.car-category', ['category' => $category, 'cars' => $cars]);
    }
}
