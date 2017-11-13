<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Traits\Guest;
use App\Responsables\SocialLoginResponsable;

class SocialController extends Controller
{
    use Guest;

    public function getSocialAuth($provider = null)
    {
        if (!config('services.' . $provider)) {
            abort(404);
        }
        return Socialite::driver($provider)->redirect();
    }

    public function getSocialAuthCallback($provider = null)
    {
        return new SocialLoginResponsable($provider);
    }
}
