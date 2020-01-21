<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResourceWrite;
use App\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResourceController extends Controller
{
    public function index(Resource $resource, Request $request)
    {
        $resource = $resource->with('adminUser');

        $search = new \stdClass();
        $search->keyword = $request->input('keyword', '');
        $search->adminuser_id = $request->input('adminuser_id', '');
        $search->type = $request->input('type', null);
//        dump($search);

        if ($search->keyword){
            $resource=$resource->where('title', 'like', "%{$search->keyword}%");
        }
        if ($search->adminuser_id){
            $resource=$resource->where('adminuser_id', $search->adminuser_id);
        }
        if ($search->type){
            $resource = $resource->whereIn('type', $search->type);
        }

        $datas = $resource->orderBy('id', 'desc')->paginate(setting('page_resource'));
        return view('admin.resource.index', compact('datas', 'search'));
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

    public function save(ResourceWrite $request, Resource $resource)
    {
    $data= $request->validated();
    $data['adminuser_id'] = Auth::guard('admin')->id();
//    dump($data);

    DB::transaction(function ()use($resource, $data){
        switch ($data['type']){
            case \App\Resource::VIDEO:
                $relation ='video';
                break;
            case \App\Resource::DOC:
                $relation = 'doc';
                break;
            default:
                abort('403', 'no type');
        }

        $resource->create($data)->{$relation}()->create($data);
        });
        alert('Resources add success');
        return redirect()->route('admin.resource');

    }

    public function up()
    {

    }

    public function remove()
    {

    }
}
