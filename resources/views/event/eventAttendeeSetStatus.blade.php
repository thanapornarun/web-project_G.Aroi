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
</style>

<body>
    <label for="" class="ml-5 font-bold text-3xl"> All Participants </label>
    <form action="{{ route('setStatusAttendeeManager', ['event' => $event]) }}" method="POST">
        @csrf
        <select class="ml-5" name="userId">
            @foreach ($eventsJoin as $event)
            @foreach ($event->eventAttendees as $EventAttendee )
            <option class="font-bold" value="{{ $EventAttendee->user->id }}" style="color: #0f0e17;"> {{ $EventAttendee->user->name }} </option>
            @endforeach
            @endforeach
        </select>
        <button type="submit" class="ml-5 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">set</button>
    </form>
</body>

</html>
@endsection