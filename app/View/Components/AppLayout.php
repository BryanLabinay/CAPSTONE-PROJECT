<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use App\Models\Service;
use Illuminate\View\View;

class AppLayout extends Component
{

    public $user;
    public $services;

    public function __construct()
    {
        $this->user = Auth::user();

        $this->services = Service::all();
    }


    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
