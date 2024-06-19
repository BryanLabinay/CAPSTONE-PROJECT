<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countall = Appointment::count();
        $countpending = Appointment::where('status', 'Pending')->count();
        $countapproved = Appointment::where('status', 'Approved')->count();
        $countrejected = Appointment::where('status', 'Cancelled')->count();
        return view('Admin.dashboard', compact('countall', 'countpending', 'countapproved', 'countrejected'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function auth()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'admin') {
                return redirect()->route('admin.dash');
            } else if ($usertype == 'user') { {
                    return redirect()->route('dashboard');
                }
            }
        }
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
