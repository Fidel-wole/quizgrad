<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="/https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="/dashboard.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        @include('navbar')
        <main>
            <h2>Create your own quiz</h2>
            <div id="successMsg"
                style=" display: none; background-color:  rgb(17, 231, 160); width:90%; margin-bottom:20px;
          font-weight:bolder;  padding:12px; color:white;">

            </div>


            <form class="quizQuestion" id="submitForm">
                <input type="hidden" name="subjectid" id="subjectId"
                    value="@if (Session::get('subjectId')) {{ Session::get('subjectId') }} @endif">
                <p>
                <h2>Question</h2>
                <textarea rows="4" style="width: 100%; height:7rem;" id="question" name="question">
    
    </textarea>
                <p>
                    <span id="questionErrorMsg" style="color:red"></span>
                    <label>Option 1</label>
                    <input type="text" name="option_a" id="option1">
                <p>
                    <span id="optionA" style="color:red"></span>
                    <label>Option 2</label>
                    <input type="text" name="option_b" id="option2">
                <p>
                    <span id="optionB" style="color:red"></span>
                    <label>Option 3</label>
                    <input type="text"name="option_c" id="option3">
                <p>
                    <span id="optionC" style="color:red"></span>
                <p>
                    <label>Option 4</label>
                    <input type="text" name="option_d" id="option4">
                <p>
                    <span id="optionD" style="color:red"></span>
                    <label> Answer</label>
                    <input type="text" name="answer" id="answer" placeholder="Answer">
                <p>
                    <span id="answer2" style="color:red"></span>

                    <button>Save and add another</button>
                    <button type="button" class="but2">Done</button>
            </form>
        </main>
        <div class="right">
            @include('header')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
    <script type='text/javascript'>
        $('#submitForm').on('submit', function(e) {
            e.preventDefault();

            let question = $('#question').val();
            let option_a = $('#option1').val();
            let option_b = $('#option2').val();
            let option_c = $('#option3').val();
            let option_d = $('#option4').val();
            let answer = $('#answer').val();
            let subjectId = $('#subjectId').val();
            $.ajax({
                url: '/questions',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    questions: question,
                    option_a: option_a,
                    option_b: option_b,
                    option_c: option_c,
                    option_d: option_d,
                    answer: answer,
                    subjectId: subjectId,

                },
                success: function(response) {
                    if (response.message) {
                        //  alert('Quiz Created Sucessfully, proceed');
                        $('#successMsg').show().html(response.message);
                        $('#successMsg').fadeIn().delay(3000).fadeOut();
                    } else {
                        console.error('server is missing:', response);
                    }
                },
                error: function(response) {
                    $('#questionErrorMsg').text(response.responseJSON.errors.question);
                    $('#optionA').text(response.responseJSON.errors.option_a);
                    $('#optionB').text(response.responseJSON.errors.option_b);
                    $('#optionC').text(response.responseJSON.errors.option_c);
                    $('#optionD').text(response.responseJSON.errors.option_d);
                    $('#answer2').text(response.responseJSON.errors.answer);
                },
            });
        });

        document.querySelector('.but2').addEventListener('click', () => {
            let confim = confirm('Are you sure you are done');
            if (confim == true) {
                window.location.href = "{{ route('analytics', ['quizs' => Auth::user()->Username]) }}";
            }
        })
    </script>
</body>

</html>