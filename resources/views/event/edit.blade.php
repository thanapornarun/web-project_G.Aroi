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
<div class="max-w-screen-xl mx-auto py-8 px-4 lg:py-16 lg:px-6" style="color: #fffffe">
    
    <h1 class="text-center text-blue-400 font-bold text-6xl uppercase mb-10">Kanban Bord</h1>
    <div class="flex flex-col md:flex-row">
        <div class="flex-1 flex flex-col sm:flex-row flex-wrap -mb-4 -mx-2">
            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">PLAN :</h3>
                    <p class="text-sm">{{$event->description}}</p>
                </div>
            </div>
            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">TO DO :</h3>
                    <p class="text-sm"> </p>
                </div>
            </div>

            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">IN PROGRESS :</h3>
                    <p class="text-sm">ur U.S.-based customer support team is available around the clock to answer any questions, resolve any issues, and provide helpful solutions. Whether it's through email, phone, or live chat, we're always here to support you.</p>
                </div>
            </div>

            <div class="w-full sm:w-1/2 mb-4 px-2 ">
                <div class="h-full py-4 px-6 border border-green-500 border-t-0 border-l-0 rounded-br-xl">
                    <h3 class="text-2xl font-bold text-md mb-6">DONE :</h3>
                    <p class="text-sm">We use cutting-edge security measures to protect our customers' sensitive information and ensure the safety of all transactions made on our site.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="max-w-screen-xl mx-auto py-8 px-4 lg:py-16 lg:px-6" style="color: #fffffe">
    
    <div class="mb-5">

    <select name="KANBAN" id="cars" style="color: #0f0e17">
            <option value="plan">Plan:</option>
            <option value="todo">TO DO:</option>
            <option value="progress">IN PROGRESS</option>
            <option value="done">DONE :</option>
  </select>
                    <label for="kanban" class="block mb-2 font-bold text-gray-600">Task:</label>
                    <input type="text" id="kanban" name="kanban"
                    required
                    autocomplete = "on" placeholder="Put in Task" class="border border-gray-300 shadow p-3 w-full rounded mb-">
                </div>
    <div class="mb-5">
                    <label for="kanban" class="block mb-2 font-bold text-gray-600">Description :</label>
                    <input type="text" id="kanban" name="kanban"
                    required
                    autocomplete = "on" placeholder="Put in Discription" class="border border-gray-300 shadow p-3 w-full rounded mb-">
                </div>

    <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg" >
        <a href="/event">Update
        </a>
        </button>
</div>








</body>
</html>
@endsection