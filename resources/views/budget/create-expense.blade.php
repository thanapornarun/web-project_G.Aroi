
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
    <h1 class="text-center text-blue-400 font-bold text-3xl uppercase mb-10" > {{$event->event_name}}</h1>
    <h1 class="text-center text-blue-400 font-bold text-3xl uppercase mb-10" > {{$budget->budget}}</h1>

    <div class="w-full">
        <h2 class="text-center text-blue-400 font-bold text-2xl uppercase mb-10">Create New Expense</h2>
        <div class="bg-white p-10 rounded-lg shadow md:w-3/4 mx-auto lg:w-1/2">
                <form action="{{ route('save.expense',['event'=>$event,'budget'=>$budget])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="bill_name" class="block mb-2 font-bold text-gray-600">Bill Name</label>
                    @error ('bill_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                    @enderror
                    <input type="text" id="bill_name" name="bill_name" autocomplete = "off" placeholder="Put in bill name" 
                    value ="{{old('bill_name','') }}" 
                    class="border border-gray-300 @error('bill_name') border-red-600 @enderror shadow p-3 w-full rounded mb-">
                </div>

                <div class="mb-5">
                    <label for="amount" class="block mb-2 font-bold text-gray-600">Amount</label>
                    @error ('amount')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                    @enderror
                    <input type="decimal" id="amount" name="amount" 
                    autocomplete = "off" placeholder="Put in amount" 
                    value ="{{old('amount','') }}" 
                    class="border border-gray-300 @error('amount') border-red-600 @enderror shadow p-3 w-full rounded mb-">
                </div>

                <div class="mb-5">
                    <label for="description" class="block mb-2 font-bold text-gray-600">description</label>
                    @error ('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                    @enderror
                    <input type="text   " id="description" name="description" 
                    autocomplete = "off" placeholder="Put in description" 
                    value ="{{old('description','') }}" 
                    class="border border-gray-300  @error('description') border-red-600 @enderror shadow p-3 w-full rounded mb-">
                </div>

                <div class="mb-5">
                    <label for="date" class="block mb-2 font-bold text-gray-600">Birthday (date and time):</label>
                    @error ('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="datetime-local" id="date" name="date"
                    autocomplete = "off" placeholder="Put in description" 
                    value ="{{old('date','') }}" 
                    class="border border-gray-300  @error('date') border-red-600 @enderror shadow p-3 w-full rounded mb-">
                </div>

        
        



                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <div class="py-20 bg-white px-2">
                        <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                            <div class="md:flex">
                                <div class="w-full p-3">
                                    <div class="relative border-dotted h-48 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">

                                        <div class="absolute">
                    
                                        <div class="flex flex-col items-center">
                                        <i class="fa fa-folder-open fa-4x text-blue-700"></i>
                                        <span class="block text-gray-400 font-normal">Attach you files here</span>
                                    </div>
                                </div>

                                <input type="file" class="h-full w-full opacity-0" name="imagePath" id="imagePath">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            


                <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
@endsection