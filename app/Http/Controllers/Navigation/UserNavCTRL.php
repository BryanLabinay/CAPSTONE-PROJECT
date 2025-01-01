<?php

namespace App\Http\Controllers\Navigation;

use App\Models\Event;
use App\Models\Contact;
use App\Models\Service;
use App\Models\DoctorList;
use App\Models\Appointment;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;

class UserNavCTRL extends Controller
{
    // Home
    public function home()
    {
        $services = Service::all();
        $events = Event::all();
        $consultation = Consultation::all();
        $blog = Blog::all();
        $contact = Contact::all();

        return view('dashboard', compact('services', 'events', 'consultation', 'blog', 'contact'));
    }

    // Doctor and Staff Route
    public function doctorstaff()
    {
        $doctorStaff = DoctorList::all();
        return view('User.doctor-staff', compact('doctorStaff'));
    }

    // Services Route
    public function services($service)

    {
        $services = Service::where('service', $service)->get();
        return view('User.services', compact('services', 'service'));
    }

    // Appointment
    public function appointment()
    {
        $service = Service::all();
        $consultation = Consultation::all();

        // Fetch dates with 3 or more appointments that are either 'approved' or 'rescheduled'
        $fullyBookedDates = Appointment::select('date')
        ->whereIn('status', ['approved', 'rescheduled'])  // Correct status filter
        ->groupBy('date')
        ->havingRaw('COUNT(*) >= 3')  // Limit to dates with 3 or more appointments
        ->pluck('date')
        ->toArray();

        return view('User.appointment', compact('service', 'consultation', 'fullyBookedDates'));
    }




    // Calendar
    public function calendar()
{
    // Get appointments filtered by status (Approved and Rescheduled)
    $appointments = Auth::user()->appointments()
        ->select('appointment', 'date', 'message')
        ->whereIn('status', ['Approved', 'Rescheduled'])
        ->get();

    // Get all events
    $events = Event::all();

    // Get fully booked dates (those with 3 or more appointments)
    $fullyBookedDates = Auth::user()->appointments()
        ->select('date')
        ->whereIn('status', ['Approved', 'Rescheduled']) // Only include approved or rescheduled appointments
        ->groupBy('date') // Group by date
        ->havingRaw('COUNT(*) >= 3') // Limit to dates with 3 or more appointments
        ->pluck('date') // Extract dates as an array
        ->toArray();

    // Pass appointments, events, and fullyBookedDates to the view
    return view('User.calendar', compact('appointments', 'events', 'fullyBookedDates'));
}


    // News & Updates
    public function events()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        foreach ($events as $event) {
            $event->formattedTimestamp = $event->created_at->diffForHumans();
        }
        return view('User.News.events', compact('events'));
    }

    public function eventView($id)
    {
        $event = Event::findOrFail($id);

        return view('User.News.view-events', compact('event'));
    }
}
