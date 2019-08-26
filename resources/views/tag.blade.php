@extends("layouts.app")

@section("page-title")
    @parent - {{ $tag->name }}
@endsection

@section("body")

    <section id="presentation">

        <h2 class="section__title--big">{{ $tag->name }}</h2>

    </section>

    <section id="quiz">

        <div class="section__div--flex">

            @foreach($tag->quizzes as $quiz)
                <div class="div__card">
                    <h4 class="card__title"><a href="{{ route("quiz-page", array("quizId" => $quiz->id)) }}">{{ $quiz->title }}</a></h4>
                    <p class="card__description">{{ $quiz->description }}</p>
                    <p class="card__author">{{ $quiz->app_users->firstname . " " . $quiz->app_users->lastname }}</p>
                </div>
            @endforeach
        </div>

    </section>

@endsection
