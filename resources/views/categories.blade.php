<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="/dashboard.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        @auth
            @include('navbar')
            <main>
                <div class="category">
                    <div class="category">
                        <h3>Categories</h3>
                        <div class="quiz">
                            @foreach ($category as $item)
                                <div class="quiz-photo">

                                    <a href="/createQuiz/{{ $item->id }}">


                                        <span class="material-icons-sharp">grass</span>
                                        <p>{{ $item->categories }}</p>
                                    </a>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </main>
            <div class="right">
                @include('header')
            </div>
        @endauth
