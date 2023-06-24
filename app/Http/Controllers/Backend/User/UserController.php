<?php

namespace App\Http\Controllers\Backend\User;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(Request $request)
    {
        try {
            $user = loggedInUser();
            $token = $user->tokens->first()->makeVisible(['token'])->token;

            return view('backend.user.profile', compact('user', 'token'));
        } catch (Exception $ex) {
            Log::info($ex);
        }
    }
}
