<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Event;
use App\Models\Contact;
use App\Models\Service;
use App\Models\DoctorList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogFormRequest;
use App\Http\Requests\EventFormRequest;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\ServiceFormRequest;

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
        $employees = DoctorList::all();
        return view('Admin.add-activity.add-employee', compact('employees'));
    }


    public function uploadDoctor(Request $request)
    {
        $doctor = new DoctorList();

        $doctor->name = $request->name;
        $doctor->position = $request->position;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgName = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('Doctors'), $imgName);
            $doctor->image = $imgName;
        }

        $doctor->save();

        return redirect()->back()->with('success', 'Record Added');
    }

    public function addStaff()
    {
        return view('Admin.add-activity.Employee.add-staff');
    }

    // Blog
    public function blog()
    {
        $blogs = Blog::latest()->get();
        return view('Admin.add-activity.blog', compact('blogs'));
    }

    // Store Blog 
    public function storeBlog(BlogFormRequest $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('uploads/blogs'), $imgName);
            $blog->img = $imgName;
        }

        $blog->save();
        return redirect()->back()->with('blog', $blog)->with('statusblog', 'Blog Uploaded');
    }

    // Add Services
    public function service()
    {
        $services = Service::latest()->get();
        return view('Admin.add-activity.service', compact('services'));
    }

    // Service Store
    public function serviceStore(ServiceFormRequest $request)
    {
        $service = new Service;
        $service->service = $request->service;
        $service->description = $request->description;
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('uploads/service'), $imgName);
            $service->img = $imgName;
        }

        $service->save();
        return redirect()->back()->with('service', $service)->with('serviceStatus', 'Service Added');
    }

    // Add Contact
    public function contact()
    {
        return view('Admin.add-activity.contact');
    }


    // Contact Store
    public function contactStore(ContactFormRequest $request)
    {
        $contact = new Contact;
        $contact->cpnumber = $request->cpnumber;
        $contact->email = $request->email;
        $contact->save();
        return redirect()->back()->with('contact', $contact)->with('contactStatus', 'Contact Added');
    }


    // Summernote
    public function summernote()
    {
        return view('Admin.summernote');
    }
}
