<?php

namespace App\Utils;

use App\Models\AppUser;

abstract class UserSession {

    /** @var string  */
    const SESSION_INDEX_NAME = 'connectedUser';

    /**
     * Méthode permettant de connecter un utilisateur
     *
     * @param AppUser $user
     */
    public static function connect(AppUser $user)
    {
        $_SESSION[self::SESSION_INDEX_NAME] = $user->id;
    }

    /**
     * Méthode permettant de déconnecter un utilisateur
     */
    public static function disconnect()
    {
        session_destroy();
        $_SESSION = array();

        return redirect()->route("home-page");
    }

    /**
     * Méthode permettant de savoir si le visiteur est connecté à un compte
     *
     * @return bool
     */
    public static function isConnected() : bool
    {
        $isConnected = $_SESSION[self::SESSION_INDEX_NAME] ?? false;
        return boolval($isConnected);
    }

    /**
     * Méthode permettant de récupérer le Model de l'utilisateur connecté
     *
     * @return AppUser
     */
    public static function getUser() : AppUser
    {
        $user = AppUser::find($_SESSION[self::SESSION_INDEX_NAME]);

        return $user;
    }

    /**
     * Méthode permettant de savoir si l'utilisateur connecté est admin
     *
     * @return bool
     */
    public static function isAdmin() : bool
    {

    }
}
