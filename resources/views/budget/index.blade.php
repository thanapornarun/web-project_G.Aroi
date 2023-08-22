@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <h1 class="text-center text-blue-400 font-bold text-6xl uppercase mb-10"> {{$event->event_name}}</h1>
    

</head>

<style>
    body {
        background-color: #0f0e17;
    }
</style>


<body>
           
    @if(!(is_null($budget)))
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
        <div class="py-2 px-4">
            <h2 class="text-center text-blue-400 font-bold text-3xl uppercase mb-10">Budget List</h2>
            <h3 class="text-center text-blue-400 font-bold text-3xl uppercase mb-10">BUDGET : {{$budget->budget}}</h3>
            <h3 class="text-center text-blue-400 font-bold text-3xl uppercase mb-10">BALANCE : {{$budget->balance}}</h3>
             
            <center>
            <a class=" margin-left ml-5 inline-block px-12 py-3 text-sm font-medium border border-black rounded active:text-violet-50 hover:bg-transparent hover:text-violet-600 focus:outline-none focus:ring " href="{{ route('build.expense', ['event' => $event, 'budget' => $budget]) }}" style="background-color: #eebbc3; color: #232946;">
                    Add Expense
            </a>
            </center>         
        </div>     

        <ul class="divide-y divide-gray-200">
        @if($budget->expenses->isNotEmpty())
            @foreach ($budget->expenses as $expense)
            <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
            <a href = "{{route ('expense.show',['event'=>$event,'budget'=>$budget,'expense'=>$expense])}}"> 
                <div class="rounded overflow-hidden shadow-lg flex flex-col bg-white">
                    <div class="relative">
                        <img class="w-full" src="{{ url('storage/'.$event->event_poster_path) }}" alt="">
                    </div>
                <div class="px-6 py-4 mb-auto">
                </a>
                    <a href = "{{route ('expense.show',['event'=>$event,'budget'=>$budget,'expense'=>$expense])}}"> 
                        <h3 class="text-lg font-medium text-gray-800">{{ $expense->bill_name }}</h3>
                        <h3 class="text-gray-600 text-base">{{ $expense->Amount }}</h3>
                    </a>

                    
                </div>
            </div>
            <span class="text-gray-400"></span>
            @endforeach
        @endif
    @endif   
        </ul>
    </div>

</body>

</html>
@endsection