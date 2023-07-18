<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="/dashboard.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        @include('navbar')
        <main>
            <div class="topImage">
                <img src="/images/science.jpg">
                <div class='text'>
                    <h1>Welcome to the world of {{ $category->categories }}</h1>
                    <p>Pick a subject to start quiz</p>
                </div>
            </div>

            <div class="subjects">
                @foreach ($category->topics as $cart)
                    <div class="subject">
                        <a href="/viewquestions/{{ $cart->id }}">
                            <h2>{{ $cart->subject }}</h2>
                            <li>Topic: {{ $cart->topics }}</li>
                            <li>Duration: 10 minutes</li>
                            <li>50 Questions</li>
                        </a>
                    </div>
                @endforeach
            </div>

        </main>
        <div class="right">
            @include('header')
        </div>
    </div>
</body>

</html>
