<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\AuthenticationManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResendLinkController extends Controller
{
    use AuthenticationManager;
    
    /**
     * Handle a resend magic link.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     *
     * @throws ValidationException
     */
    public function index(Request $request)
    {
        return $this->attempt($request);
    }
}
