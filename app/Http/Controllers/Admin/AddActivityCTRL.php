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
use Illuminate\Support\Facades\Auth;

class AddActivityCTRL extends Controller
{

    // Event
    public function addEvent()
    {
        $eventlist = Event::latest()->get();

        foreach ($eventlist as $event) {
            $event->formattedTimestamp = $event->created_at->diffForHumans();
        }

        return view('Admin.add-activity.Event.add-event', compact('eventlist'));
        // return view('Admin.add-activity.add-event');
    }

    //    Store Event
    public function storeEvent(EventFormRequest $request)
    {
        $data = new Event();
        $data->admin_id = Auth::id();
        $data->title = $request->title;
        $data->description = $request->description;
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('uploads/events'), $imgName);
            $data->img = $imgName;
        }

        $data->save();
        return redirect()->back()->with('data', $data)->with('statusevent', 'Event Added');
    }

    // View Event
    public function viewEvent($id)
    {
        $eventShow = Event::findOrFail($id);
        $events = Event::all();
        return view('Admin.add-activity.Event.event-view', compact('eventShow', 'events'));
    }

    // Edit Event 
    public function editEvent($id)
    {
        $event = Event::findOrFail($id);
        $events = Event::all();
        return view('Admin.add-activity.Event.event-edit', compact('event', 'events'));
    }


    // Update Event
    public function updateEvent(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $event = Event::findOrFail($id);
        $event->title = $request->title;
        $event->description = $request->description;

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads/events'), $imageName);
            $event->img = $imageName;
        }

        $event->save();

        return redirect()->back()->with('update', 'Event updated');
    }

    // Delete Event
    public function deleteEvent($id)
    {
        $event = Event::find($id)->delete();
        return redirect()->route('add.event')->with('eventdelete', 'Event Deleted');
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
        $doctor->admin_id = Auth::id();
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
        return view('Admin.add-activity.Blog.blog', compact('blogs'));
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

    // View Blog
    public function viewBlog($id)
    {
        $blogView = Blog::findOrFail($id);
        $blogs = Blog::all();
        return view('Admin.add-activity.Blog.blog-view', compact('blogView', 'blogs'));
    }

    // Edit Blog 
    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blogs = Blog::all();
        return view('Admin.add-activity.Blog.blog-edit', compact('blog', 'blogs'));
    }
    // Update Blog
    public function updateBlog(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->description = $request->description;

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads/blogs'), $imageName);
            $blog->img = $imageName;
        }

        $blog->save();

        return redirect()->back()->with('update', 'Blog updated');
    }

    // Blog Delete
    public function deleteBlog($id)
    {
        $blog = Blog::find($id)->delete();
        return redirect()->url('Add-Activity/Blog')->with('blogdelete', 'Blog deleted');
    }

    // Add Services
    public function service()
    {
        $services = Service::latest()->get();
        return view('Admin.add-activity.Service.service', compact('services'));
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

    // Service View
    public function serviceView($id)
    {
        $serviceShow = Service::findOrFail($id);
        $services = Service::all();
        return view('Admin.add-activity.Service.service-view', compact('serviceShow', 'services'));
    }

    // Service Edit
    public function serviceEdit($id)
    {
        $service = Service::findOrFail($id);
        $services = Service::all();
        return view('Admin.add-activity.Service.service-edit', compact('service', 'services'));
    }

    // Service Update
    public function ServiceUpdate(Request $request, $id)
    {
        $request->validate([
            'service' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $service = Service::findOrFail($id);
        $service->service = $request->service;
        $service->description = $request->description;

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads/service'), $imageName);
            $service->img = $imageName;
        }

        $service->save();

        return redirect()->back()->with('update', 'Service updated');
    }

    // Service Delete
    public function serviceDelete($id)
    {
        $service = Service::find($id)->delete();
        return redirect()->route('add.service')->with('servicedelete', 'Service deleted');
    }


    // Add Contact
    public function contact()
    {
        $footer = Contact::all();
        return view('Admin.add-activity.Contact.contact', compact('footer'));
    }

    // Contact Store
    public function contactStore(Request $request)
    {
        $request->validate([
            'cpnumber' => 'required|string|max:15',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'open_hour' => 'required|string|max:50',
        ]);

        $contact = new Contact;
        $contact->cpnumber = $request->cpnumber;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->open_hour = $request->open_hour;
        $contact->save();

        return redirect()->back()->with('contact', $contact)->with('contactStatus', 'Contact Added');
    }

    // Contact View
    public function contactView($id)
    {
        $view = Contact::findOrFail($id);
        $footer = Contact::all();
        return view('Admin.add-activity.Contact.contact-view', compact('view', 'footer'));
    }

    // Contact Edit
    public function contactEdit($id)
    {
        $edit = Contact::findOrFail($id);
        $footer = Contact::all();
        return view('Admin.add-activity.Contact.contact-edit', compact('edit', 'footer'));
    }

    // Service Update
    public function contactUpdate(Request $request, $id)
    {
        $request->validate([
            'cpnumber' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'open_hour' => 'required|string|max:50',

        ]);

        $edit = Contact::findOrFail($id);
        $edit->cpnumber = $request->cpnumber;
        $edit->email = $request->email;
        $edit->address = $request->address;
        $edit->open_hour = $request->open_hour;

        $edit->save();

        return redirect()->back()->with('update', 'Contact updated');
    }

    // Service Delete
    public function contactDelete($id)
    {
        $delete = Contact::find($id)->delete();
        return redirect()->route('add-contact')->with('contactdelete', 'Contact deleted');
    }


    // Summernote
    public function summernote()
    {
        return view('Admin.summernote');
    }
}
