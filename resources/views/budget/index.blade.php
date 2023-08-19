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

<body>

<div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
        <div class="bg-pink-100 py-2 px-4">
            <h2 class="text-xl font-semibold text-gray-800">Budget List</h2>

        </div>
        <ul class="divide-y divide-gray-200">
            @foreach ($budget->expenses as $expense)
            <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                <div class="flex-1">
                    <a href = "{{route ('expend.show',['expend' => $expend])}}"> 
                    <h3 class="text-lg font-medium text-gray-800">{{ $expense->bill_name }}</h3>
                    </a>
                    <p class="text-gray-600 text-base"></p>
                </div>
                <span class="text-gray-400"></span>
            </li>
            @endforeach
        </ul>
    </div>

</body>

</html>
@endsection