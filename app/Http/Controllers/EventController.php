<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_Role;
use App\Models\EventAttendee;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $events = Event::all();
        return view( 'event.index', [ 'events' => $events ] );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create( User $user ) {
        return view( 'event.create', [ 'user' => $user ] );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request, User $user ) {

        $event_name =  $request->get( 'name' );

        $request->validate( [ 'name' => [ 'required', 'string', 'min:3', 'max:255' ] ] );

        $event = new Event();
        $event->event_name = $request->get( 'name' );
        $event->event_poster_path = $request->get( 'poster_path' );
        $event->event_place = $request->get( 'place' );
        $event->attendee_count = $request->get( 'attendee' );
        $event->description = $request->get( 'description' );
        $event->start_data = $request->get( 'start' );
        $event->end_data = $request->get( 'end_data' );
        $event->save();
        return redirect()->route( 'event.index' );
    }

    /**
    * Display the specified resource.
    */

    public function show( $id ) {
        $event = Event::find($id);
        return view( 'event.show', [ 'event' => $event] );
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( Event $event ) {
        return view( 'event.edit', [ 'event' => $event ] );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, Event $event ) {
        $request->validate( [ 'name' => [ 'required', 'string', 'min:3', 'max:255' ] ] );

        $event->name = $request->get( 'name' );
        $event->save();

        return redirect()->route( 'event.show', [ 'event' => $event ] );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( Event $event ) {

        return redirect()->route( 'event.index' );
    }

    public function showWelcomeWithLatestEvent() {
        $latestEvents = Event::latest()->take( 6 )->get();
        ;
        return view( 'welcome', [ 'latestEvents' => $latestEvents ] );
    }

    public function joinEvent() {
        $latestEvents = Event::latest()->take( 6 )->get();
        ;
        return view( 'welcome', [ 'latestEvents' => $latestEvents ] );
    }

    public function userJoinEvent(User $user, Event $event ) {
        $event_role = Event_Role::create( [
            'user_id' => $user->id
        ] );

        $eventAttendee = EventAttendee::create( [
            'user_id' => $user->id,
            'event_id' => $event->id,
            'event_role_id' => $event_role->id,
        ] );

        $event->eventAttendees_id = $eventAttendee;

        return redirect()->route( '/' );
    }
}
