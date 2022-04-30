<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index($id)
    {
       return view('admin.markets.categories.products.index')->with('id',$id);
    }


    public function create($id)
    {
         $category=Category::findOrFail($id);
         return view('admin.markets.categories.products.create')->with('category',$category);
    }


    public function store(Request $request)
    {

        $request->validate([
            'id'=>'required|integer',
            'name'=>'required|string',
            'description'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'priority'=>'required|integer',
            'discount'=>'required|string',
            'price'=>'required|string',
            'company'=>'required|string',
        ]);

        $product =new Product();
        $product->name=$request->name;
        $product->description=$request->description;
        $product->category_id=$request->id;
        $product->user_id=auth()->user()->id;
        $product->priority=$request->priority;
        $product->is_active=$request->is_active==null?0:1;
        $product->has_discount=$request->has_discount==null?0:1;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->company=$request->company;

        if($request->hasFile('image')){

            $image = $request->image;
            $image_name = time() . $image->getClientOriginalName();
            $image->move('products/', $image_name);
            $image = 'products/' . $image_name;
            $product->image = $image;
            $product->save();
            toastr()->success('new product created successfully');
            return redirect()->route('admin.products.index',['id'=>$request->id]);
        }
        toastr()->error('you cant create this product');
        return redirect()->back();
    }


    public function show($id)
    {
        $product=Product::findOrFail($id);
        return view('admin.markets.categories.products.show')->with('product',$product);

    }

    public function edit(  $id)
    {
        $product=Product::findorFail($id);
        return view('admin.markets.categories.products.edit')->with('product',$product);
    }


    public function update(Request $request,   $id)
    {

        $request->validate([
            'name'=>'required|string',
            'description'=>'required',
            'priority'=>'required|integer',
            'discount'=>'required|string',
            'price'=>'required|string',
            'company'=>'required|string',
        ]);

        $product = Product::findOrFail($id);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->priority=$request->priority;
        $product->is_active=$request->is_active==null?0:1;
        $product->has_discount=$request->has_discount==null?0:1;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->company=$request->company;

        if($request->hasFile('image')){

            $image = $request->image;
            $image_name = time() . $image->getClientOriginalName();
            $image->move('products/', $image_name);
            $image = 'products/' . $image_name;
            $product->image = $image;

        }
        $product->save();
        toastr()->success('product updated successfully');
        return redirect()->route('admin.products.index',['id'=>$product->category_id]);
    }


    public function destroy(Product $product)
    {

    }
}
