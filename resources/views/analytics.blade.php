<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons+Sharp') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/dashboard.css') }}">
</head>

<body>
    <div class="container">
        @include('/navbar')
        <main>
            <div class="profile">
                <div class="bigger-profile-photo">
                    <img src="{{ asset('/storage/image/' . auth()->user()->Avatar) }}">
                </div>
                <div class="wins">
                    <h1>{{ auth()->user()->Username }}</h1>
                    <p>Bonus Booster 25 lv
                    <div class="score">
                        <div class="game-wins">
                            <div class="wrap">
                                <span class="material-icons-sharp grass">tour</span>
                                <div>
                                    <h2>27 </h2>
                                    <p>Game wins</p>
                                </div>
                            </div>
                        </div>
                        <div class="game-wins">
                            <div class="wrap">
                                <span class="material-icons-sharp mark">arrow_upward</span>
                                <div>
                                    <h2>270 </h2>
                                    <p>Highest Score</p>
                                </div>
                            </div>
                        </div>
                        <div class="game-wins">
                            <div class="wrap">
                                <span class="material-icons-sharp">check</span>
                                <div>
                                    <h2>279 </h2>
                                    <p>Correct Answers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-quizes">
                <div class="head" style="display:flex; gap:0.5rem; ">
                    <h3>My Quizes</h3>
                    <span class="message-count">{{ $quizCount }}</span>
                    <input type="search" placeholder="Search">
                </div>
                <div class="quizes">
                    @foreach ($quizs as $quiz)
                        <a href='/viewquestions/{{ $quiz->id }}'>
                            <div class="quiz-con">


                                <h3>{{ $quiz->subject }}</h3>
                                <h5>{{ $quiz->topics }}</h5>
                                <small>Created at: {{ $quiz->created_at->format('d:m:y') }}</small>
                                <p>92 Questions</p>
                                <span>
                                    <ul>
                                        <p>20 per game</p>
                                    </ul>
                                </span>

                            </div>
                        </a>
                    @endforeach
                    {{ $quizs->links() }}

                </div>
            </div>
            <div class="summary grid-flow" data-spacing="large">

                <h2 class="section-title">Games History</h2>

                <div class="grid-flow">
                    <div class="summary-item" data-item-type="accent-1">
                        <div class="flex-group">
                            <b>Jan 15 2022</b><svg class="summary-icon" xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20" fill="none" viewBox="0 0 20 20">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25"
                                    d="M10.833 8.333V2.5l-6.666 9.167h5V17.5l6.666-9.167h-5Z" />
                            </svg>
                            <h3 class="summary-item-title">Star trek fan quiz</h3>
                        </div>
                        <p class="summary-score"><span>80</span> / 100</p>
                    </div>
                    <div class="summary-item" data-item-type="accent-2">
                        <div class="flex-group">
                            <b>Jan 15 2022</b><svg class="summary-icon" xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20" fill="none" viewBox="0 0 20 20">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25"
                                    d="M5.833 11.667a2.5 2.5 0 1 0 .834 4.858" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25"
                                    d="M3.553 13.004a3.333 3.333 0 0 1-.728-5.53m.025-.067a2.083 2.083 0 0 1 2.983-2.824m.199.054A2.083 2.083 0 1 1 10 3.75v12.917a1.667 1.667 0 0 1-3.333 0M10 5.833a2.5 2.5 0 0 0 2.5 2.5m1.667 3.334a2.5 2.5 0 1 1-.834 4.858" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25"
                                    d="M16.447 13.004a3.334 3.334 0 0 0 .728-5.53m-.025-.067a2.083 2.083 0 0 0-2.983-2.824M10 3.75a2.085 2.085 0 0 1 2.538-2.033 2.084 2.084 0 0 1 1.43 2.92m-.635 12.03a1.667 1.667 0 0 1-3.333 0" />
                            </svg>
                            <h3 class="summary-item-title">Animal Planet</h3>
                        </div>
                        <p class="summary-score"><span>92</span> / 100</p>
                    </div>
                    <div class="summary-item" data-item-type="accent-3">
                        <div class="flex-group">
                            <b>Jan 15 2022</b><svg class="summary-icon" xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20" fill="none" viewBox="0 0 20 20">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25"
                                    d="M7.5 10h5M10 18.333A8.333 8.333 0 1 0 1.667 10c0 1.518.406 2.942 1.115 4.167l-.699 3.75 3.75-.699A8.295 8.295 0 0 0 10 18.333Z" />
                            </svg>
                            <br>
                            <h3 class="summary-item-title">Astrophysis</h3>
                        </div>
                        <p class="summary-score"><span>61</span> / 100</p>
                    </div>
                    <div class="summary-item" data-item-type="accent-4">
                        <div class="flex-group">
                            <b>Jan 15 2022</b><svg class="summary-icon" xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20" fill="none" viewBox="0 0 20 20">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25"
                                    d="M10 11.667a1.667 1.667 0 1 0 0-3.334 1.667 1.667 0 0 0 0 3.334Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25"
                                    d="M17.5 10c-1.574 2.492-4.402 5-7.5 5s-5.926-2.508-7.5-5C4.416 7.632 6.66 5 10 5s5.584 2.632 7.5 5Z" />
                            </svg>
                            <h3 class="summary-item-title">Quiz of thrones</h3>
                        </div>
                        <p class="summary-score"><span>72</span> / 100</p>
                    </div>
                </div>

                <button class="button">View more</button>


            </div>

        </main>
        <div class="right">
            @include('/header')
            <div class="recent-updates">
                <h2>Achievements</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <span class="material-icons-sharp mark" style="color:gold;">workspace_premium</span>
                        </div>
                        <div class="message">
                            <p><b>Eliab Zoe</b> challenged you to a quiz</p>
                            <small class="text-muted">2 minutes ago</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="/images/character-avatar-3d-illustration_460336-702.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Williams Odunayo</b> challenged you to a quiz</p>
                            <small class="text-muted">2 minutes ago</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="/images/character-avatar-3d-illustration_460336-702.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Pery Tylon</b> challenged you to a quiz</p>
                            <small class="text-muted">2 minutes ago</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recent-updates">
                <h2>Inventory</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="/images/character-avatar-3d-illustration_460336-702.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Eliab Zoe</b> challenged you to a quiz</p>
                            <small class="text-muted">2 minutes ago</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="/images/character-avatar-3d-illustration_460336-702.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Williams Odunayo</b> challenged you to a quiz</p>
                            <small class="text-muted">2 minutes ago</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="/images/character-avatar-3d-illustration_460336-702.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Pery Tylon</b> challenged you to a quiz</p>
                            <small class="text-muted">2 minutes ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('script.js') }}"></script>
</body>

</html>
