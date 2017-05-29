<?php

namespace App\Http\Repositories\Auth;

use Exception;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Users\UserInterface;
use Tymon\JWTAuth\Providers\Auth\AuthInterface;

class SentinelAuthAdapter implements AuthInterface
{
    public function byCredentials(array $credentials = [])
    {
        try {
            $user = Sentinel::authenticate($credentials);
            return $user instanceof UserInterface;
        } catch (Exception $e) {
            return false;
        }
    }

    public function byId($id)
    {
        try {
            $user = Sentinel::findById($id);
            Sentinel::login($user);
            return $user instanceof UserInterface && Sentinel::check();
        } catch (Exception $e) {
            return false;
        }
    }

    public function user()
    {
        return Sentinel::getUser();
    }
}
