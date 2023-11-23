<?php
require_once 'AppController.php';
class DefaultController extends AppController {
    public function index(){
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
}