<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;


class UserAuthController extends Controller
{
    /**
     * Login The User
     *
     * @param Request $request
     * @bodyParam email string required
     * @bodyParam password string required
     * @response {
     * "status": "true",
     * "message": "Your login was successful",
     * "token": "14|DEH8me6SQE8Ze69f8WFfP1h"
     * }
     *
     * @unauthenticated
     * @group User Login
     */
    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Your email or password are incorrect',
                ], 401);
            }

            $user = $request->user();

            return response()->json([
                'status' => true,
                'message' => 'Your login was successful',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Logout
     * user (Revoke the token)
     * @response {
     * "message": "Successfully logged out",
     * }
     * @group User Login
     * @authenticated
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
