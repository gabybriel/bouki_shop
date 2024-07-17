<?php

namespace app\Http\Responses;

use Laravel\Fortify\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        if (auth()->user()->is_admin) {
            return $request->wantsJson()
                ? response()->json(['two_factor' => false])
                : redirect()->route('admin-dashboard');
        }

        if (auth()->user()->is_vendor) {
            return $request->wantsJson()
                ? response()->json(['two_factor' => false])
                : redirect()->route('vendor-dashboard');
        }

        if (auth()->user()->is_danied) {
            return $request->wantsJson()
                ? response()->json(['two_factor' => false])
                : redirect()->route('my-dashboard');
        }

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended(Fortify::redirects('login'));
    }
}
