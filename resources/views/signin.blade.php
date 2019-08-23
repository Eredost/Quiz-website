@extends("layouts.app")

@section("additional-links")
    <link rel="stylesheet" href="{{ url('css/form.css') }}">
@endsection

@section("page-title")
    @parent - Connexion
@endsection

@section("body")

    <h2 class="section__title--big">Connexion</h2>

    <form action="" class="container__form" method="post">

        <div class="form__block">
            <label for="email" class="form__label">Email :</label>
            <input type="email" id="email" name="email" class="form__input" placeholder="Votre email" value="{{ $request->input("email") }}">
        </div>

        <div class="form__block">
            <label for="password" class="form__label">Mot de passe :</label>
            <input type="password" id="password" name="password" class="form__input" placeholder="Votre mot de passe">
        </div>

        @foreach($errors as $error)
            <div class="form__block--error">
                <p>{{ $error }}</p>
            </div>
        @endforeach

        <div class="form__block">
            <input type="submit" class="form__input--submit" value="Se connecter">
        </div>
    </form>

@endsection
