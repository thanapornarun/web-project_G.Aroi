<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventAttendee;
use App\Models\User;
use Illuminate\Http\Request;

class EventAttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $user = User::with(['eventAttendees.event'])->where('id',$user->id)->first();
        // $eventAttendee = EventAttendee::get();

        $EventAttendees = EventAttendee::with(['event'])->get();
        
        // dd($EventAttendees[0]->event);

        // $event = $EventAttendee->event;
        // dd($event->id);
        
        // $eventJoined = Event::with(['eventAttendees.user'])->where('id', $eventAttendee->event_id)->get();
        return view('eventAttendee.index', ['user' => $user, 'eventAttendees' => $EventAttendees ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EventAttendee $eventAttendee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventAttendee $eventAttendee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventAttendee $eventAttendee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventAttendee $eventAttendee)
    {
        //
    }

    public function eventJoinedShow()
    {
        $user = auth()->user();
        $eventAttendees = EventAttendee::get();
        // $event = Event::get();

        $eventAttendeeJoined = EventAttendee::where('user_id', $user->id)->get();
        foreach ($eventAttendeeJoined as $eventAttendee) {
            $eventId = $eventAttendee->event_id;
        }
        
        $eventJoined = Event::where('event_id', $eventAttendee->event_id)->get();

        dd($eventJoined);
        $event = Event::find($eventId);

        return view('eventAttendee.joined-event-show', ['event' => $event]);
    }
}
