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

        $userId = $user->id;

        // $user = User::with(['eventAttendees.event'])->where('id',$user->id)->first();

        $eventAttendees = EventAttendee::with(['user'])->where('user_id', $userId)->get();

        // $event = Event::where('event_id', $eventAttendees->event_id)->get();
        // $eventJoined = Event::with(['eventAttendees.user'])->where('id', $eventAttendee->event_id)->get();
        // $event = $EventAttendee->event;
        // dd($event->id);
        
        return view('eventAttendee.index', ['user' => $user, 'eventAttendees' => $eventAttendees ]);
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

        // $eventAttendees = EventAttendee::get();

        $eventAttendeeJoined = EventAttendee::where('user_id', $user->id)->get();

        foreach ($eventAttendeeJoined as $eventAttendee) {
            $eventId = $eventAttendee->event_id;
        }
        
        // $event = Event::find($eventId);
        
        $event = Event::where('event_id', $eventAttendee->event_id)->get();


        return view('eventAttendee.joined-event-show', ['event' => $event]);
    }
}
