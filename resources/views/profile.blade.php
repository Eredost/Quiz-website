@extends("layouts.app")

@section("page-title")
    @parent - Profil
@endsection

@section("body")

    <section id="presentation">

        <h2 class="section__title--big">Votre profil</h2>

    </section>

    <section id="profile">

        <div class="profile__card">

            <div class="profile__image">
                <img src="{{ url("img/profile-picture.png") }}" alt="profile picture" class="profile__image--big">
            </div>

            <div class="profile__body">
                <p class="profile__name">{{ $user->firstname . " " . $user->lastname }}</p>
                <p class="profile__email">{{ $user->email }}</p>
                <p class="profile__creation-date">Compte créé le {{ $creationDate }}</p>
            </div>
        </div>

    </section>

@endsection
