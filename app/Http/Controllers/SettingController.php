<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Setting $setting)
    {
        $settings= $setting->orderby('sort', 'asc')->get();
//       dump($settings);
        return view('admin.setting.index', compact('settings'));
    }

    public function save(Request $request, Setting $setting)
    {
        $settings=$request->input('settings');
//        dump($settings); exit();
        foreach ($settings as $key=>$value){
            $value = ($value === null)? '': $value;
            $setting->where('key', $key)->update(['value'=>$value]);
        }
        alert('success change');
        return redirect()->route('admin.setting');
    }
}
