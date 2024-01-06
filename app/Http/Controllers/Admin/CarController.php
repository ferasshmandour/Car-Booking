<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Car;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{

    public function index()
    {
        return redirect('/admin-dashboard/cars');
    }

    public function cars()
    {
        $cars = Car::all();
        return view('admin.cars.all-cars', ['cars' => $cars]);
    }

    public function addCar()
    {
        $categories = Category::all();
        return view('admin.cars.add-car', ['categories' => $categories]);
    }

    public function storeCar(Request $request)
    {
        try {
            $formFields = $request->validate([
                'name' => 'required',
                'manufacturing_year' => 'required',
                'price' => ['required', 'numeric'],
                'color' => 'required',
                'photo' => 'mimes:png,jpg,jpeg',
                'category' => 'required'
            ]);

            if ($request->hasFile('photo')) {
                $formFields['photo'] = $request->file('photo')->store('images', 'public');
            }

            $admin = Admin::where('id', 1)->first();

            Car::create([
                'name' => $formFields['name'],
                'manufacturing_year' => $formFields['manufacturing_year'],
                'price' => $formFields['price'],
                'color' => $formFields['color'],
                'photo' => $formFields['photo'],
                'category_id' => $formFields['category'],
                'admin_id' => $admin->id
            ]);

            return redirect('/admin-dashboard/cars');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function editCar($id)
    {
        $car = Car::find($id);
        $categories = Category::all();
        return view('admin.cars.edit-car', ['categories' => $categories, 'car' => $car]);
    }

    public function updateCar(Request $request, $id)
    {
        try {
            $formFields = $request->validate([
                'name' => 'required',
                'manufacturing_year' => 'required',
                'price' => ['required', 'numeric'],
                'color' => 'required',
                'photo' => 'mimes:png,jpg,jpeg',
                'category' => 'required'
            ]);

            if ($request->hasFile('photo')) {
                $formFields['photo'] = $request->file('photo')->store('images', 'public');
            }

            $car = Car::find($id);

            $car->update([
                'name' => $formFields['name'],
                'manufacturing_year' => $formFields['manufacturing_year'],
                'price' => $formFields['price'],
                'color' => $formFields['color'],
                'photo' => isset($formFields['photo']) ? $formFields['photo'] : $car->photo,
                'category_id' => $formFields['category'],
            ]);

            return redirect('/admin-dashboard/cars');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteCar($id)
    {
        Car::find($id)->delete();
        return redirect('/admin-dashboard/cars');
    }
}
