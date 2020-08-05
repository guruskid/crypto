<?php 

class Admins extends Controller {
    public function __construct() {
        $this -> adminModel = $this -> model('Admin');
    }

    public function index() {
        $data = [];
        $this -> view('admin/index', $data);
    }
}