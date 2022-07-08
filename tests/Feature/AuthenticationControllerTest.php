<?php

namespace Tests\Middleware;

use App\Wonde;
use Tests\TestCase;

class AuthenticationControllerTest extends TestCase
{
    public function test_when_teacher_id_must_be_present()
    {
        $this->post('login')
            ->assertSessionHasErrors(['teacherId', 'schoolId']);
    }

    public function test_when_wonde_resource_exists_should_redirect_to_home()
    {
        Wonde::fake();

        $this->post('login', [
            'teacherId' => 'A1234',
            'schoolId' => 'A6789'
        ])->assertRedirect('home');
    }
}
