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
        font-weight: 600;
    }

    h1 {
        color: #0f0e17;
        font-weight: bolder;
    }
</style>

<body>
    <div class="inline-block relative w-64">
    <select class="block appearance-none w-full text-black font-bold bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
        @foreach ($users as $user)
            <option class="font-bold"> {{ $user->name }} </option>
        @endforeach
    </select>
    </div>
</body>

</html>
@endsection