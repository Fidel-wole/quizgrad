<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        @auth
            @include('navbar')
            <!--------------------------END OF ASIDE---------->

            <!-------------------------MAIN START----------------->
            <main>
                <h1>Dashboard</h1>

                <div class="date">
                    <p>Current Day</p>
                    <input type="text" id="date" value="" readonly>
                </div>

                <div class="insights">
                    <div class="stats">
                        <span class="material-icons-sharp">analytics</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Total Points</h3>
                                <h1>1000</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36'></circle>
                                </svg>
                                <div class="number">
                                    <p>81%</p>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Last 24 hours</small>
                    </div>
                    <!--------------------END OF STATS--------------->
                    <div class="test">
                        <span class="material-icons-sharp">grade</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Local Rank</h3>
                                <h1>100</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36'></circle>
                                </svg>
                                <div class="number">
                                    <p>21%</p>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Last 24 hours</small>
                    </div>
                    <!---------------END OF LOCAL RANK-------------->
                    <div class="time">
                        <span class="material-icons-sharp">language</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Global Rank</h3>
                                <h1>200</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36'></circle>
                                </svg>
                                <div class="number">
                                    <p>31%</p>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Last 24 hours</small>
                    </div>
                    <!--------------END OF TIME SPENT----------->
                </div>
                <div class="category">
                    <h3>Categories</h3>
                    <div class="quiz">
                        @foreach ($category as $item)
                            <div class="quiz-photo">

                                <a href="/category/{{ $item->id }}">


                                    <span class="material-icons-sharp">grass</span>
                                    <p>{{ $item->categories }}</p>
                                </a>

                            </div>
                        @endforeach
                        {{-- <div class="quiz-science">
            <a href="">
            <span class="material-icons-sharp">science</span>
            <p>Science</p>
            </a>
          </div>
          <div class="quiz-commercial">
            <a href="">
            <span class="material-icons-sharp">language</span>
            <p>Commercial</p>
            </a>
          </div>
          <div class="quiz-music">
            <a href="">
            <span class="material-icons-sharp">album</span>
            <p>Music</p>
            </a>
          </div>
          
          <div class="quiz-photo">
            <a href="">
            <span class="material-icons-sharp">psychology</span>
            <p>General Knowledge</p>
          </a>
          </div> --}}

                    </div>
                </div>
                <div class="lessons">
                    <h3>Popular Lessons</h3>
                    <div class="card">
                        <a href="">
                            <div class="lesson-content">
                                <div class="lesson-img">
                                    <img src="images/5224588.jpg">
                                </div>
                                <div class="lesson-info">
                                    <p><b>Science Technology</b></p>
                                    <p>By Eliab Ilemobayo</p>
                                </div>

                            </div>
                        </a>
                        <a href="">
                            <div class="lesson-content">
                                <div class="lesson-img">
                                    <img src="images/5224588.jpg">
                                </div>
                                <div class="lesson-info">
                                    <p><b>Science Technology</b></p>
                                    <p>By Eliab Ilemobayo</p>
                                </div>

                            </div>
                        </a>
                        <a href="">
                            <div class="lesson-content">
                                <div class="lesson-img">
                                    <img src="images/5224588.jpg">
                                </div>
                                <div class="lesson-info">
                                    <p><b>Science Technology</b></p>
                                    <p>By Eliab Ilemobayo</p>
                                </div>

                            </div>
                        </a>
                        <div class="show">
                            <div>
                                <span class="material-icons-sharp">arrow_circle_right</span>
                                <p>More</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!------END OF MAIN SECTION------------------>
            <!-------------------RIGHT SECTION START----------------->
            <div class="right">
                @include('/header')
                <!-----------END OF TOP---------------->
                <div class="recent-updates">
                    <h2>Recents Updates</h2>
                    <div class="updates">
                        <div class="update">
                            <div class="profile-photo">
                                <img src="images/cartoon3.jpg" alt="">
                            </div>
                            <div class="message">
                                <p><b>Eliab Zoe</b> challenged you to a quiz</p>
                                <small class="text-muted">2 minutes ago</small>
                            </div>
                        </div>
                        <div class="update">
                            <div class="profile-photo">
                                <img src="images/catoon1.jpg" alt="">
                            </div>
                            <div class="message">
                                <p><b>Williams Odunayo</b> challenged you to a quiz</p>
                                <small class="text-muted">2 minutes ago</small>
                            </div>
                        </div>
                        <div class="update">
                            <div class="profile-photo">
                                <img src="images/cartoon2.jpg"" alt="">
                            </div>
                            <div class="message">
                                <p><b>Pery Tylon</b> challenged you to a quiz</p>
                                <small class="text-muted">2 minutes ago</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="recent-updates">
                    <h2>Top Rank of the week</h2>
                    <div class="updates">
                        <div class="update">
                            <div class="profile-photo">
                                <img src="images/cartoon7.jpg" alt="">
                            </div>
                            <div class="message">
                                <p><b>Eliab Zoe</b></p>
                                <p>124 points</p>
                            </div>
                        </div>
                        <div class="update">
                            <div class="profile-photo">
                                <img src="images/cartoon5.jpg" alt="">
                            </div>
                            <div class="message">
                                <p><b>Williams Odunayo</b></p>
                                <p>120 points</p>
                            </div>
                        </div>
                        <div class="update">
                            <div class="profile-photo">
                                <img src="images/cartoon6.png" alt="">
                            </div>
                            <div class="message">
                                <p><b>Pery Tylon</b></p>
                                <p>114 points</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>

    <script src="script.js"></script>
</body>

</html>
