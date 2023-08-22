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
    <h1 class="text-center text-blue-400 font-bold text-6xl uppercase mb-10">CERTIFICATE OF PARTICIPATION </h1>  
    <h1 class="text-center text-blue-400 font-bold text-6xl uppercase mb-10">FOR PARTICIPATING IN </h1> 
    <h1 class="text-center text-blue-400 font-bold text-4xl uppercase mb-10"> {{$event->event_name}} </h1>
    <center>
    <img class="object-center" src="{{ $event->event_poster_path}} " alt="" style="height: 600px; width: 600px;"> </img>
    </center>   

    <center>
        <a href="/"> Accept </a>
    </center>

</body>

</html>
@endsection