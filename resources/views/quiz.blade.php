@extends("layouts.app")

@section("additional-links")
    <link rel="stylesheet" href="{{ url('css/quiz.css') }}">
@endsection

@section("page-title")
    @parent - {{ $quiz->title }}
@endsection

@section("body")

    <h2 class="section__title--big">{{ $quiz->title }}</h2>

    <ul class="list__categories">
        @foreach($quiz->tags as $tag)
            <li class="list__categorie">{{ $tag->name }}</li>
        @endforeach
    </ul>

    <p class="paragraph__description">{{ $quiz->description }}</p>

    <p class="paragraph__author">{{ $quiz->app_users->firstname . " " . $quiz->app_users->lastname }}</p>

    <section id="quiz">
        @if (App\Utils\UserSession::isConnected() && $request->isMethod("get"))

            <form action="{{ route("quiz-post", array("quizId" => $quiz->id)) }}" method="post" class="quiz__form">
                @foreach($quiz->questions as $question)
                    <div class="quiz__card">
                        <div class="card__header">
                            <h3 class="card__header--title">{{ $question->question }}</h3>
                            <span class="card__difficulty difficulty--{{ $question->level->id }}">{{ $question->level->name }}</span>
                        </div>
                        <div class="card__body">
                            @foreach($answers as $index => $answer)
                                @if ($answer->questions_id == $question->id)
                                    <div class="card__body--question">
                                        <label for="{{ $answer->id }}" class="radio">
                                            <input type="radio" name="{{ $question->id }}" id="{{ $answer->id }}" value="{{ $answer->id }}" class="hidden">
                                            <span class="label"></span>{{ $answer->description }}
                                        </label>
                                    </div>
                                    @php
                                        unset($answers[$index]);
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <input type="submit" value="Valider les réponses" class="quiz__button">
            </form>

        @else

            @if ($score)
            <div class="quiz__score">
                <h3 class="quiz__score--large">Votre score : {{ $score }} / {{ count($quiz->questions) }}</h3>
            </div>
            @endif

            @foreach($quiz->questions as $question)
                <div class="quiz__card">
                    <div class="card__header">
                        <h3 class="card__header--title">{{ $question->question }}</h3>
                        <span class="card__difficulty difficulty--{{ $question->level->id }}">{{ $question->level->name }}</span>
                    </div>
                    <div class="card__body">
                        @foreach($answers as $index => $answer)
                            @if ($answer->questions_id == $question->id)

                                    <div class="card__body--question">

                                @if ($question->answers_id == $answer->id)

                                    <p class="answer--correct">{{ $answer->description }}</p>

                                @elseif (!empty($userRes[$question->id]) && $userRes[$question->id] == $answer->id)

                                    <p class="answer--wrong">{{ $answer->description }}</p>

                                @else

                                    <p>{{ $answer->description }}</p>

                                @endif

                                    </div>

                                @php
                                    unset($answers[$index]);
                                @endphp
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </section>
@endsection
