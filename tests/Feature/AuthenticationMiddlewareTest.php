<?php

namespace Tests\Middleware;

use Tests\TestCase;
use App\Wonde;

class AuthenticationMiddlewareTest extends TestCase
{
    public function test_that_teacher_should_redirect_when_not_authenticated()
    {
        $this->get('home')
            ->assertStatus(302)
            ->assertRedirect('/');
    }

    public function test_that_teacher_should_see_home_page_when_authenticated()
    {
        Wonde::fake();

        $this->withSession([
                'teacherId' => 'A1234',
                'schoolId' => 'A5678'
            ])->get('home')
            ->assertStatus(200);
    }
}
