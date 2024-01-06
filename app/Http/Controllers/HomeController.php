<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function bookCar($id)
    {
        try {
            $car = Car::find($id);
            $car->update([
                'is_booked' => 1,
                'user_id' => Auth::guard('web')->user()->id
            ]);

            return redirect()->back()->with('success', 'Car booked successfully');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function search(Request $request, $id)
    {
        $category = Category::find($id);
        $cars = Car::where('name', 'LIKE', '%' . $request->search . '%')->get();

        return view('pages.car-category', ['category' => $category, 'cars' => $cars]);
    }
}
