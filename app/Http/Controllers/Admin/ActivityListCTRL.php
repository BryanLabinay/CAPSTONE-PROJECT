<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventFormRequest;

class ActivityListCTRL extends Controller
{

    // Event List
    public function eventlist()
    {
        $eventlist = Event::latest()->paginate(7);

        foreach ($eventlist as $event) {
            $event->formattedTimestamp = $event->created_at->diffForHumans();
        }

        return view('Admin.activity-list.event-list', compact('eventlist'));
    }

    // Edit Event
    public function eventEdit($event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('Admin.activity-list.event-update', compact('event'));
    }

    // Update event
    public function eventUpdate(EventFormRequest $request, $event_id)
    {
        // Retrieve the validated input data
        $validated = $request->validated();

        // Find the existing event
        $event = Event::findOrFail($event_id);

        // Handle file upload if a new file is provided
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $validated['img'] = $filename;
        }

        // Update the event with validated data
        $event->update($validated);

        return redirect()->route('event-list')->with('messageupdate', 'Updated Event');
    }


    // Delete Event
    public function deleteEvent($event_id)
    {
        $event = Event::find($event_id)->delete();
        return redirect()->back()->with('eventdelete', 'Event Deleted');
    }
}
