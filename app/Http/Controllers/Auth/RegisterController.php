<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Traits\AuthenticationManager;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RegisterController extends Controller
{
    use AuthenticationManager;
   
    /**
     * Show the application's register form.
     *
     * @return View
     */
    public function index()
    {
        return view('pages.auth.register');
    }

    /**
     * Handle a register request to the application.
     *
     * @param RegisterRequest $request
     * @return RedirectResponse|Response
     *
     * @throws ValidationException
     */
    public function register(RegisterRequest $request)
    {
        return $this->createUser($request);
    }

}
