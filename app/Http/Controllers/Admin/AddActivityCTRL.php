<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventFormRequest;

class AddActivityCTRL extends Controller
{

    public function addEvent()
    {
        $eventlist = Event::latest()->get();

        foreach ($eventlist as $event) {
            $event->formattedTimestamp = $event->created_at->diffForHumans();
        }

        return view('Admin.add-activity.add-event', compact('eventlist'));
        // return view('Admin.add-activity.add-event');
    }

    //    Store Event
    public function storeEvent(EventFormRequest $request)
    {
        $data = new Event();
        $data->title = $request->title;
        $data->description = $request->description;
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('uploads'), $imgName);
            $data->img = $imgName;
        }

        $data->save();
        return redirect()->back()->with('data', $data)->with('statusevent', 'Event Added');
    }

    // Edit Event
    public function eventEdit($event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('Admin.activity-list.event-update', compact('event'));
    }

    // Delete Event
    public function deleteEvent($event_id)
    {
        $event = Event::find($event_id)->delete();
        return redirect()->back()->with('eventdelete', 'Event Deleted');
    }

    // Add Employee
    public function addDoctor()
    {
        return view('Admin.add-activity.Employee.add-doctor');
    }

    public function addStaff()
    {
        return view('Admin.add-activity.Employee.add-staff');
    }

    // Blog
    public function blog()
    {
        return view('Admin.add-activity.blog');
    }

    // Add Services
    public function service()
    {
        return view('Admin.add-activity.service');
    }

    // Add Contact
    public function contact()
    {
        return view('Admin.add-activity.contact');
    }
}
