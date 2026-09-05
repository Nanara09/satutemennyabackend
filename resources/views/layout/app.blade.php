<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>@yield('title')</title>
    <style>


    </style>
</head>

<body>
    <div id="wrapper" class="flex w-full ">
        <div id="sidebar" class="w-1/6 bg-gradient-to-r from-green-100 h-screen">
            <div class="flex justify-between items-start">
            @yield('sidebar')
            <hr class="border-2 border-blue h-screen">
            </div>
        </div>
        <div id="navbar-content" class="w-5/6 bg-gradient-to-r from-blue-50">
            <div id="navbar" class="mb-4">
                @yield('navbar')
                <hr class="border-2 border-blue">
            </div>
            <div id="content" class="flex flex-col justify-center px-10">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>