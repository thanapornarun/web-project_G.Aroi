
@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <h1> {{$event->event_name}}</h1>
    

</head>


<body>
    @php
    $budgets = $event->budgets;
    $budget =  $budgets->find(1);
    @endphp
<div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
        <div class="bg-pink-100 py-2 px-4">
            <h2 class="text-xl font-semibold text-gray-800">Budget List</h2>
            <h3 >{{$budget->budget}}</h3>
            <a class="ml-5 inline-block px-12 py-3 text-sm font-medium border border-black rounded active:text-violet-50 hover:bg-transparent hover:text-violet-600 focus:outline-none focus:ring" href="{{route('expense.create',['event'=>$event,'budget'=>$budget])}}" style="background-color: #eebbc3; color: #232946;">
                    Add Expense
            </a>
            
        </div>

        <ul class="divide-y divide-gray-200">
        @if($budget->expenses->isNotEmpty())
            @foreach ($budget->expenses as $expense)
            <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                <div class="flex-1">
                    <a href = "{{route ('expense.show',['event'=>$event,'budget'=>$budget,'expense'=>$expense])}}"> 
                    <h3 class="text-lg font-medium text-gray-800">{{ $expense->bill_name }}</h3>
                    <p class="text-gray-600 text-base">{{ $expense->amount }}</p>
                    </a>
                    <p class="text-gray-600 text-base"></p>
                </div>
                <span class="text-gray-400"></span>
            </li>
            @endforeach
       

        @endif
        
        </ul>
    </div>

</body>

</html>
@endsection