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
        <form action="signup" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-fill">
                <div class="info">
                    <h2>Quiz<span>Grad</span></h2>
                    <p>Welcome back</p>
                    <p>Don't miss out, sign up now</p>
                </div>

                <div class="input-group">
                    @if (Session::get('sucess'))
                        <div
                            style="background-color:  rgb(17, 231, 160); width:90%; margin-bottom:20px;
              font-weight:lighter;  padding:12px; color:white;">
                            {{ Session::get('sucess') }}
                        </div>
                    @endif
                    @if (Session::get('fail'))
                        <div
                            style="background-color:  rgb(17, 231, 160); width:90%; margin-bottom:20px;
              font-weight:lighter;  padding:12px; color:white;">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    <input type="text" name="Fullname" value="{{ old('Fullname') }}" placeholder="Fullname">
                    <span>
                        @error('Fullname')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="email" name='email' value="{{ old('email') }}" placeholder="Email">
                    <span>
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="text" name="Username" value="{{ old('Username') }}" placeholder="Username">
                    <span>
                        @error('Username')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="password" name='Password' id="password" value="{{ old('Password') }}" placeholder="Password">
                    <span>
                        @error('Password')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="password" name='' id="confirmPassword" placeholder="Confirm Password">
                    <p>Upload Profile picture if available
                    <p>
                        <input type="file" name='avatar'value="{{ old('avatar') }}"><br>
                        <span>
                            @error('avatar')
                                {{ $message }}
                            @enderror
                        </span>
                    <div class="button">
                        <div>
                            <button>Sign up</button>
                        </div>
                        <a href="login">Log in</a>
                    </div>
                </div>

            </div>
            <div class="pageimg">
                <img src="images/funny-3d-illustration-american-referee.jpg">
            </div>
        </form>
    </main>
    <script>
        let password = document.getElementById('password').value;
        let confirmpassword = document.getElementById('confirmPassword').value;
        if (confirmPassword != password){
            alert("Password doesn't match");
        }
    </script>
</body>

</html>
