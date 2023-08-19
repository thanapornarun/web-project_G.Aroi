<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="flex justify-center mt-20 px-8">
        <form class="max-w-2xl">
            <div class="flex flex-wrap border shadow rounded-lg p-3 dark:bg-gray-600">
                <h2 class="text-xl text-gray-600 dark:text-gray-300 pb-2"> {{ $user->name }} Account settings: </h2>
                <div class="flex flex-col gap-2 w-full border-gray-400">
                    <form action="{{ route('users.profile.store', ['user' => $user]) }}" method="POST">
                        @csrf
                        <div>
                            <label class="text-gray-600 dark:text-gray-400" for="full_name">
                                Full Name
                            </label>
                            <input class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100" type="text" name="full_name">
                        </div>

                        <div>
                            <label class="text-gray-600 dark:text-gray-400">
                                Gender
                            </label>
                            <input class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100" type="text" name="gender">
                        </div>

                        <div>
                            <label class="text-gray-600 dark:text-gray-400">
                                Address
                            </label>
                            <input class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100" type="text" name="address">
                        </div>

                        <div>
                            <label class="text-gray-600 dark:text-gray-400">
                                Phone Number
                            </label>
                            <input class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow dark:bg-gray-600 dark:text-gray-100" type="text" name="phone_number">
                        </div>

                        <div>
                            <label for="birthdaytime" class="text-gray-600 dark:text-gray-400"> Birthday (date and time):</label>
                            <input type="datetime-local" id="birthdaytime" name="data_of_birth">
                        </div>

                        <div class="flex justify-end">
                            <button class="py-1.5 px-3 m-1 text-center bg-violet-700 border rounded-md text-white hover:bg-violet-500 hover:text-gray-100 dark:text-gray-200 dark:bg-violet-700" type="submit">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </form>
    </div>

</body>

</html>