<?php

namespace App\Http\Controllers\Api;


use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\MainController;

class AuthController extends MainController
{
    public function Register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'confirmed',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/\d/',
                'regex:/[@$!%*#?&]/',
            ]
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors()->first());
        }
        $userRole = Role::where('name', 'user')->first();
        if (!$userRole) {
            return $this->notFoundResponse('auth.user_role_not_found');
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            // dd($request->all());
            $token = $user->createToken('auth-token')->plainTextToken;
            $userData = new UserResource($user);
            return $this->successResponse('auth.user_created', (object)['token' => $token, 'user_data' => $userData]);
        } catch (QueryException $e) {
            Log::error('Database error during register process: ' . $e->getMessage(), [
                'sql' => $e->getSql(),
                'bindings' => $e->getBindings()
            ]);
            return $this->genericErrorResponse('auth.database_error', ['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            Log::error('General error : ' . $e->getMessage());
            return $this->genericErrorResponse();
        }
    }




    public function login(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|exists:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/\d/',
                'regex:/[@$!%*#?&]/',
            ]
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors()->first());
        }
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->validationErrorResponse('auth.invalid_credentials');
        }

        try {

            $token = $user->createToken('auth-token')->plainTextToken;
            $userData = new UserResource($user);
            return $this->successResponse('auth.user_login', (object)['token' => $token, 'user_data' => $userData]);
        } catch (Exception $e) {
            Log::error('General error : ' . $e->getMessage());
            return $this->genericErrorResponse();
        }
    }



    public function logout(Request $request)
    {
        try {
            if ($request->user()->currentAccessToken()) {
                $request->user()->currentAccessToken()->delete();
            } else {
                return $this->unauthorizedResponse('auth.invalid_token');
            }
            return $this->successResponse('auth.logged_out');
        } catch (Exception $e) {
            Log::error('General error : ' . $e->getMessage());
            return $this->genericErrorResponse();
        }
    }
}
