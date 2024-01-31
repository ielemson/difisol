<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
    return view('inventory.category.index',compact('categories'));
    }
    public function store(Request $request){
        try {
            $category = Category::create(['cat_name' => $request->cat_name]);
         

            if ($category) {
                return redirect('categories')->with('success', 'Category created succesfully!');
            }

            return redirect('categories')->with('error', 'Failed to create category! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }

    }

    public function update(Request $request){

        $category = Category::where('id',$request->id)->first();
        $category->cat_name = $request->cat_name;
        $category->status = $request->status;
        $category->save();
        return response()->json(['status'=>'Category update successfully']);
    }
}
