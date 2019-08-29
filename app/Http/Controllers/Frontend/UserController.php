<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    { }

    //go to the user profile page
    public function userProfileChangeView()
    {
        $userProfile = Auth::user();
        return view('frontend.user_profile_change', compact('userProfile'));
    }

    //perform the changes
    public function userProfileChange(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'starts_with:01', 'digits:11'],
            'division' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:65535'],
        ]);

        $userProfile = Auth::user();

        $userProfile->name = $request->name;
        $userProfile->phone = $request->phone;
        $userProfile->division = $request->division;
        $userProfile->address = $request->address;
        $userProfile->save();
        return back()->with('success', 'Profile Updated Successful.');
    }

    //change Password
    public function changePasswordView()
    {
        return view('frontend.change_password');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::find(Auth::id());
        if (Hash::check($request->oldpassword, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Password Change Successful.');
        } else {
            return back()->with('error', 'Password Mismatch.');
        }
    }
}
