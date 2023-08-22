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
    }

    .card {
        width: 190px;
        height: 254px;
        border-radius: 50px;
        background: #e0e0e0;
        box-shadow: 20px 20px 60px #bebebe,
            -20px -20px 60px #ffffff;
    }
</style>

<body>
    <div class="border-b mb-5 flex justify-between text-sm" style="margin-left: 50px; margin-right: 50px;">
        <div class="flex items-center pb-2 text-lg pr-2 border-b-2 uppercase" style="color: #fffffe; border-color: #fffffe;">
            Participating events
        </div>
        <a href="/" class="flex items-center pb-2 text-lg pr-2 border-b-2 uppercase" style="color: #fffffe; border-color: #fffffe;">
            See All
        </a>
    </div>
    <div class="grid grid-cols-4 gap-4">
        @foreach ($eventAttendees as $eventAttendee)
        <div class="relative bg-gray-900 block p-6 border border-gray-100 rounded-lg max-w-sm mx-auto mt-24" href="#" style="background-color: #ffffff;">
            <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>
            <img src="{{ $eventAttendee->event->event_poster_path }}" alt=""></img>
            <div class="my-4">
                <h2 class="text-black text-2xl font-bold pb-2">Event: {{ $eventAttendee->event->event_name }}</h2>
                <p class="text-black py-1">Event Description: {{ $eventAttendee->event->description }}</p>
                <p class="text-black py-1"><i class="fa-solid fa-compact-disc fa-spin" style="--fa-animation-duration: 30s; --fa-animation-iteration-count: 1;"></i> Your Status: {{ $eventAttendee->status }}</p>
            </div>
            

            <div class="flex justify-end">
                <button class="px-2 py-1 text-black border border-gray-200 font-semibold rounded hover:bg-gray-800">
                    <a href=" {{ route('event.show', [ 'event' => $eventAttendee ]) }}"> 
                    Click Me
                    </a>
                </button>
                @if($eventAttendee->event_role_id == 3||$eventAttendee->event_role_id == 5)
                <button class="px-2 py-1 text-black border border-gray-200 font-semibold rounded hover:bg-gray-800">
                    <a href=" {{ route('event.show', [ 'event' => $eventAttendee ]) }}"> 
                    Kaban Board
                    </a>
                </button>
                @endif
            </div>
            <div class="flex justify-end">
            @if($eventAttendee->status == 'pass')
                <button class="px-2 py-1 text-black border border-gray-200 font-semibold rounded hover:bg-gray-800">
                    <a href=" {{ route('certificate', [ 'event' => $eventAttendee ]) }}"> 
                    Certificate
                    </a>
                </button>
            @endif
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>
@endsection