@extends("layouts.app")

@section("page-title")
    @parent - Sujets des quiz
@endsection

@section("body")

    <section id="presentation">

        <h2 class="section__title--big">Tous les sujets de quiz</h2>

    </section>

    <section class="tags">

        <ul class="tags__links">
        @foreach($tags as $tag)

                <li class="tag__link"><a href="{{ route("tag-quiz-page", array("tagId" => $tag->id)) }}" class="tag__link--blue">{{ $tag->name }}</a></li>

        @endforeach
        </ul>
    </section>

@endsection
