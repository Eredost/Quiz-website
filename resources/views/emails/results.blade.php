@extends("layouts.email")

@section("page-title")
    @parent - {{ $quiz->title }}
@endsection

@section("css")
    @parent

    @yield("stylesheet", view("emails.theme.main"))

    @yield("stylesheet", view("emails.theme.quiz"))
@endsection

@section("body")

    <h2 class="section__title--big">Bonjour {{ $user->firstname . " " . $user->lastname }}</h2>

    <p class="section__paragraph--centered">Voici les résultats de votre dernier quiz réalisé : </p>

    <h2 class="section__title--big">{{ $quiz->title }}</h2>

    <ul class="list__categories">
        @foreach($quiz->tags as $tag)
            <li class="list__categorie">{{ $tag->name }}</li>
        @endforeach
    </ul>

    <p class="paragraph__description">{{ $quiz->description }}</p>

    <p class="paragraph__author">{{ $quiz->app_users->firstname . " " . $quiz->app_users->lastname }}</p>

    <section id="quiz">



        <div class="quiz__score">
            <h3 class="quiz__score--large">Votre score : {{ $score }} / {{ count($quiz->questions) }}</h3>
        </div>

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

                                @if ($question->answers_id == $answer->id && App\Utils\UserSession::isConnected())

                                    <p class="answer--correct">{{ $answer->description }}</p>

                                @elseif (!empty($userRes[$question->id]) && $userRes[$question->id] == $answer->id)

                                    <p class="answer--wrong">{{ $answer->description }}</p>

                                @else

                                    <p>{{ $answer->description }}</p>

                                @endif

                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>
@endsection
