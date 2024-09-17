@extends('layouts.master')

@section('title')
    Create Quiz
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Quizzes
        @endslot
        @slot('title')
            Create Quiz
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('quizzes.store') }}" method="POST">
                        @csrf

                        <h4 class="card-title">Create a New Quiz</h4>

                        <!-- Course Selection -->
                        <div class="mb-3">
                            <label for="courseSelect">Select Course</label>
                            <select id="courseSelect" name="course_id" class="form-control" required>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Quiz Details -->
                        <div class="mb-3">
                            <label for="quizName">Quiz Name</label>
                            <input id="quizName" name="name" type="text" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="timeAlloted">Time Alloted (minutes)</label>
                            <input id="timeAlloted" name="time_alloted" type="number" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="score">Total Score</label>
                            <input id="score" name="score" type="number" class="form-control" required>
                        </div>

                        <!-- Questions and Answers -->
                        <div id="questions-container">
                            <h5>Questions</h5>
                            <div class="question-group">
                                <!-- Example Question -->
                                <div class="mb-3">
                                    <label for="question_1">Question</label>
                                    <input id="question_1" name="questions[0][question]" type="text" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="question_1_points">Points</label>
                                    <input id="question_1_points" name="questions[0][point]" type="number" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Answers</label>
                                    <div class="form-check">
                                        <input type="radio" name="questions[0][correct_answer]" value="1" class="form-check-input" id="answer_1_correct">
                                        <input name="questions[0][answers][1]" type="text" class="form-check-input" id="answer_1_1">
                                        <label class="form-check-label" for="answer_1_1">Answer 1</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="questions[0][correct_answer]" value="2" class="form-check-input" id="answer_1_incorrect">
                                        <input name="questions[0][answers][2]" type="text" class="form-check-input" id="answer_1_2">
                                        <label class="form-check-label" for="answer_1_2">Answer 2</label>
                                    </div>
                                    <!-- Add more answers if needed -->
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Create Quiz</button>
                            <a href="{{ route('quizzes.index') }}" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
