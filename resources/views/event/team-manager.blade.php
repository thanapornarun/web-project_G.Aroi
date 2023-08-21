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
    <div class="max-w-7xl max-h-full" style="background-color: #fffffe; margin-left: 500px; margin-top: 100px;">
        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
            <img class="h-48 w-full object-cover object-center" src="/images/1.jpg" alt="">
            <div class="p-6">
                <h2 class="tracking-widest text-base title-font font-bold text-2xl text-gray-400 mb-1" style="color: #0f0e17">CATEGORY : {{ $event->category }}</h2>
                <h1 class="title-font text-3xl font-medium text-gray-900 mb-3" style="color: #0f0e17; font-weight: bolder;">{{ $event->event_name }}</h1>
                <p class="leading-relaxed mb-3 text-xl font-bold" style="color: #0f0e17">
                    {{ $event->event_name }}
                </p>
                <form action="{{ route('setEventRoleManager', ['event' => $event]) }}" method="POST">
                    @csrf
                    <label class="mt-5" for="userId" style="color: #0f0e17">User to Be Setting:</label>
                    <select class="ml-5" name="userId">
                        @foreach ($users as $user)
                        <option class="font-bold" value="{{$user->id}}" style="color: #0f0e17;">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <label class="mt-5 ml-10" for="eventRoleId" style="color: #0f0e17">Role to Be Setting:</label>
                    <select class="ml-5" name="eventRoleId">
                        @foreach ($eventRoles as $eventRole)
                        <option class="font-bold" value="{{$eventRole->id}}" style="color: #0f0e17;">{{ $eventRole->roles }}</option>
                        @endforeach
                    </select>
                    
                    <button type="submit" class="ml-10 mt-15 px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-bold rounded-full transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg">
                        Set
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
@endsection