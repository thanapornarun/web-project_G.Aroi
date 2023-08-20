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
        font-weight: 600;
    }

    h1 {
        color: #0f0e17;
        font-weight: bolder;
    }
</style>

<body>
<div class="container">
        <div class="bg-white overflow-hidden shadow rounded-lg border">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="leading-6 font-bold text-gray-900">
                    User Profile
                </h3>
                <p class="mt-6 max-w-2xl text-medium font-semibold text-gray-500">
                    This is your profile page.
                </p>
            </div>
            <div class="border-t border-gray-200 sm:p-0" style="padding: 60px;">
                <img class="object-center" src="{{ $event->event_poster_path}} " alt="" style="height: 600px; width: 600px;">  </img>
                <h1 class="text-4xl">
                    Event Name:
                </h1>
                <p class="text-xl">
                    {{ $event->event_name }}
                </p>
                <h1 class="mt-15 text-4xl">
                    Event Description:
                </h1>
                <p>
                    {{ $event->description }}
                </p>
                <h1 class="mt-15 text-4xl">
                    Event Place:
                </h1>
                <p>
                    {{ $event->event_place }}
                </p>
                <h1 class="mt-15 text-4xl">
                    Event Attendee Count:
                </h1>
                <p>
                    {{ $event->attendee_count }}
                </p>
                <h1 class="mt-15 text-4xl">
                    Event Start and End:
                </h1>
                <p>
                {{ $event->start_date }} / {{ $event->end_date }}
                </p>
                @if($showbtn)
                <form action="{{ route('joinEvent', ['event' => $event ]) }}" method="POST">
                    @csrf
                    <button type="submit" class="mt-15 px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-bold rounded-full transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg" style="margin-left: -7px;">
                        Join
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
@endsection