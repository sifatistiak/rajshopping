<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Help;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HelpController extends Controller
{
    public function helpPage()
    {
        return view('frontend.help');
    }
    public function submitHelp(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'message' => 'nullable|string|max:65000',
            'feedback' => 'nullable|integer'
        ]);
        $help = new Help;
        $help->name = $request->name;
        $help->email = $request->email;
        $help->message = $request->message;
        $help->feedback = $request->feedback;
        $help->save();
        return back()->with('success','Submit successful . Thank You!');

    }
}
