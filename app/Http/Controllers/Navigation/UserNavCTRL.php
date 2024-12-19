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
        return view('User.appointment', compact('service', 'consultation'));
    }

    // Calendar
    public function calendar()
    {
        $appointments = Auth::user()->appointments()
            ->select('appointment', 'date', 'message') // Select only the required fields
            ->get();
        return view('User.calendar', compact('appointments'));
    }


    public function events()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        foreach ($events as $event) {
            $event->formattedTimestamp = $event->created_at->diffForHumans();
        }
        return view('User.events', compact('events'));
    }
}
