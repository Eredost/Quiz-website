@extends("layouts.app")

@section("additional-links")
    <link rel="stylesheet" href="{{ url('css/quiz.css') }}">
@endsection

@section("page-title")
    @parent - Quiz
@endsection

@section("body")

    <h2 class="section__title--big">{{ $quiz->title }}</h2>

    <ul class="list__categories">
        @foreach($tags as $tag)
            <li class="list__categorie">{{ $tag->name }}</li>
        @endforeach
    </ul>

    <p class="paragraph__description">{{ $quiz->description }}</p>

    <p class="paragraph__author">{{ $quiz->app_users->firstname . " " . $quiz->app_users->lastname }}</p>

    <section id="quiz">
        @foreach($questions as $question)
            <div class="quiz__card">
                <div class="card__header">
                    <h3 class="card__header--title">{{ $question->question }}</h3>
                    <span class="card__difficulty difficulty--{{ $question->levels->id }}">{{ $question->levels->name }}</span>
                </div>
                <div class="card__body">
                    @foreach($answers as $index => $answer)
                        @if ($answer->questions_id == $question->id)
                            <div class="card__body--question">
                                <p>{{ $answer->description }}</p>
                            </div>
                            @php
                                unset($answers[$index]);
                            @endphp
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>
@endsection
