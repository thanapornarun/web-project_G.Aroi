@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <h1 class="text-center text-blue-400 font-bold text-6xl uppercase mb-10"> {{ $event->event_name }}</h1>

</head>

<style>
    body {
        background-color: #0f0e17;
    }
</style>


<body>
<div class="py-16">
    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
        
        <div class="w-full p-8 ">
            <h1 class="text-5xl font-semibold text-gray-700 text-center mb-2">{{$expense->bill_name}}</h1>
            <img class="w-full" src="{{ url('storage/'.$expense->bill_path) }}" alt="" 
            vspace ="10">
            <h2 class="text-2xl text-gray-600 text-center mb-15">Amount : {{$expense->amount}}</h2>
            <h2 class="text-2xl text-gray-600 text-center mb-15 ">Date Purchase : {{$expense->expense_date}}</h2>

            <h2 class="text-2xl text-gray-600 text-center mb-15 ">Description : {{$expense->description}}</h2>
        </div>
    </div>
    


</div>

</body>

</html>
@endsection