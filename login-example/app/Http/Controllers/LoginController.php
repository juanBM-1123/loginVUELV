<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            //Auth::login($user);
            $request->session()->regenerate();
            $user = User::where('email',$request["email"])->firstOrFail();
            $token = $user->createToken("token")->plainTextToken;
            return response()->json(
                [
                    "result"=>true,
                    "user"=>Auth::user(),
                    "message"=>"Authorized",
                    "token"=>$token,
                ],200
            );
        }
        
        return response()->json(
            [
                "result"=>false,
                "message"=>"Unauthorized"
            ],400
        );
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }

    public function logout(Request $request){
        //Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        auth()->user()->tokens()->delete();
        return response()->json(
            [
                "state"=>true,
                "message"=>"You'v done logout"
            ]
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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