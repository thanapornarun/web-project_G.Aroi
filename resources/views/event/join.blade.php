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
<a class="mt-5 inline-block px-12 py-3 text-sm font-large border border-black rounded active:text-violet-50 hover:bg-transparent hover:text-violet-600 focus:outline-none focus:ring" href="/" style="background-color: #eebbc3; color: #232946;">
                        Accept
</a>
</center>
</body>

</html>
@endsection