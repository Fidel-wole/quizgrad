<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz_category;
use Illuminate\Http\Request;
use App\Models\Quiz_topics;
use App\Models\User;
use App\Models\userAnswers;
use Illuminate\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class QuestionsController extends Controller
{
    public function showQuiz(Request $request, Quiz_topics $post)
    {
        $posts = $post->quest()->get();


        return View('viewquestions', ['post' => $posts])->render();

        // Add the headers
        // $headers = [
        //     'Access-Control-Allow-Origin' => '*',
        //     'Access-Control-Allow-Methods' => 'GET, POST',
        //     'Access-Control-Allow-Headers' => 'X-Requested-With, Content-Type',
        // ];
        // if ($request->ajax()) {
        //     return response()->json($posts)->withHeaders($headers);
        // }
    }



    public function create(Request $request, $user)
    {
        $request->validate([
            'subject' => 'required',
            'topic' => 'required',

        ]);
        // $incomingFields['subject'] = strip_tags($incomingFields['subject']);
        // $incomingFields['topics'] = strip_tags($incomingFields['topic']);
        // $incomingFields['user_id'] = auth()->id();
        // $incomingFields['category_id']= $user->id;
        // Quiz_topics::create($incomingFields);
        $randonNumber = random_int(100000, 999999);
        $newQuiz = Quiz_topics::create([
            'subject' => $request['subject'],
            'topics' => $request['topic'],
            'user_id' => auth()->user()->id,
            'category_id' => $user,
            'subjectId' =>$randonNumber 
        ]);

        //  echo $newQuiz->id;
        if ($newQuiz) {
            return redirect('questions')
                ->with('subjectId', $newQuiz->id);
        }
    }

    public function index()
    {
        $question = Question::all();
        return view('questions')->with(compact('question'));
    }
    public function questions(Request $request)
    {
        $request->validate([
            'questions' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'answer' => 'required',
        ]);
       $newQuiz =  Question::create([
            'questions' => $request['questions'],
            'option_a' => $request['option_a'],
            'option_b' => $request['option_b'],
            'option_c' =>$request['option_c'],
            'option_d' =>$request['option_d'],
            'answer' =>$request['answer'],
            'subjectId' => $request['subjectId']
        ]);


        
        if ($newQuiz) {
            $message = 'Quiz Created Sucessfully,Proceed';
            return response()->json(['message' => $message]);
        }
    }

    //Questions marker
    public function mark(Request $request)
    {
        $userAnswers = $request->input('answer');
        $questionIds = array_keys($userAnswers);
        $questions = Question::whereIn('id', $questionIds)->get();
       
        $score = 0;
        $percentScore = 0;
        foreach ($questions as $question) {
            $questionId = $question->id;
            $userAnswer = $userAnswers[$questionId];
            $correctAnswer = $question->answer;

            if ($userAnswer === $correctAnswer) {
               $score++;
               
            }
            userAnswers::create([
                'user_id'=>auth()->id(),
                'question_id'=>$questionId,
                'selected_answer' => $userAnswer,
                'is_correct' => $userAnswer === $correctAnswer,
            ]);
        }
        $totaQuestions = count($questions);
        $incorrectAnswer = $totaQuestions -$score;
        $percentageScore = ($score / $totaQuestions) * 100;
        $roundedScore = round($percentageScore);
        \Illuminate\Support\Facades\Session::put('Correctscore', $score);
        \Illuminate\Support\Facades\Session::put('score', $roundedScore);
        \Illuminate\Support\Facades\Session::put( 'quizCount', $totaQuestions);
        \Illuminate\Support\Facades\Session::put( 'wrongAnswers', $incorrectAnswer);
    
        return redirect()->route('resultSummary');
    }

    public function result(){
        $Correctscore = \Illuminate\Support\Facades\Session::get('Correctscore');
        $score = \Illuminate\Support\Facades\Session::get('score');
        $quizCount = \Illuminate\Support\Facades\Session::get( 'quizCount');
        $wrongAnswers = \Illuminate\Support\Facades\Session::get( 'wrongAnswers');
        // \Illuminate\Support\Facades\Session::forget('score');
        // \Illuminate\Support\Facades\Session::forget('quizCount');
        return view('resultSummary', compact('score', 'quizCount', 'wrongAnswers', 'Correctscore'));
    }
    public function quizs(Quiz_category $category)
    {
        return view('category', ['category' => $category]);
    }
    public function category()
    {
        return view('categories', ['category' => Quiz_category::all()]);
    }
    public function createQuiz(Quiz_category $create)
    {
        return view('createQuiz', ['quizid' => $create->id]);
    }


    //    public function getmorequestions(Request $request)
    // {
    //     $currentPage = $request->page_num;
    //     // Set the paginator to the current page
    //     Paginator::currentPageResolver(function() use ($currentPage) {
    //         return $currentPage;
    //     });
    //     $transactions = DB::table('questions')->paginate(1);
    //     return view("viewquestions", compact("questions"));
    // }
    // }

}

