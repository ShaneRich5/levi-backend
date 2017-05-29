<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use Validator;
use Centaur\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class RegistrationController extends Controller 
{

    /** @var Centaur\AuthManager */
    protected $authManager;

    /**
     * Creates a new instance of registration controller
     */
    public function __construct(AuthManager $authManager) 
    {
        $this->authManager = $authManager;
    }

    public function register(Request $request, Response $response)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'credentials invalid'
            ]);
        }

        // Assemble registration credentials
        $credentials = [
            'email' => trim($request->get('email')),
            'password' => $request->get('password'),
        ];

        // Attempt the registration
        $result = $this->authManager->register($credentials, true);
        
        if ($result->isFailure()) {
            return response()->json([
                'error' => 'register failed'
            ]);
        }

        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }
}