@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<style>
    body {
        background-color: #0f0e17;
        font-family: 'Poppins';
    }

    .special-button {
        font-family: monospace;
        background-color: #f3f7fe;
        color: #3b82f6;
        border: none;
        border-radius: 8px;
        width: 100px;
        height: 45px;
        transition: .3s;
    }

    .special-button:hover {
        background-color: #3b82f6;
        box-shadow: 0 0 0 5px #3b83f65f;
        color: #fff;
    }
</style>

<body>
    <form class="w-full max-w-lg" style="margin-left: 700px; margin-top: 100px;" action="{{ route('updateProfile', ['profile' => $profile]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-lg font-bold mb-2 " for="grid-first-name" style="color: #fffffe;">
                    FullName
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="fullName" type="text" placeholder="Arigatou Gosamasu">
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label style="color: #fffffe;" class="block uppercase tracking-wide text-gray-700 text-lg font-bold mb-2" for="grid-state">
                    Gender
                </label>
                <div class="relative">
                    <select name="gender" class="block appearance-none w-full bg-gray-200 border border-gray-200 font-bold text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" style="height: 30px;">
                        <option class="font-bold" value="male" style="color: #0f0e17;">male</option>
                        <option class="font-bold" value="female" style="color: #0f0e17;">female</option>
                        <option class="font-bold" value="not specified" style="color: #0f0e17;">not specified</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6" style="margin-top: 15px;margin-left: 1px;">
                <div class="w-full px-3">
                    <label style="color: #fffffe;" class="block uppercase tracking-wide text-gray-700 text-lg font-bold mb-2">
                        Address
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="address" placeholder="" style="width: 265px; height: 100px;">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6" style="margin-top: 15px;margin-left: 1px;">
                <div class="w-full px-3">
                    <label style="color: #fffffe;" class="block uppercase tracking-wide text-gray-700 text-lg font-bold mb-2" for="grid-password">
                        Phone Number
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="phone_number" placeholder="" style="width: 265px;">
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6" style="margin-top: 15px;margin-left: 1px;">
                <div class="w-full px-3">
                    <label style="color: #fffffe;" class="block uppercase tracking-wide text-gray-700 text-lg font-bold mb-2" for="grid-password">
                        Birthday
                    </label>
                    <input id="datepicker" name="data_of_birth" class="border-2 border-gray-300 rounded px-3 py-2 w-56 font-bold" type="date" placeholder="Select a date">
                </div>
            </div>
            <script>
                flatpickr("#datepicker", {
                    // Configuration options for Flatpickr
                    // You can customize the appearance and behavior here
                });
            </script>
            <div class="max-w-sm font-bold" style="margin-left: 10px;">
                <label for="photobutton" class="text-lg font-bold" style="color: #fffffe;">Your Photo</label>
                <div class="relative z-0 mt-0.5 flex w-full -space-x-px">
                    <input name="image" type="file" class="block w-full cursor-pointer appearance-none rounded-l-md border border-gray-200 bg-white px-3 py-2 text-sm transition focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600 disabled:cursor-not-allowed disabled:bg-gray-200 disabled:opacity-75">
                </div>
            </div>
            <button class="special-button" type="submit" style="margin-top: 80px; margin-left: -210px;">Update</button>
    </form>
</body>

</html>
@endsection