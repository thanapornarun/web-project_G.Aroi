@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<style>
    body {
        background-color: #0f0e17;
        color: #fffffe;
        font-family: 'Poppins';
        font-size: 13px;
    }

    p {
        color: #0f0e17;
        /* font-weight: bold; */
    }

    h1,
    h5 {
        color: #fffffe;
        font-weight: bolder;
    }
</style>

<body>
    <div class="max-w-7xl max-h-full mx-auto" style="background-color: #fffffe; margin-top: 100px;">
        <div class="border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
            <img class="h-48 w-full object-cover object-center" src="/images/1.jpg" alt="">
            <div class="p-6">
                <h2 class="tracking-widest text-base title-font font-bold text-2xl text-gray-400 mb-1" style="color: #0f0e17">CATEGORY : {{ $event->category }}</h2>
                <h1 class="title-font text-3xl font-medium text-gray-900 mb-3" style="color: #0f0e17; font-weight: bolder;">{{ $event->event_name }}</h1>
                <p class="leading-relaxed mb-3 text-xl font-bold" style="color: #0f0e17">
                    {{ $event->description }}
                </p>
                <form action="{{ route('setEventRoleManager', ['event' => $event]) }}" method="POST">
                    @csrf
                    <label class="mt-5" for="userId" style="color: #0f0e17">User to Be Setting:</label>
                    
                    <input type="" class="appearance-none block w-full bg-gray-200 text-black font-bold border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="name" placeholder="">

                    <label class="mt-5" for="eventRoleId" style="color: #0f0e17">Role to Be Setting:</label>
                    <select class="ml-5" name="eventRoleId">
                        @foreach ($eventRoles as $eventRole)
                        @if ($eventRole->roles != 'guest' && $eventRole->roles != 'owner' && $eventRole->roles != 'event attendee' )
                        <option class="font-bold" value="{{$eventRole->id}}" style="color: #0f0e17;">{{ $eventRole->roles }}</option>
                        @endif
                        @endforeach
                    </select>
                    <button type="submit" class="ml-10 mt-15 px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-bold rounded-full transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg">
                        Set
                    </button>
                </form>
            </div>
        </div>
    </div>

    <section>
        <ul class="divide-y divide-gray-300 mt-16 mx-auto px-4 border" style="width: 800px;">
            @foreach ($eventRoles as $eventRole)
            @if ($eventRole->roles != 'guest' && $eventRole->roles != 'owner' && $eventRole->roles != 'event attendee' )
            <li class="py-4">
                <div class="flex items-center space-x-4">
                    <span class="text-3xl font-bold">{{ $eventRole->roles }}</span>
                </div>
                @foreach ( $eventAttendees as $eventAttendee)
                @if ($eventAttendee->event_role_id == $eventRole->id)
                <ul class="divide-y divide-gray-300 bg-gray-50 rounded-md px-4 py-2 mt-4">
                    <li class="py-2">
                        <div class="flex items-center space-x-4">
                            <span class="text-2xl font-bold text-black">{{ $eventAttendee->user->name }}</span>
                        </div>

                        <ul class="divide-y divide-gray-300 bg-gray-100 rounded-md px-4 py-2 mt-2">
                            <li class="py-2">
                                <div class="flex items-center space-x-4">
                                    <span class="text-xl font-bold text-black">is {{ $eventRole->roles }}</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                @endif
                @endforeach
            </li>
            @endif
            @endforeach
        </ul>
    </section>
</body>

</html>
@endsection