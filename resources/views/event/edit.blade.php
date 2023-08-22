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
<h1 class="text-center text-blue-400 font-bold text-6xl uppercase mb-10">Kanban Bord</h1>

<h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">To do</h2>
    <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
        Task 1 :
    </div>

    <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">Done</h2>
    <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
        
    </div>
    
    <div class="mb-5">
                    <label for="kanban" class="block mb-2 font-bold text-gray-600">To Do task:</label>
                    <input type="text" id="kanban" name="kanban"
                    required
                    autocomplete = "on" placeholder="Put in Kanban" class="border border-gray-300 shadow p-3 w-full rounded mb-">
                </div>

    <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">create New Task</button>

    <div class="mb-5">
                    <label for="kanban" class="block mb-2 font-bold text-gray-600">Done task:</label>
                    <input type="text" id="kanban" name="kanban"
                    required
                    autocomplete = "on" placeholder="Put in Kanban" class="border border-gray-300 shadow p-3 w-full rounded mb-">
                </div>

    <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Update</button>

</body>
</html>
@endsection