<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function auth()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();

            if ($usertype == 'admin') {
                return redirect()->route('admin.chat', ['id' => $userId]);
            } else if ($usertype == 'user') {
                return redirect()->route('user.chat', ['id' => $userId]);
            }
        }

        // Optional: Handle cases where the user is not authenticated
        return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
    }


    // Admin Route
    public function index()
    {
        return view('Admin.Chat.chat');
    }

    public function userChat()
    {
        $user = Auth::user();
        return view('User.chat', ['user' => $user]);
    }
}
