<?php

namespace App\Utils;

use App\Models\AppUser;

abstract class UserSession {

    /** @var string  */
    const SESSION_INDEX_NAME = 'connectedUser';

    /**
     * Method to connect a user
     *
     * @param AppUser $user
     */
    public static function connect(AppUser $user)
    {
        $_SESSION[self::SESSION_INDEX_NAME] = $user->id;
    }

    /**
     * Method to disconnect a user
     */
    public static function disconnect()
    {
        unset($_SESSION[self::SESSION_INDEX_NAME]);

        return redirect()->route("home-page");
    }

    /**
     * Method to find out if the visitor is connected to an account
     *
     * @return bool
     */
    public static function isConnected() : bool
    {
        $isConnected = $_SESSION[self::SESSION_INDEX_NAME] ?? false;
        return boolval($isConnected);
    }

    /**
     * Method to recover the model of the logged-in user
     *
     * @return AppUser
     */
    public static function getUser() : AppUser
    {
        $user = AppUser::find($_SESSION[self::SESSION_INDEX_NAME]);

        return $user;
    }

    /**
     * Method to find out if the logged in user is admin
     *
     * @return bool
     */
    public static function isAdmin() : bool
    {

    }
}
