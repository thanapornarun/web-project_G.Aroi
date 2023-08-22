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
    <div class="w-full">
        <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">Create Budget</h2>
        <h2 class="text-center text-black-400 font-bold text-2xl uppercase mb-10">{{$event->event_name}}</h2>
        <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
            <form action="{{ route('budget.save',['event'=>$event]) }}" method="POST">
            
                @csrf
                <div class="mb-5">
                    <label for="budget" class="block mb-2 font-bold text-gray-600">Budget</label>
                    @error ('budget')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                    @enderror
                    <input type="decimal" id="budget" name="budget" autocomplete = "off" placeholder="Put in budget" 
                    class="border border-gray-300 @error('budget') border-red-600 @enderror shadow p-3 w-full rounded mb-">
                </div>

                <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>
@endsection