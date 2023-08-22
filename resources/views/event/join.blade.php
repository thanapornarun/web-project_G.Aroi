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
<h1 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">Join Success</h1>
<center>
        <button type="submit" class="mt-15 px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-bold rounded-full transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg"  href="/" style="margin-left: -7px;">
                        Accept
        </button>

</center>
</body>

</html>
@endsection