<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <main>
        <form action="login" method="post">
            @csrf
            <div class="form-fill">
                <div class="info">
                    <h2>Quiz<span>Grad</span></h2>
                    <p>Welcome back</p>
                    <p>Log in to your account to continue</p>
                </div>

                <div class="input-group">
                    @if (Session::get('fail'))
                        <div
                            style="background-color:  rgb(17, 231, 160); width:90%; margin-bottom:20px;
              font-weight:lighter;  padding:12px; color:white;">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email Address">
                    <span>
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="password" value="{{ old('Password') }}"name='Password' placeholder="Password">
                    <span>
                        @error('Password')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="check">
                        <div class="box">
                            <input type="checkbox" name="remember_me" value="1">Remember me
                        </div>
                        <p>Forgot password?</p>
                    </div>
                    <div class="button">
                        <div>
                            <button>Log in</button>
                        </div>
                        <a href="signup2">Sign up</a>
                    </div>
                </div>

            </div>
            <div class="pageimg">
                <img src="images/funny-3d-illustration-american-referee.jpg">
            </div>
        </form>
    </main>
</body>

</html>
