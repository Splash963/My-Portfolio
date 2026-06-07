<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Login Page එක පෙන්වන්න
    public function showLogin()
    {
        return view('auth.login'); // ඔයාගේ login blade එක තියෙන තැන (resources/views/auth/login.blade.php)
    }

    // 2. Register Page එක පෙන්වන්න
    public function showRegister()
    {
        return view('auth.register');
    }

    // 3. Register වෙද්දී දත්ත Database දාන එක (Registration Logic)
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // blade එකේ password_confirmation කියලා input එකක් තියෙන්න ඕනේ
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password එක Hash කරලා සේව් කරන්න ඕනේ!
        ]);

        Auth::login($user); // Register වුන ගමන් කෙලින්ම Log කරනවා

        return redirect('/home'); // ලොග් වුනාට පස්සේ යන්න ඕනේ පේජ් එක
    }

    // 4. ලොග් වෙද්දී චෙක් කරන එක (Login Logic)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Laravel වල 'Auth::attempt' එකෙන් ඔටෝම Database එක චෙක් කරලා Session එකක් හදනවා
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Security එකට Session ID එක අලුත් කරනවා
            return redirect()->intended('/dashboard');
        }

        // වැරදි නම් ආපහු මෙහෙම හරවලා යවනවා
        return back()->withErrors([
            'email' => 'Incorrect Email or Password!',
        ])->onlyInput('email');
    }

    // 5. Logout වීම
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/'); // Logout වුනාම Home එකට යනවා
    }
}
