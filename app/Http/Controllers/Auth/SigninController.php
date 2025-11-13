<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SigninRequest;
use App\Models\User;
use App\Support\AttributeEncryptor;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.signin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SigninRequest $request)
    {
        $body = $request->validated();
        $body['username'] = AttributeEncryptor::encrypt($body['username']);
        $user = User::query()
            ->select('username', 'password')
            ->where('username', $body['username'])
            ->first();

        if (!$user || !Auth::attempt($body)) {
            return response()->json([
                'status' => 'error',
                'message' => 'The provided credentials are incorrect.',
                'data' => null,
            ], 422);
        }

        $request->session()->regenerate();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully signed in.',
            'data' => null,
        ]);
    }
}
