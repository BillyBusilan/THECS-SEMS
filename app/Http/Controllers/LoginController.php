<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class LoginController extends Controller
{
    public function __invoke()
    {
        
    }
    public function showLoginPage()
    {
        return view ('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idNumber' => 'required|string|max:20',
            'password' => 'required|string|min:6' ,
        ]);

        $credentials = [
            'id_number' => $request->idNumber,
            'password' => $request->password
        ];

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $remember = $request->has('remembeMe');

        // Use the following if you prefer SQL statements over Laravel's attempt ()
        
/*         $user = User::where('id_number', $request->idNumber)->first();

        if(!$user||!Hash::check($request->password, $user->password)){
            
            Log::warning('Failed login attempt', [
                'id_number'=>$request->idNumber,
                'ip_address'=>$request->ip(),
                'user_agent'=>$request->userAgent()
            ]);

            return redirect()->back()
                ->withErrors(['login'=>'Invalid ID number or password.'])
                ->withInput($request->only('idNumber'));
        }
        Auth::login($user, $remember);
        $request->session()->regenerate();
        
        Log::info('User logged in successfully', [
            'user_id'=> Auth::id(),
            'id_number'=>$request->idNumber,
            'ip_address'=>$request->ip(),
            'user_agent'=>$request->userAgent()
        ]);
        return redirect()->intended(route('admin-dashboard')); */
        
        if (Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();        

            Log::info('User logged in successfully', [
                'user_id'=>Auth::id(),
                'id_number'=>$request->idNumber,
                'ip_address'=>$request->ip(),
                'user_agent'=>$request->userAgent()
            ]);

            return redirect()->intended('admin-dashboard');
        } 
        Log::warning('Failed login attempt', [
            'id_number'=>$request->idNumber,
            'ip_address'=>$request->ip(),
            'user_agent'=>$request->userAgent()
        ]);

        return redirect()->back()
            ->withErrors(['login' => 'Invalid ID number or password.'])
            ->withInput($request->only('idNumber'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

