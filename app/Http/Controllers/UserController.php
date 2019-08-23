<?php


namespace App\Http\Controllers;


use App\Models\AppUser;
use App\Utils\UserSession;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function signUp(Request $request)
    {
        $errors = array();
        $success = array();

        if ($request->isMethod("post")) {

            $firstname = trim($request->input("firstname")) ?? false ;
            $lastname = trim($request->input("lastname")) ?? false ;
            $email = trim($request->input("email")) ?? false ;
            $password = trim($request->input("password")) ?? false ;
            $password2 = trim($request->input("password2")) ?? false ;

            if ($firstname) {
                if (strlen($firstname) < 3 || strlen($firstname) > 64) {
                    $errors[] = "Votre Prénom doit contenir entre 3 et 64 caractères !";
                }
            } else {
                $errors[] = "Le champ 'Prénom' est obligatoire !";
            }

            if ($lastname) {
                if (strlen($lastname) < 3 || strlen($firstname) > 64) {
                    $errors[] = "Votre Nom doit contenir entre 3 et 64 caractères !";
                }
            } else {
                $errors[] = "Le champ 'Nom' est obligatoire !";
            }

            if ($email) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $existingEmail = AppUser::where("email", "=", $email)->get();
                    if (!empty($existingEmail->first()->email)) {
                        $errors[] = "Cet email est déjà utilisé !";
                    }
                } else {
                    $errors[] = "L'email envoyé est incorrect !";
                }
            } else {
                $errors[] = "Le champ 'Email' est obligatoire !";
            }

            if ($password && $password2) {
                if ($password != $password2) {
                    $errors[] = "Les mots de passe envoyés ne correspondent pas !";
                }
            } else {
                $errors[] = "Les champs 'Mot de passe' sont obligatoire !";
            }

            if (empty($errors)) {
                $newUser = new AppUser();
                $newUser->firstname = $firstname;
                $newUser->lastname = $lastname;
                $newUser->email = $email;
                $newUser->password = password_hash($password, PASSWORD_DEFAULT);

                $newUser->save();
                UserSession::connect($newUser);
                $success[] = "Votre compte a été créé avec succès !";
            }
        }
        return view("signup",
            array(
                "errors"  => $errors,
                "success" => $success,
                "request" => $request
        ));
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function signIn(Request $request)
    {
        $errors = array();

        if ($request->isMethod("post")) {

            $email = trim($request->input("email")) ?? false;
            $password = trim($request->input("password")) ?? false;

            if (!$email || !$password) {
                $errors[] = "Tous les champs doivent être remplie !";
            }

            if (empty($errors)) {
                $user = AppUser::where("email", $email)->get();

                if ($email == $user->first()->email && password_verify($password, $user->first()->password)) {

                    UserSession::connect($user->first());
                    return redirect()->route("home-page");
                } else {
                    $errors[] = "Identifiants invalides !";
                }
            }
        }

        return view("signin",
            array(
                "errors"  => $errors,
                "request" => $request
        ));
    }

    public function logOut()
    {
        session_destroy();
        $_SESSION = array();

        return redirect()->route("home-page");
    }
}
