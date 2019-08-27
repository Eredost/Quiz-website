<?php


namespace App\Http\Controllers;


use App\Utils\UserSession;

class AdminController extends Controller
{
    /**
     * Admin panel
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function admin() {

        if (!UserSession::isConnected() || !UserSession::isAdmin()) {

            return redirect()->route("home-page");
        }

        return view("admin");
    }
}
