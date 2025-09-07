<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();
        return view('event-list', compact('events'));
}

    public function show(Event $event) {

        // dd($event);
        $user = auth()->user();
        return view('event-details', compact('event', 'user'));
    }
}
