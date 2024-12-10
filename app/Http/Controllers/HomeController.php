<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $appointments = DB::table('appointments')
            ->select('appointment', DB::raw('count(*) as total'))
            ->groupBy('appointment')
            ->get();

        // Get the requested year or default to the current year
        $year = $request->input('year', now()->year);

        // Aggregate appointments by month for the selected year
        $monthlyAppointments = DB::table('appointments')
            ->selectRaw('MONTH(date) as month, COUNT(*) as total')
            ->whereYear('date', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Initialize all months with 0 to ensure every month is represented
        $appointmentsData = collect(range(1, 12))->map(function ($month) use ($monthlyAppointments) {
            $data = $monthlyAppointments->firstWhere('month', $month);
            return [
                'month' => $month,
                'total' => $data ? $data->total : 0
            ];
        });

        $countall = Appointment::count();
        $countpending = Appointment::where('status', 'Pending')->count();
        $countapproved = Appointment::where('status', 'Approved')->count();
        $countrejected = Appointment::where('status', 'Cancelled')->count();
        return view('Admin.dashboard', compact('countall', 'countpending', 'countapproved', 'countrejected', 'appointments', 'appointmentsData', 'year'));
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
