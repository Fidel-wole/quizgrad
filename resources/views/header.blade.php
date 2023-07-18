<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

    <div class="top">
        <button id="menu-btn">
            <span class="material-icons-sharp">menu</span>
        </button>
        <div class="theme-toggle">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div>
        <div class="profile">
            <div class="info">
                @csrf
                <p>Hey, <b>{{ auth()->user()->Username }}</p>
                <small class="text-muted">User</small>
            </div>
            <a href="/profile/{{ auth()->user()->Username }}">
                <div class="profile-photo">
                    <img
                        src="{{ auth()->user()->Avatar ? asset('/storage/image/' . auth()->user()->Avatar) : 'imsges/funny-3d-illustration-american-referee.jpg' }}">
                </div>
            </a>
        </div>
    </div>

    <script src="{{ asset('script.js') }}"></script>
