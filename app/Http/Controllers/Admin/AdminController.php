<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        AdminHelper::middleware($this);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function helps()
    {
        $helps = Help::orderBy('created_at', 'desc')->get();
        $avarageFeedback = Help::avg('feedback');
        $avarageFeedback = round($avarageFeedback, 2);
        return view('admin.helps', compact('helps', 'avarageFeedback'));
    }

    public function changePasswordView()
    {
        return view('admin.change_password');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $admin = Admin::find(Auth::id());
        if (Hash::check($request->oldpassword, $admin->password)) {
            $admin->password = Hash::make($request->password);
            $admin->save();
            return back()->with('success', 'Password Change Successful.');
        } else {
            return back()->with('error', 'Password Mismatch.');
        }
    }
}
