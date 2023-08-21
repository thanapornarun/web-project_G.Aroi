@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Event Manager</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3656/3656949.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,600" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0-beta1/css/all.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #0f0e17;
            color: #fffffe;
            font-family: 'Poppins';
        }

        section h1 {
            font-weight: bold;
            padding-left: 50px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        * {
            box-sizing: border-box
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active,
        .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        #rcorners {
            border-radius: 25px;
            background: #73AD21;
            padding: 20px;
            width: 200px;
            height: 150px;
        }
    </style>
</head>

<body>
    <section>
        @if($latestEvents)
        <div class="container">
            <div class="row title-block justify-content-between flex">
                <div class="col justify-self-center flex mb-5">
                    <h4 class="mbr-section-subtitle mbr-fonts-style display-2 border-b-4"><strong><i class="fa-solid fa-bell fa-shake"></i> Latest Events</strong></h4>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 rounded-t-lg overflow-hidden justify-center">
                @foreach ($latestEvents as $event)
                <div class="max-w-sm rounded overflow-hidden shadow-lg mb-5border-2 border-black-2 mb-5" style="background-color: #fffffe; color: #232946">
                    <a href=" {{ route('event.show', [ 'event' => $event ]) }}">
                        <img class="w-full" src="{{ $event->event_poster_path }}" alt="">
                    </a>
                    <div class="px-6 py-4">
                        <div class="font-extrabold text-2xl mb-2">Event Name : {{ $event->event_name }}</div>
                        <p class="text-base font-bold">
                            Event Description : {{ $event->description }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <p>No events available.</p>
        @endif
    </section>

    <section>
        @if($events)
        <div class="container">
            <div class="row title-block justify-content-between flex">
                <div class="col justify-self-center flex mb-5">
                    <h4 class="mbr-section-subtitle mbr-fonts-style display-2 border-b-4"><strong><i class="fa-solid fa-sync fa-spin"></i> All Events</strong></h4>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 rounded-t-lg overflow-hidden justify-center">
                @foreach ($events as $event)
                <div class="max-w-sm rounded overflow-hidden shadow-lg mb-5border-2 border-black-2 mb-5" style="background-color: #fffffe; color: #232946">
                    <a href=" {{ route('event.show', [ 'event' => $event ]) }}">
                        <img class="w-full" src="{{ $event->event_poster_path }}" alt="">
                    </a>
                    <div class="px-6 py-4">
                        <div class="font-extrabold text-2xl mb-2">Event Name : {{ $event->event_name }}</div>
                        <p class="text-base font-bold">
                            Event Description : {{ $event->description }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <p>No events available.</p>
        @endif
    </section>
</body>

</html>
@endsection