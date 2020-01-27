<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Course;
use App\Files;
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
        return view ('admin.course.detail');

    }

    public function add(Request $request, Course $course)
    {
        return view ('admin.course.add');

    }

    public function save(CourseAdd $request, Course $course, Files $fileModel)
    {

    }

    public function remove(Request $request, Course $course)
    {
        $course->delete();
        alert('delete success');
        return back();
    }

    public function chapterAdd(Request $request, Course $course, Chapter $chapter)
    {
        return view ('admin.course.chapter_add');

    }

    public function chapterSave(Request $request, Course $course, Chapter $chapter)
    {

    }

    public function chapterRemove(Request $request, Course $course, Chapter $chapter)
    {

    }

    public function resourceAdd(Request $request, Course $course, Chapter $chapter)
    {
        return view ('admin.course.resource_add');

    }

    public function resourceSave(Request $request, Course $course, Chapter $chapter)
    {

    }


}
