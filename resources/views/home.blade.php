@extends("layouts.app")

@section("page-title")
    @parent - Accueil
@endsection

@section("body")

    <section id="presentation">

        <h2 class="section__title--big">Bienvenue sur O'Quiz</h2>

        <p class="section__paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate eius, eos fugiat libero nemo ratione repudiandae rerum voluptatem. Ab fugiat maiores minima nihil quo, unde veniam! A accusamus adipisci amet architecto beatae dolorem doloremque dolores ducimus eaque enim, eos, error et ex facilis iste iure iusto magni maxime molestias nobis, non numquam obcaecati perferendis porro praesentium quam qui quidem quo recusandae reiciendis repellendus soluta tempora tempore ullam veniam veritatis voluptate! Beatae commodi cupiditate iusto nisi quae. Accusantium commodi dicta earum, in modi mollitia pariatur quibusdam quod repellat repellendus saepe tempora?</p>
    </section>

    <section id="quiz">

        <div class="section__div--flex">

            @foreach($quizzes as $quiz)
                <div class="div__card">
                    <h4 class="card__title"><a href="{{ route("quiz-page", array("quizId" => $quiz->id)) }}">{{ $quiz->title }}</a></h4>
                    <p class="card__description">{{ $quiz->description }}</p>
                    <p class="card__author">{{ $quiz->app_users->firstname . " " . $quiz->app_users->lastname }}</p>
                </div>
            @endforeach
        </div>
    </section>

@endsection
