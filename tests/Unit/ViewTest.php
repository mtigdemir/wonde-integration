<?php

namespace Tests\Unit;

use Tests\TestCase;

class ViewTest extends TestCase
{
    public function test_that_home_page_should_render_with_teacher_fullname()
    {
        $response = file_get_contents(base_path('tests/responses/employee.json'));
        $teacher = json_decode($response)->data;

        $this->view('home', compact('teacher'))
            ->assertSee('Welcome '.$teacher->title.'. '.$teacher->forename.' '.$teacher->surname);
    }

    public function test_that_classroom_should_have_students_table()
    {
        $response = file_get_contents(base_path('tests/responses/classes.json'));
        $class = json_decode($response)->data;

        $firstStudent = $class->students->data[0];
        $secondStudent = $class->students->data[1];
        $this->view('class.studentList', compact('class'))
            ->assertSee($firstStudent->forename.' '.$firstStudent->middle_names)
            ->assertSee($firstStudent->surname)
            ->assertSee($secondStudent->forename.' '.$secondStudent->middle_names)
            ->assertSee($secondStudent->surname);
    }
}
