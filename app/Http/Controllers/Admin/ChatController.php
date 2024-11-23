<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Messages;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    // Show chat with admin for a user
    public function chatWithAdmin()
    {
        // Get the admin user
        $admin = User::where('usertype', 'admin')->first();

        // Ensure an admin exists
        if (!$admin) {
            abort(404, 'Admin user not found.');
        }

        // Fetch messages between the logged-in user and the admin
        $messages = Messages::where(function ($query) use ($admin) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $admin->id);
        })
            ->orWhere(function ($query) use ($admin) {
                $query->where('sender_id', $admin->id)
                    ->where('receiver_id', auth()->id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        // Return the view with the admin and messages data
        return view('User.chat', compact('admin', 'messages'));
    }


    // Show chat with a specific user for admin

    public function showchat()
    {
        // Get the latest message for each user
        $list = Messages::with('sender') // Eager load sender
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('messages')
                    ->whereIn('sender_id', function ($subQuery) {
                        $subQuery->select('id')
                            ->from('users')
                            ->where('usertype', 'user'); // Filter users by usertype
                    })
                    ->groupBy('sender_id'); // Group by sender_id to get the latest message per sender
            })
            ->orderBy('created_at', 'desc') // Sort by most recent messages
            ->get();

        return view('Admin.chat.index', compact('list'));
    }

    public function chatWithUser($userId)
    {
        $user = User::findOrFail($userId);
        $authUserId = auth()->id();

        $messages = Messages::where(function ($query) use ($authUserId, $user) {
            $query->where('sender_id', $authUserId)
                ->where('receiver_id', $user->id);
        })
            ->orWhere(function ($query) use ($authUserId, $user) {
                $query->where('sender_id', $user->id)
                    ->where('receiver_id', $authUserId);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        $list = Messages::with('sender') // Eager load sender
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('messages')
                    ->whereIn('sender_id', function ($subQuery) {
                        $subQuery->select('id')
                            ->from('users')
                            ->where('usertype', 'user'); // Filter users by usertype
                    })
                    ->groupBy('sender_id'); // Group by sender_id to get the latest message per sender
            })
            ->orderBy('created_at', 'desc') // Sort by most recent messages
            ->get();

        return view('Admin.chat.chat', compact('user', 'messages', 'list'));
    }


    // Send a message
    //   public function sendMessage(Request $request)
    //   {
    //       $request->validate([
    //           'receiver_id' => 'required|exists:users,id',
    //           'message' => 'required|string',
    //       ]);

    //       Messages::create([
    //           'sender_id' => auth()->id(),
    //           'receiver_id' => $request->receiver_id,
    //           'message' => $request->message,
    //       ]);

    //       return back();
    //   }



    public function fetchMessages($admin_id)
    {
        $messages = Messages::where(function ($query) use ($admin_id) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $admin_id);
        })
            ->orWhere(function ($query) use ($admin_id) {
                $query->where('sender_id', $admin_id)
                    ->where('receiver_id', auth()->id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json(['messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|exists:users,id'
        ]);

        $message = Messages::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $validated['receiver_id'],
            'message' => $validated['message']
        ]);

        return response()->json(['message' => $message]);
    }
}
