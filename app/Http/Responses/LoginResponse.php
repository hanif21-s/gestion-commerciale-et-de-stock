<?php

namespace App\Http\Responses;

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
        if(auth()->user()->is_admin){
            return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->route('admins.welcome');
        }

        if(auth()->user()->is_gerant){
            return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->route('gerant-dashboard');
        }

        if(auth()->user()->is_commercial){
            return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->route('commercial-dashboard');
        }

        if(auth()->user()->is_caissier){
            return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->route('caissier-dashboard');
        }
    }
}