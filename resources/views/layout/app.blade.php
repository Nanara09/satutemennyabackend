<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        #sidebar{
              position: absolute;
                left: 0;
        }

        #navbar-content {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        #navbar nav ul{
             display: flex;
            gap: 10px;
            list-style-type: none;
        }

        #content{

        }

        #wrapper {
            display: flex;
            justify-content: center;
          

        }
    </style>
</head>
<body>
    <div id="wrapper">
        <div id= "sidebar">
         @yield('sidebar')
        </div>
        <div id="navbar-content">
            <div id="navbar">
                @yield('navbar')
            </div>
            <div id="content">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>