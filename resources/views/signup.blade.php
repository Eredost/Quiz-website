@extends("layouts.app")

@section("additional-links")
    <link rel="stylesheet" href="{{ url('css/form.css') }}">
@endsection

@section("page-title")
    @parent - Inscription
@endsection

@section("body")

    <h2 class="section__title--big">Inscription</h2>

    <form action="" class="container__form" method="post">

        <div class="form__block">
            <label for="firstname" class="form__label">Prénom :</label>
            <input type="text" id="firstname" name="firstname" class="form__input" placeholder="Votre prénom" value="{{ $request->input("firstname") }}">
        </div>

        <div class="form__block">
            <label for="lastname" class="form__label">Nom :</label>
            <input type="text" id="lastname" name="lastname" class="form__input" placeholder="Votre nom" value="{{ $request->input("lastname") }}">
        </div>

        <div class="form__block">
            <label for="email" class="form__label">Email :</label>
            <input type="email" id="email" name="email" class="form__input" placeholder="Votre email" value="{{ $request->input("email") }}">
        </div>

        <div class="form__block">
            <label for="password" class="form__label">Mot de passe :</label>
            <input type="password" id="password" name="password" class="form__input" placeholder="Votre mot de passe">
        </div>

        <div class="form__block">
            <label for="password2" class="form__label">Mot de passe (confirmation) :</label>
            <input type="password" id="password2" name="password2" class="form__input" placeholder="Confirmation de votre mot de passe">
        </div>

        @foreach($errors as $error)
            <div class="form__block--error">
                <p>{{ $error }}</p>
            </div>
        @endforeach

        @foreach($success as $message)
            <div class="form__block--success">
                <p>{{ $message }}</p>
            </div>
        @endforeach

        <div class="form__block">
            <input type="submit" class="form__input--submit" value="S'inscrire">
        </div>
    </form>

@endsection
