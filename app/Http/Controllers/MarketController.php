<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{

    public function index()
    {
        $markets = Market::all();
        return view('admin.markets.index')->with('markets',$markets);
    }


    public function create()
    {
       return view('admin.markets.create');
    }


    public function store(Request $request)
    {

         $request->validate([
             'name'=>'required|string',
             'image'=>'required|image|mimes:png,jpg,jpeg',
             'priority'=>'required|integer',

         ]);

            $market =new Market();
            $market->name=$request->name;
            $market->priority=$request->priority;
            $market->is_active=$request->is_active==null?0:1;

         if($request->hasFile('image')){

             $image = $request->image;
             $image_name = time() . $image->getClientOriginalName();
             $image->move('markets/', $image_name);
             $image = 'markets/' . $image_name;
             $market->image = $image;
             $market->save();
             toastr()->success('new market created successfully');
             return redirect()->route('admin.markets.index');
         }
        toastr()->error('you cant create this market');
        return redirect()->back();


    }

    public function show(Market $market)
    {

    }

    public function edit( $id)
    {
        $market = Market::findorFail($id);
        return view('admin.markets.edit')->with('market',$market);
    }


    public function update(Request $request,   $id)
    {
        if($request->hasFile('image')){

            $image = $request->image;
            $image_name = time() . $image->getClientOriginalName();
            $image->move('markets/', $image_name);
            $image = 'markets/' . $image_name;
            $market = Market::findorFail($id);
            $market->image = $image;
            $market->save();
            toastr()->success('market updated successfully');
            return redirect()->route('admin.markets.index');
        }
    }


    public function destroy(Market $market)
    {
        //
    }
}
