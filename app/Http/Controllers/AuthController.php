<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Log;

class AuthController extends Controller
{
    public function index(){
        // Check if user is already logged in
        if (session('user_id')) {
            return redirect()->route('page.home');
        }

        return view('index');
    }

    public function showRegForm(){
        // Check if user is already logged in
        if (session('user_id')) {
            return redirect()->route('page.home');
        }

        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'fname' => 'required|string|max:100',
            'lname' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'bday' => 'required|date',
            'age' => 'required|integer|max:120',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:255|min:20',
            'contact_no' => 'required|numeric|digits:11',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $year = date('Y');
        $last = User::latest()->first(); // get the last user record
        $number = $last ? ((int) substr($last->stud_id, -4)) + 1 : 1; // increment the number or start at 1 if no users exist
        $stud_id = $year . '-' . str_pad($number, 4, '0', STR_PAD_LEFT); // format the student ID

        $users = User::create([
            'stud_id' => $stud_id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'bday' => $request->bday,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
            'contact_no' => $request->contact_no,
            'password' => $request->password,

        ]);

        $logs_events = Log::create([
            'user_id' => $users->id,
            'logs_type' => 'register',
            'logs_desc' => 'Student registered successfully.',

        ]);

        return redirect()->route('auth.login')->with('success', 'Registration successful. Please Login.');

    }

    public function showLoginForm(){
        //  Check if user is already logged in
        if (session('user_id')) {
            return redirect()->route('page.home');
        }

        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'stud_id' => 'required',
            'password' => 'required|string|min:8',
        ]);

        $users = User::where('stud_id', $request->stud_id)->first();
        if($users && Hash::check($request->password, $users->password)){
            session([
                'user_id' => $users->id,
                'fname'   => $users->fname,
                'stud_id' => $users->stud_id,
            ]);

            $logs_events = Log::create([
                'user_id' => $users->id,
                'logs_type' => 'login',
                'logs_desc' => 'Student Logged in successfully.',
            ]);

            return redirect()->route('page.home')->with('success', 'Login successful. Welcome back, ' . $users->fname . '!');
        }

        return back()->with('error', 'Invalid Student ID or Password. Please try again');
    }

    public function showHome(){
        //  Check if user is logged in
        if (! session('user_id')) {
            return redirect()->route('auth.login')->with('error', 'Please log in to continue.');
        }

        return view('page.home');
    }

    public function logout(Request $request){
        $user = session('user_id'); // Get the user ID from the session
        $logs_events = Log::create([
            'user_id' => $user,
            'logs_type' => 'logout',
            'logs_desc' => 'Student Logged out successfully.',
        ]);

        session()->flush();
        return redirect()->route('auth.login');
    }

    public function showProfile(){
        // Check if user is logged in
        if (! session('user_id')) {
            return redirect()->route('auth.login')->with('error', 'Please log in to continue.');
        }

        $uid = User::find(session('user_id'));
        return view('page.profile', compact('uid'));
    }

    public function showUpdateForm(){
        //  Check if user is logged in
        if (! session('user_id')) {
            return redirect()->route('auth.login')->with('error', 'Please log in to continue.');
        }

        $uid = User::find(session('user_id'));
        return view('page.updateprofile', compact('uid'));
    }

    public function update(Request $request){
        // Check if user is logged in
        if (! session('user_id')) {
            return redirect()->route('auth.login')->with('error', 'Please log in to continue.');
        }

        $uid = User::find(session('user_id'));

        $request->validate([
            'fname' => 'required|string|max:100',
            'lname' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $uid->id,
            'bday' => 'required|date',
            'age' => 'required|integer|max:120',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:255|min:20',
            'contact_no' => 'required|numeric|digits:11',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        // Update user data
        $data = $request->only([
            'fname',
            'lname',
            'email',
            'bday',
            'age',
            'gender',
            'address',
            'contact_no',
        ]);
        // Optional password update
        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        $uid->update($data);

        Log::create([
            'user_id' => $uid->id,
            'logs_type' => 'update',
            'logs_desc' => 'Student updated profile successfully.',
        ]);

        return redirect()->route('page.profile')->with('success', 'Profile updated successfully, ' . $uid->fname . '!');
    }
}
