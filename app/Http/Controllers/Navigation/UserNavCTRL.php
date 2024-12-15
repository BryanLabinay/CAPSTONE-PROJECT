<?php

namespace App\Http\Controllers\Navigation;

use App\Models\Event;
use App\Models\Service;
use App\Models\DoctorList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Consultation;

class UserNavCTRL extends Controller
{
    // Doctor and Staff Route
    public function doctorstaff()
    {
        $doctorStaff = DoctorList::all();
        return view('User.doctor-staff', compact('doctorStaff'));
    }

    // Services Route
    public function services()

    {
        $service = Service::all();
        return view('User.services', compact('service'));
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
        return view('User.calendar');
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
