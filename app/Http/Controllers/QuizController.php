<?php
namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Courses;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create()
    {
        $courses = Courses::all();
        return view('quizzes.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'time_alloted' => 'required|integer',
            'score' => 'required|integer',
            'questions.*.question' => 'required|string',
            'questions.*.point' => 'required|integer',
            'questions.*.answers.*' => 'required|string',
            'questions.*.correct_answer' => 'required|integer',
        ]);

        $quiz = Quiz::create([
            'course_id' => $request->course_id,
            'time_alloted' => $request->time_alloted,
            'score' => $request->score,
        ]);

        foreach ($request->questions as $questionData) {
            $question = Question::create([
                'quiz_id' => $quiz->id,
                'question' => $questionData['question'],
                'point' => $questionData['point'],
            ]);

            foreach ($questionData['answers'] as $key => $answerText) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer' => $answerText,
                    'is_correct' => ($key == $questionData['correct_answer']) ? true : false,
                ]);
            }
        }

        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully!');
    }
}
