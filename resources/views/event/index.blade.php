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
</style>

<body>
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">

        <div class="border-b mb-5 flex justify-between text-sm">
            <div class="flex items-center pb-2 pr-2 border-b-2 uppercase" style="color: #fffffe; border-color: #fffffe;">
                My Event
            </div>
            <a href="/" class="flex items-center pb-2 pr-2 border-b-2 uppercase" style="color: #fffffe; border-color: #fffffe;">
                See All
            </a>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
            @if(Auth::check())
            @php
            $user = Auth::user();
            $profile = $user->profile;
            @endphp
            @foreach ($events as $event)
            @if ($event->user_id == Auth::user()->id)
            <!-- CARD 1 -->
            <div class="rounded overflow-hidden shadow-lg flex flex-col bg-white">
                <div class="relative">
                    <img class="w-full" src="{{$event->event_poster_path}}" alt="">
                    <div class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3">
                        {{$event->category}}
                    </div>
                </div>
                <div class="px-6 py-4 mb-auto">
                    <h1 class="font-medium text-lg inline-block inline-block mb-2 mt-2">
                        {{$event->event_name}}
                    </h1>
                    <p class="text-gray-500 text-sm">
                        {{$event->description}}
                    </p>
                    <a class="inline-block px-12 py-3 text-sm font-medium border border-black rounded active:text-violet-50 hover:bg-transparent hover:text-violet-600 focus:outline-none focus:ring" href=" {{ route('eventManager', [ 'event' => $event ]) }}" style="background-color: #eebbc3; color: #232946;">
                        Team
                    </a>

                    <a class="ml-5 inline-block px-12 py-3 text-sm font-medium border border-black rounded active:text-violet-50 hover:bg-transparent hover:text-violet-600 focus:outline-none focus:ring" href="{{route('budget.index',['event'=>$event])}}" style="background-color: #eebbc3; color: #232946;">
                        Budget
                    </a>
                </div>
                <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                    <span href="#" class="py-1 text-lg font-regular text-gray-900 mr-1 flex flex-row items-center">
                        <span class="ml-1">Owner : {{ $profile->full_name }}</span>
                    </span>
                </div>
            </div>
            @endif
            @endforeach
            @endif
        </div>

    </div>
</body>

</html>
@endsection