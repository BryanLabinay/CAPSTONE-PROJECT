<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Consultation;
use App\Models\Event;
use App\Models\Service;
use Illuminate\Http\Request;

class LandingPage extends Controller
{
    public function index()
    {

        $services = Service::all();
        $events = Event::all();
        $consultation = Consultation::all();
        $blog = Blog::all();

        return view('welcome', compact('services', 'events', 'consultation', 'blog'));
    }
}
