<?php 

namespace App\Responsables;

use Illuminate\Contracts\Support\Responsable;
use Socialite;
use Auth;
use App\{User, UserSocialAccount};

class SocialLoginResponsable implements Responsable
{
    /**
     * @var provider
     */
    protected $provider;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct($provider = null)
    {
        $this->provider = $provider;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        // get the user from oauth 2.0
        if ($user = Socialite::driver($this->provider)->user()) {

            // check if the user has an account
            if ($the_user = User::getUserByEmail($user->email)) {

                // log the user in
                Auth::login($the_user);
            } else {

                // Crate the user and adicional data
                $this->createUserAndSetData($user);
            }
            
            // redirect
            return redirect('home');
        } else {
            // permission denied
            abort(403);
        }
    }

    /**
     * Crate the user and adicional data
     *
     * @param user
     * @return void
     */
    private function createUserAndSetData($user): void
    {
        // create user
        $newUser = new User;
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->social = 1;
        $newUser->password = bcrypt(123456789);
        $newUser->save();

        // login the user
        Auth::login($newUser);

        // set the password to null because no password was provided
        $newUser->password = NULL;
        $newUser->save();

        // create user data for social login
        $social = new UserSocialAccount;
        $social->user_id = $newUser->id;
        $social->provider = $this->provider;
        $social->uid_provider = $user->id;
        $social->save();
    }
}
