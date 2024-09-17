@extends('layouts.master')

@section('title')
    {{ $quiz->name }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Quizzes
        @endslot
        @slot('title')
            {{ $quiz->name }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('quizzes.submit', $quiz->id) }}" method="POST">
                        @csrf

                        <h4 class="card-title">{{ $quiz->name }}</h4>

                        @foreach ($questions as $question)
                            <div class="mb-4">
                                <label>{{ $question->question }} ({{ $question->point }} points)</label>
                                @foreach ($question->answers as $answer)
                                    <div class="form-check">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}" class="form-check-input" id="answer_{{ $answer->id }}">
                                        <label class="form-check-label" for="answer_{{ $answer->id }}">{{ $answer->answer }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Submit Quiz</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
