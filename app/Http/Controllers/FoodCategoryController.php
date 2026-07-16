<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function index(Request $request)
    {
        $foods = FoodCategory::query();

        if ($request->search) {
            $foods->where('name', 'LIKE', '%'.$request->search.'%');
        }

        $foods = $foods->latest()->get();

        return view('food-category', compact('foods'));
    }

    public function addFood(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        FoodCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Food Added Successfully');
    }

    // food deleted
    public function deleteFood($id)
    {
        FoodCategory::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Food Deleted Successfully');
    }

    public function updateFood(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $food = FoodCategory::findOrFail($id);

        $food->name = $request->name;
        $food->save();

        return redirect()->back()->with('success', 'Food Updated Successfully');
    }

    // food
    // public function foods()
    // {
    //     $foods = Food::with('foodCategory')->latest()->get();
    //     $categories = FoodCategory::all();

    //     return view('foods', compact('foods', 'categories'));
    // }

    public function foods(Request $request)
    {
        $foods = Food::with('foodCategory');

        if ($request->filled('search')) {
            $search = $request->search;

            $foods->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('description', 'LIKE', "%{$search}%")
                      ->orWhere('price', 'LIKE', "%{$search}%")
                      ->orWhereHas('foodCategory', function ($q) use ($search) {
                          $q->where('name', 'LIKE', "%{$search}%");
                      });
            });
        }

        $foods = $foods->latest()->get();
        $categories = FoodCategory::all();

        return view('foods', compact('foods', 'categories'));
    }

    public function add_Food(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'status' => 'required',
        ]);

        $food = new Food();

        $food->category_id = $request->category_id;
        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->status = $request->status;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('food_images'), $imageName);

            $food->image = $imageName;
        }

        $food->save();

        return back()->with('success', 'Food Added Successfully');
    }

    // edit food

    public function update_Food(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
        ]);

        $food = Food::findOrFail($id);

        $food->category_id = $request->category_id;
        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->status = $request->status;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($food->image && file_exists(public_path('food_images/'.$food->image))) {
                unlink(public_path('food_images/'.$food->image));
            }

            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('food_images'), $imageName);

            $food->image = $imageName;
        }

        $food->save();

        return redirect()->back()->with('success', 'Food Updated Successfully');
    }

    // delete food
      public function delete_Food($id)
      {
          Food::findOrFail($id)->delete();

          return redirect()->back()->with('success', 'Food Deleted Successfully');
      }
}
