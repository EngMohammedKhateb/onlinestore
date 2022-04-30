<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $settings=Setting::all();
        return view('admin.settings.index')->with('settings',$settings);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'property_key'=>'required|string',
            'property_value'=>'required'
        ]);

        $setting = new Setting();
        $setting->property_name=$request->property_key;
        $setting->property_value=$request->property_value;
        $setting->save();

        toastr()->success('new setting created successfully');
        return redirect()->route('admin.settings.index');
    }


    public function edit($id)
    {
        $setting =Setting::findOrFail($id);
        return view('admin.settings.edit')->with('setting',$setting);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'property_key'=>'required|string',
            'property_value'=>'required'
        ]);

        $setting = Setting::findOrFail($id);
        $setting->property_name=$request->property_key;
        $setting->property_value=$request->property_value;
        $setting->save();

        toastr()->success('settings updated successfully');
        return redirect()->route('admin.settings.index');
    }


    public function destroy(Setting $setting)
    {

    }
}
