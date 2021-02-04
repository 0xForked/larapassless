<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Traits\AuthenticationManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticationManager;

    /**
     * Show the application's login form.
     *
     * @return View
     */
    public function index()
    {
        return view('pages.auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param LoginRequest $request
     * @return RedirectResponse|Response
     *
     * @throws ValidationException
     */
    public function login(LoginRequest $request)
    {
       return $this->attempt($request);
    }    
}
