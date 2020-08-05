<?php

class Users extends Controller {
    public function __construct() {
        $this -> userModel = $this -> model('User');
    }

    public function index() {
        $data = [];
        $this -> view('users/index', $data);
    }

    public function profile() {
        $data = [];
        $this -> view('users/profile', $data);
    }
}