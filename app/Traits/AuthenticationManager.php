<?php

namespace App\Traits;

use App\Models\User;
use App\Notifications\SentMagicLink;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Grosv\LaravelPasswordlessLogin\LoginUrl;

trait AuthenticationManager
{
    protected function createUser(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return $this->attempt($request);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attempt(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) return $this->sendSuccessResponse(
            $user, $request->segment(FIRST_ITERATION)
        );

        return $this->sendFailedResponse($request);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendSuccessResponse(User $user, string $type)
    {
        $generator = new LoginUrl($user);

        $generator->setRedirectUrl('/home'); 

        $user->notify(new SentMagicLink($user->name, $generator->generate()));

        return redirect("/$type?action=LINK_SENT&email={$user->email}");
    }

     /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

}