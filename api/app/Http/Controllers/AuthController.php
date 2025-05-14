<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|unique:users|max:255',
            'phoneNumber' => 'required|unique:users|max:255',
            'confirmPassword' => 'required|string|max:255',
        ]);

        $register = User::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'phone_number' => $request->phoneNumber,
            'role_id' => 1,
            'password' => bcrypt($request->confirmPassword),
        ]);

        if (!$register) {
            return false;
        } else {
            return response()->json(["data" => $request->all()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        User::updated([
            'last_login_at' => now()
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            "data" => "Success",
            "token" => $token,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    // Usa o 'with()' para carregar a relação 'role' junto com o usuário
    $user = User::with('role')->find(Auth::id());

    return response()->json([
        'data' => $user,
        'role' => $user->role,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
