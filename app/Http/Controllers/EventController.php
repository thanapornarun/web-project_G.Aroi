<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::get();
        return view('event.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        return view('event.create',['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,User $user)
    {
        
        $event_name =  $request->get('name');

        $request->validate(['name' => ['required','string','min:3','max:255']]);

        $event = new Event();
        $event->event_name = $request->get('name');
        $event->event_poster_path = $request->get('poster_path');
        $event->event_place = $request->get('place');
        $event->attendee_count = $request->get('attendee');
        $event->description = $request->get('description');
        $event->start_data = $request->get('start');
        $event->end_data = $request->get('end_data');
        $event->save();
        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('event.show',['event'=>$event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('event.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate(['name' => ['required','string','min:3','max:255']]);

        $event->name = $request->get('name');
        $event->save();

        return redirect()->route('event.show',['event'=>$event]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        
        return redirect()->route('event.index');
    }
}
