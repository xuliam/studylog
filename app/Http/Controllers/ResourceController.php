<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(Resource $resource)
    {
        $datas = $resource->orderBy('id', 'desc')->paginate(setting('page_resource'));
        return view('admin.resource.index', compact('datas'));
    }

    public function add(Request $request, Resource $resource)
    {
        $type = $request->input('type', null);
        if(!$type){
            alert('pls show me the type', 'danger');
            return redirect()->route('admin.resource');
        }
        return view('admin.resource.add', compact('type'));
    }

    public function save()
    {

    }

    public function up()
    {

    }

    public function remove()
    {

    }
}
