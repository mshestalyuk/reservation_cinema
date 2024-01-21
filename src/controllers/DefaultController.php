<?php
require_once 'AppController.php';
class DefaultController extends AppController {
    public function index(){
        // TODO display home
        $this->render("home");
    }
    public function home(){
        // TODO display home
        $this->render("home");
    }

    public function login(){
        // TODO display login
        $this->render("login");
    }

    public function registration(){

        // TODO display registration
        $this->render("registration");

    }

    public function profile_details(){

        // TODO display profile_details
        $this->render("profile_details");

    }

    public function film(){

        // TODO display profile_details
        $this->render("film");

    }



    public function add_film(){

        // TODO display registration
        $this->render("add-film");

    }


}