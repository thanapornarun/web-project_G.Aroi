<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventAttendee;
use App\Models\EventRole;
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
        $user = auth()->user();
        $userId = $user->id;
        $event = new Event();
        $event->event_name = $request->get( 'name' );
        $event->event_poster_path = $request->get( 'poster_path' );
        $event->event_place = $request->get( 'place' );
        $event->attendee_count = $request->get( 'attendee' );
        $event->description = $request->get( 'description' );
        $event->start_date = $request->get( 'start' );
        $event->end_date = $request->get( 'end_date' );
        $event->user_id = $userId;
        $event->save();
        /*return redirect()->route('budget.create');*/
    }

    /**
    * Display the specified resource.
    */

    public function show( $id ) {
        $event = Event::find($id);
        $user = auth()->user();
        $eats = EventAttendee::where('user_id', $user->id)->where('event_id', $event->id)->get();
        $showbtn = true;
        if (count($eats) > 0) {
            $showbtn = false;
        }
        return view('event.show', ['event' => $event, 'showbtn' => $showbtn]);
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
        return view( 'welcome', [ 'latestEvents' => $latestEvents ] );
    }

    // public function joinEvent() {
    //     $latestEvents = Event::latest()->take( 6 )->get();
    //     return view( 'welcome', [ 'latestEvents' => $latestEvents ] );
    // }

    public function userJoinEvent(Request $request, Event $event) {
        $user = auth()->user();

        // $eventAttendee = $event->eventAttendees()->create([
        //     'user_id' => $user->id,
        //     'event_id' => $event->id,
        //     'event_role_id' => EventRole::first()->id,
        // ]);


        $eats = EventAttendee::where('user_id', $user->id)->where('event_id', $event->id)->get();
        if (count($eats) > 0) {
            echo "this event is joined";
        } else {
            $eventAttendee = $event->eventAttendees()->create([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'event_role_id' => EventRole::first()->id,
            ]);
        }

        return view('event.join');
    }

    public function teamManager(Event $event) {
        $users = User::get();
        $eventRoles = EventRole::get();
        $eventAttendees = EventAttendee::get();
        return view('event.team-manager', ['event' => $event, 'users' => $users, 'eventRoles' => $eventRoles, 'eventAttendees' => $eventAttendees]);
    }

    public function setTeamManager(Request $request, Event $event) {
        $eventAttendee = $event->eventAttendees()->create([
            'user_id' => $request->get('userId'),
            'event_id' => $event->id,
            'event_role_id' => $request->get('eventRoleId'),
        ]);

        $eventAttendee->status = 'pass';
        $eventAttendee->save();

        return redirect()->route('event.index', ['event' => $event]);
    }

}
