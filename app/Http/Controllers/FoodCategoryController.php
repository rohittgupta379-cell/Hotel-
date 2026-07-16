<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    // food category show
    public function index(Request $request)
    {
        $foods = FoodCategory::query();

        if ($request->search) {
            $foods->where('name', 'LIKE', '%'.$request->search.'%');
        }

        $foods = $foods->latest()->get();

        return view('food-category', compact('foods'));
    }

    // Add Food Cateroty
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

    // food deleted Cateroty
   public function deleteFood($id)
   {
       FoodCategory::findOrFail($id)->delete();

       return redirect()->back()->with('success', 'Food Category Deleted Successfully');
   }

     // food update Cateroty
    public function updateFoodcategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $food = FoodCategory::findOrFail($id);

        $food->name = $request->name;
        $food->save();

        return redirect()->back()->with('success', 'Food Updated Successfully');
    }

    // show food
   public function foods(Request $request)
   {
       $foods = Food::with('foodCategory');

       // Search
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

       // Category Filter (Breakfast, Lunch, Dinner)
       if ($request->filled('category')) {
           $category = $request->category;

           $foods->whereHas('foodCategory', function ($q) use ($category) {
               $q->where('name', $category);
           });
       }

       $foods = $foods->latest()->get();
       $categories = FoodCategory::all();

       return view('foods', compact('foods', 'categories'));
   }


    // Add food
    public function add_Food(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:food_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required',
        ]);

        $food = new Food();

        $food->category_id = $request->category_id;
        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->status = $request->status;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('food_images'), $imageName);

            $food->image = $imageName;
        }

        $food->save();

        return back()->with('success', 'Food Added Successfully');
    }


    // update food
    public function update_Food(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:food_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required',
        ]);

        $food = Food::findOrFail($id);

        $food->category_id = $request->category_id;
        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->status = $request->status;

        if ($request->hasFile('image')) {
            if ($food->image && file_exists(public_path('food_images/'.$food->image))) {
                unlink(public_path('food_images/'.$food->image));
            }

            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('food_images'), $imageName);

            $food->image = $imageName;
        }

        $food->save();

        return back()->with('success', 'Food Updated Successfully');
    }


    // delete food
    public function delete_Food($id)
    {
        $food = Food::findOrFail($id);

        if ($food->image && file_exists(public_path('food_images/'.$food->image))) {
            unlink(public_path('food_images/'.$food->image));
        }

        $food->delete();

        return back()->with('success', 'Food Deleted Successfully');
    }
}
