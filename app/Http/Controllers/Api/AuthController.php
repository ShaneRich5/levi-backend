<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use Validator;
use Centaur\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller 
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
                return response()->json([
                    'status' => 'error',
                    'error' => 'invalid_credentials',
                    'message' => 'Invalid Credentials'
                    ], 401);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json([
                'status' => 'error',
                'error' => 'token_expired',
                'message' => 'Login again'
                ]);

        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json([
                    'status' => 'error',
                    'error' => 'invalid_credentials',
                    'message' => 'Invalid Credentials'
                    ], 401);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function login(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
        
                return response()->json([
                    'status' => 'error',
                    'error' => 'invalid_credentials',
                    'message' => 'Invalid Credentials'
                    ], 401);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json([
                'status' => 'error',
                'error' => 'token_expired',
                'message' => 'Login again'
                ]);

        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json([
                'status' => 'error',
                'error' => 'could_not_create_token',
                'message' => 'Unable to create token'], 500);
        }

        // all good so return the token
        return response()->json([
            'token' => $token,
            'user' => JWTAuth::toUser($token)
        ]);
        // return response([
        //     'status' => 'success'
        // ])
        // ->header('Authorization', $token);
    }

    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }

    public function user(Request $request)
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json([
                'status' => 'error',
                'error' => 'token_expired',
                'message' => 'Login again'
                ]);

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }
}