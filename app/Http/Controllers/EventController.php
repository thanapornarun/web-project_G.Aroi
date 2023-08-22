<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventAttendee;
use App\Models\EventRole;
use App\Models\User;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $events = Event::all();
        return view('event.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(User $user)
    {
        return view('event.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request, User $user)
    {

        $event_name =  $request->get('name');

        $request->validate( [ 'name' => [ 'required', 'string', 'min:3', 'max:255' ] ] );
        $request->validate( [ 'place' => [ 'required', 'string', 'min:3', 'max:255' ] ] );
        $request->validate( [ 'description' => [ 'required', 'string', 'min:3', 'max:255' ] ] );
        $request->validate( [ 'attendee' => [ 'required','decimal:0,1000.00']]);
       // $request->validate( ['start' => [ 'required','before_or_equals:2023-08-20 19:14:53']] );
       // $request->validate( ['end_date' =>  ['required','after_or_equals:start'] ]);


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

        if ($request->hasFile('poster_path')) {
            // บันทึกไฟล์รูปภาพลงใน folder ชื่อ 'event_images' ที่ storage/app/public
            $path = $request->file('poster_path')->store('event_images', 'public');
            $event->event_poster_path = $path;
        }
        $event->save();

        return redirect()->route('budget.create',['event'=>$event]);
    }

    /**
     * Display the specified resource.
     */

    public function show(Event $event)
    {
        // $event = Event::find($id);
        $user = auth()->user();
        // dd($event);

        if ($user) {
            $eats = EventAttendee::where('user_id', $user->id)->where('event_id', $event->id)->get();
            $showbtn = true;
            if (count($eats) > 0) {
                $showbtn = false;
            }
            return view('event.show', ['event' => $event, 'showbtn' => $showbtn]);
        }

        return view('event.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Event $event)
    {
        return view('event.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Event $event)
    {
        $request->validate(['name' => ['required', 'string', 'min:3', 'max:255']]);

        $event->name = $request->get('name');
        $event->save();

        return redirect()->route('event.show', ['event' => $event]);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Event $event)
    {

        return redirect()->route('event.index');
    }

    public function showWelcomeWithLatestEvent()
    {
        $latestEvents = Event::latest()->take(4)->get();
        $events = Event::get();
        return view('welcome', ['latestEvents' => $latestEvents, 'events' => $events]);
    }

    // public function showWelcomeWithAllEvent()
    // {
    //     $events = Event::get();
    //     return view('welcome', ['events' => $events]);
    // }

    public function userJoinEvent(Request $request, Event $event)
    {
        $user = auth()->user();

        $eats = EventAttendee::where('user_id', $user->id)->where('event_id', $event->id)->get();
        if (count($eats) > 0) {
            // echo "this event is joined";
        } else {
            $eventAttendee = $event->eventAttendees()->create([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'event_role_id' => EventRole::first()->id,
            ]);
        }

        return view('event.join');
    }

    public function teamManager(Event $event)
    {
        $users = User::get();
        $eventRoles = EventRole::get();

        $eventAttendees = EventAttendee::with(['user'])->get();
        // > EventAttendee::where('event_id',1)->where('user_id',2)->first()->event_role_id
        // $users = User::with('eventAttendees')->get();
        // dd($users);

        return view('event.team-manager', ['event' => $event, 'users' => $users, 'eventRoles' => $eventRoles, 'eventAttendees' => $eventAttendees]);
    }

    public function setTeamManager(Request $request, Event $event)
    {
        // $user = User::get()->where('name', $request->get('name'));
        $user = User::where('name', $request->get('name'))->first();
        
        // dd($user);

        // $userGet = $users::where('name', $request->get('UserName'));

        $eventAttendee = $event->eventAttendees()->create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'event_role_id' => $request->get('eventRoleId'),
        ]);

        // $eventAttendee = $event->eventAttendees()->find();

        $eventAttendee->status = 'pass';
        $eventAttendee->save();

        return redirect()->route('event.index', ['event' => $event]);
    }

    public function setStatus(Event $event)
    {
        // $users = User::get();

        $eventJoin = Event::with('eventAttendees.user')->where('id', $event->id)->first();
        // dd($eventJoin);
        
        return view('event.eventAttendeeSetStatus', ['event' => $event, 'eventJoin' => $eventJoin]);
    }
    
    public function setEventAttendeeStatus(Request $request,Event $event)
    {
        $eventsJoin = Event::with('eventAttendees.user')->where('id', $event->id)->get();

        $eventAttendee = EventAttendee::where('user_id', $request->userId)->first();
        $eventAttendee->status = 'pass';
        $eventAttendee->save();
        // dd($eventAttendee);
        $allEvent = Event::get();
        return redirect()->route('event.index', ['event' => $allEvent]);
    }
}
