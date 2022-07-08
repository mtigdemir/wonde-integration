<?php

namespace App\Http\Controllers;

use App\Wonde;

class HomeController extends Controller
{
    public function home()
    {
        $teacher = Wonde::getTeacherWithClasses();

        return view('home', compact('teacher'));
    }

    public function showClass(string $classId)
    {
        $class = Wonde::getClassWithStudents($classId);

        return view('class.studentList', compact('class'));
    }
}
