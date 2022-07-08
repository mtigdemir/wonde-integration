<?php

namespace App\Http\Controllers;

use App\Wonde;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function index()
    {
        $schools = Wonde::getSchools();
        return view('authorization', compact('schools'));
    }

    /**
     * Check Teacher Credentials
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $request->validate([
            'teacherId' => 'required|alpha_num',
            'schoolId' => 'required|alpha_num'
        ]);

        $teacherId = $request->get('teacherId');
        $schoolId = $request->get('schoolId');

        if (Wonde::login($schoolId, $teacherId)) {
            return redirect('home');
        }

        return redirect()->back()->with('message', 'Account can not find, please contact with us.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect('/');
    }
}
