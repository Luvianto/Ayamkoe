<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
        body {
            overflow-x: hidden;
        }
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-image: url('../images/hero2.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .hero::after{
            content: '';
            display: block;
            position: absolute;
            width: 100%;
            height: 10%;
            bottom: 0;
            background: linear-gradient(0deg,rgb(255, 255, 255) 10%, rgba(255, 255, 255, 0) 50%);
        }

        .hero .content{
            padding: 1.4rem 7%;
            max-width: 30rem;
        }

        .hero .content h1{
            font-size: 5em;
            color: #ffffff;
            text-shadow: 1px 1px 3px rgba(1, 1, 3, 0,5);
            line-height: 1.2;
        }

        .hero .content h1 span{
            color: #434343;
        }

        .hero .content p{
            color: #ffffff;
            font-size: 1.2rem;
            margin-top: 1rem;
            line-height: 1.4;
        }

        .hero .content .cta{
            margin-top: 1rem;
            display: inline-block;
            padding: 1rem 2rem;
            font-size: 1rem;
            color: #ffffff;
            background-color: #434343;
            border-radius: 0.5rem 8px;
            box-shadow: 1px 1px 3px rgba(1, 1, 3, 0,5);
            text-decoration: none;
        }
    </style>
</head>

<body>
    @include('layout.navbar')
    @yield('content')
    @include('layout.footer')
</body>

</html>
