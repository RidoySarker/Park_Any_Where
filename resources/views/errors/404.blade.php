<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="{{asset('frontend_assets/errors/404/css/style.css')}}"/>
    <title>Park AnyWhere</title>
</head>
<body>
    <body class="bg-purple">
        <div class="stars">
            <div class="custom-navbar">
                <div class="brand-logo">
                    <img href="{{route('home')}}" src="{{asset('frontend_assets/images/whitelogo.png')}}" width="250px"/>
                </div>
                <div class="navbar-links">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="#" target="_blank">About</a></li>
                        <li><a href="#" target="_blank">Features</a></li>
                        <li><a href="{{route('home')}}" class="btn-request">Park AnyWhere</a></li>
                    </ul>
                </div>
            </div>
            <div class="central-body">
                <img class="image-404" src="{{asset('frontend_assets/errors/404/img/404.svg')}}" width="300px">
                <a href="{{route('home')}}" class="btn-go-home">GO BACK HOME</a>
            </div>
            <div class="objects">
                <img class="object_rocket" src="{{asset('frontend_assets/errors/404/img/rocket.svg')}}" width="40px">
                <div class="earth-moon">
                    <img class="object_earth" src="{{asset('frontend_assets/errors/404/img/earth.svg')}}" width="100px">
                    <img class="object_moon" src="{{asset('frontend_assets/errors/404/img/moon.svg')}}" width="80px">
                </div>
                <div class="box_astronaut">
                    <img class="object_astronaut" src="{{asset('frontend_assets/errors/404/img/astronaut.svg')}}" width="140px">
                </div>
            </div>
            <div class="glowing_stars">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
            </div>
        </div>
    </body>
</body>
</html>
