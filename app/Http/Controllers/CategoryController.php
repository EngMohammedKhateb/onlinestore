<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Market;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index($id)
    {
        $market = Market::findorFail($id);
        return view('admin.markets.categories.index')->with('market',$market);
    }


    public function create($id)
    {
       $market = Market::findorFail($id);
       return view('admin.markets.categories.create')->with('market',$market);
    }

    public function store(Request $request)
    {
            $request->validate([
                'id'=>'required|integer',
                'name'=>'required|string',
                'image'=>'required|image|mimes:png,jpg,jpeg',
                'priority'=>'required|integer',

            ]);
            $category =new Category();
            $category->market_id=$request->id;
            $category->name=$request->name;
            $category->priority=$request->priority;
            $category->is_active=$request->is_active==null?0:1;
         if($request->hasFile('image')){

             $image = $request->image;
             $image_name = time() . $image->getClientOriginalName();
             $image->move('categories/', $image_name);
             $image = 'categories/' . $image_name;
             $category->image = $image;
             $category->save();
             toastr()->success('new category created successfully');
             return redirect()->route('admin.categories.index',['id'=>$request->id]);
         }
         toastr()->error('you cant create this category');
         return redirect()->back();
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(  $id)
    {
        $category = Category::findorFail($id);
        return view('admin.markets.categories.edit')->with('category',$category);
    }


    public function update(Request $request,   $id)
    {
        if($request->hasFile('image')){

            $image = $request->image;
            $image_name = time() . $image->getClientOriginalName();
            $image->move('categories/', $image_name);
            $image = 'categories/' . $image_name;
            $category=Category::findOrFail($id);
            $category->image = $image;
            $category->save();
            toastr()->success('category updated successfully');
            return redirect()->route('admin.categories.index',['id'=>$category->market->id]);
        }
    }


    public function destroy(Category $category)
    {
        //
    }
}
