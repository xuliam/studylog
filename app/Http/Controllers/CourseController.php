<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Course;
use App\Files;
use App\Http\Requests\ChapterWrite;
use App\Http\Requests\CourseWrite;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request, Course $course)
    {
        $courses = $course->orderBy('sort', 'asc')->get();
        return view ('admin.course.index', compact('courses'));
    }

    public function detail(Request $request, Course $course)
    {
        $course;
        return view ('admin.course.detail', compact('course'));

    }

    public function add(Request $request, Course $course)
    {
        $course;
        return view ('admin.course.add', compact('course'));

    }

    public function save(CourseWrite $request, Course $course, Files $fileModel)
    {
        $data = $request->validated();
        $data['image'] ='';

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $file = $request ->file('image');
            if (!in_array($file->extension(), config('project.upload.image'))){
                alert('this type is not allowed', 'danger');
                return redirect()->back();
            }
            $data['image'] = $file->store('course', 'public');
            $fileModel->saveFile('course_image', $data['image'], $file);
        }

        if($course->id){
            $course->update($data);
        }else{
            $course->create($data);
        }
        alert('save success');
        return redirect()->route('admin.course');
    }

    public function remove(Request $request, Course $course)
    {
        $course->delete();
        alert('delete success');
        return back();
    }

    public function chapterAdd(Request $request, Course $course, Chapter $chapter)
    {
        $course;
        $chapter;
        return view ('admin.course.chapter_add', compact('course', 'chapter'));

    }

    public function chapterSave(ChapterWrite $request, Course $course, Chapter $chapter)
    {
     $data = $request->validated();
     $data['course_id'] = $course->id;

     if ($chapter->id){
         $chapter=$chapter->update($data);
     }else{
         $chapter=$chapter->create($data);
     }

    alert('success');
    return redirect()->route('admin.course.detail', [$course->id]);
    }

    public function chapterRemove(Request $request, Course $course, Chapter $chapter)
    {
//        dump($chapter); exit();
        $chapter->delete();
        alert('Delete Success');
        return redirect()->route('admin.course.detail', [$course->id]);
    }

    public function resourceAdd(Request $request, Course $course, Chapter $chapter)
    {
        $course;
        $chapter;
        return view ('admin.course.resource_add', compact('course', 'chapter'));

    }

    public function resourceSave(Request $request, Course $course, Chapter $chapter)
    {
        $resource_ids = $request->input('resource_id');
        $sort = $request->input('sort');
//        dump($resource_ids, $sort);
        $post = [];
        foreach ($resource_ids as $key => $resource_id){
            if(!$resource_id || !$sort[$key]){
                continue;
            }
            $post[$resource_id] = [
                'sort' => $sort[$key],
            ];
        }
//        dump($post);
        $chapter->resource()->sync($post);
        alert('success');
        return redirect()->route('admin.course.resource.add', [$course->id, $chapter->id]);
    }


}
