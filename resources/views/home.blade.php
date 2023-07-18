<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home page</title>
</head>

<body>
    <section class="body">
        <header>
            <h3>Quiz<span>Grad</span></h3>
            <div class="link">
                <a href="">How it works</a>
                <a href="">Features</a>
                <a href="">About us</a>
                <a href="login2" id="log">Log in</a>
            </div>

        </header>
        <hr>
        <div class="head">

            <div class="links">
                <a href="">How it works</a>
                <a href="">Features</a>
                <a href="">About us</a>
                <a href="" id="log">Log in</a>
            </div>

        </div>
        <section class="landing-page">
            <div class="landing-pagecon">
                <h1>Learn</h1>
                <h1>new concepts</h1>
                <p>We will help you prepare for exams and quizes</p>
                <form action="login2">
                    <button>Start solving</button>
                </form>
            </div>
            <div class="landing-pageimg">
                <img src="images/5224588.jpg">
            </div>
        </section>
    </section>
    <script>
        function open() {
            document.querySelector(".head").style.height = "50px";
        }
    </script>
</body>

</html>