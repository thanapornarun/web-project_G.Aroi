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
        <h1 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">Create Event</h1>
        <form action="{{ route('event.store',['user'=> $user]) }}" method="POST" enctype="multipart/form-data">
      
        <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
            @csrf
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-bold text-gray-600">Event Name</label>
                    @error ('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                    @enderror
                    <input type="text" id="name" name="name"
                    required
                    autocomplete = "on" value ="{{old('name','') }}" placeholder="Put in event name" class="border border-gray-300 @error('name') border-red-600 @enderror shadow p-3 w-full rounded mb-" >
                </div>
                <div class="mb-5">
                    <label for="place" class="block mb-2 font-bold text-gray-600">Event Place</label>
                    @error ('place')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                    @enderror
                    <input type="text" id="place" name="place"
                    required
                    autocomplete = "on" value ="{{old('place','') }}" placeholder="Put in event place" class="border border-gray-300 @error('place') border-red-600 @enderror shadow p-3 w-full rounded mb-">
                </div>
                <div class="mb-5">
                    <label for="attendee" class="block mb-2 font-bold text-gray-600">Number of attendee</label>
                    @error ('attendee')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                    @enderror
                    <input type="integer" id="attendee" name="attendee"
                    required
                    autocomplete = "on" value ="{{old('attendee','') }}" placeholder="Put in number of attendee" class="border border-gray-300 @error('attendee') border-red-600 @enderror shadow p-3 w-full rounded mb-">
                </div>
                <div class="mb-5">
                    <label for="description" class="block mb-2 font-bold text-gray-600">Description</label>
                    @error ('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                    @enderror
                    <input type="text" id="description" name="description"
                    required
                    autocomplete = "on" 
                    value ="{{old('description','') }}" placeholder="Put in description" class="border border-gray-300 @error('description') border-red-600 @enderror shadow p-3 w-full rounded mb-">
                </div>
                <div class="mb-5">
                    <label for="start">Start date(date and time):</label>
                    @error ('start')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                    @enderror
                    <input type="datetime-local" id="start" name="start"
                    required
                    autocomplete = "on" value ="{{old('start','') }}"
                    placeholder="Put in start date" class="border border-gray-300 @error('start') border-red-600 @enderror shadow p-3 w-full rounded mb-">
                </div>
                <div class="mb-5">
                    <label for="end_date">End date(date and time):</label>
                    @error ('end_date')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                    @enderror
                    <input type="datetime-local" id="end_date" name="end_date"
                    required
                    autocomplete = "on" value ="{{old('end_date','') }}" placeholder="Put in end date" class="border border-gray-300 @error('end_date') border-red-600 @enderror shadow p-3 w-full rounded mb-">
                </div>
                <div class="mb-5">
                    <label for="title" class="block mb-2 font-bold text-gray-600">Category</label>
                    <input type="text" id="title" name="title"
                    required
                    autocomplete = "on" value ="{{old('title','') }}" placeholder="Put in category" class="border border-gray-300 shadow p-3 w-full rounded mb-">
                </div>                   
                <div class="mb-5">
                    <label for="poster_path" class="block mb-2 font-bold text-gray-600">Poster</label>
                    <input type="file" id="poster_path" name="poster_path"
                    required
                    autocomplete = "on" value ="{{old('poster_path','') }}" placeholder="Put in Poster" class="border border-gray-300 shadow p-3 w-full rounded mb-">
                </div>

                <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Submit</button>
            </form>
        </div>
        </body>
    </div>
</html>
@endsection