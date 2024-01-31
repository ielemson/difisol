<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('inventory.product.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('inventory.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'status' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
                'file' => 'required|mimes:pdf',
            ]);

            //Upload product Image
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('/assets/images/products'), $imageName);

             // File Upoad
        $fileName = time().'.'.$request->file->extension();  
        $request->file->move(public_path('/assets/magazine/uploads'), $fileName);

            $product = Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'image' => $imageName,
                'price' => $request->price,
                'desc' => $request->description,
                'status' => $request->status,
                'file' => $fileName,
                'competiton_status' => $request->competiton_status,
                 'slug'=> Str::slug($request->input('name'))
            ]);

            
            if ($product) {
             return redirect('products')->with('success', 'New product created!');
            }

            return redirect('product/create')->with('error', 'Failed to create new product! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->first();
       $category = Category::where('id',$product->category_id)->first();
        return response()->json(['product'=>$product,'category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $categories = Category::all();
        return view('inventory.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $product = Product::find($id);

        try {
            

            if($request->hasFile('image')){

                $image_path = public_path('assets/products/images/'.$product->image);
                if(file_exists($image_path)){
                unlink($image_path);
                }
                // unlink("assets/images/products/$product->image");
                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('assets/images/products'), $imageName);
                
                $product->name = $request->name;
                $product->slug = Str::slug($request->name);
                $product->category_id = $request->category_id;
                $product->price = $request->price;
                $product->desc = $request->description;
                $product->status = $request->status;
                $product->competiton_status = $request->competiton_status;
                $product->image = $imageName;
                $product->save();
               
            }

            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->desc = $request->description;
            $product->status = $request->status;
            $product->competiton_status = $request->competiton_status;
            $product->save();
            
        
            if ($product) {
                // assign new role to the user
                // $user->syncRoles($request->role);

                return redirect('products')->with('success', 'New product created!');
            }

            return redirect('product/create')->with('error', 'Failed to create new product! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        return redirect('products')->with('success', 'Product deleted!');
    }
}
