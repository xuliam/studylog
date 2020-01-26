<?php

namespace App\Http\Controllers;

use App\Files;
use App\Http\Requests\ResourceWrite;
use App\Resource;
use http\Env\Response;
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
        $type = $resource->id ? $resource->type : $request->input('type');

        if(!$type){
            alert('pls show me the type', 'danger');
            return redirect()->route('admin.resource');
        }
        return view('admin.resource.add', compact('type', 'resource'));
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

        if($resource->id){
            $resource->update($data);
            $resource->{$relation}->update($data);
        }else{
            $resource->create($data)->{$relation}()->create($data);
        }
        });
        alert('Resources add success');
        return redirect()->route('admin.resource');

    }

    public function up(Request $request, Files $fileModel)
    {
        $result = [
          'success'=> false,
          'msg' => 'not success to upload',
          'file_path' => ''
        ];

        if(! $request->hasFile('image_file')){
            $result['msg'] = 'not choose pic';
            return response()->json($result);
        }

        $file = $request -> file('image_file');

        if(!$file->isValid()){
            $result['msg'] = $file->getErrorMessage();
            return response()->json($result);
        }

        if(!in_array($file->extension(), config('project.upload.image'))){
            $result['msg'] = 'this type is not allowed';
            return response()->json($result);
        }

        $file_path = $file->store('doc', 'public');

        $fileModel = $fileModel->saveFile('doc_editor', $file_path, $file);


        $result['success'] = true;
        $result['file_path'] = $fileModel->file_link;
        return $result;
    }

    public function remove(Resource $resource)
    {
        $resource->delete();
        alert('success delete');
        return back();
    }
}
